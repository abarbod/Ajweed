<?php

namespace Tests\Feature\Applications;

use App\Events\UserAppliedToParticipate;
use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event as EventFacade;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class EventApplicationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_authenticated_user_can_apply_to_participate_in_an_event()
    {
        // (1) Given we have a signed in user.
        /** @var User $user */
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $this->assertAuthenticatedAs($user); // Make sure user is authenticated.
        // and we have an event open for registration.
        /** @var Event $event */
        $event = factory(Event::class)->create(['registration_status' => 'open']);
        // (2) When a user submit a request to apply for an event
        $response = $this->postJson("events/{$event->getRouteKey()}/applications");
        // (3) We accept the request and create an application for the event by the user.
        $response->assertStatus(201);
        $response->assertJsonFragment([
            'user_id'  => $user->id,
            'event_id' => $event->id,
        ]);
        $this->assertCount(1, $user->applications, 'No application was created for the user.');
        $this->assertTrue($user->is($event->applicants->first()), 'The event was not assigned the user as applicant.');
        $this->assertTrue($user->applications->first()->event->is($event),
            'Event associated with the application is not the correct one.');
    }

    /** @test */
    public function only_authenticated_users_can_apply_for_events()
    {
        // (1) Given we have an unauthenticated user.
        /** @var User $user */
        $user = factory(User::class)->create();
        $this->assertGuest(); // Make sure user is not authenticated.
        // and we have an event open for registration.
        /** @var Event $event */
        $event = factory(Event::class)->create(['registration_status' => 'open']);
        // (2) When a user submit a request to apply for an event
        $response = $this->postJson("events/{$event->getRouteKey()}/applications");
        // (3) We deny the request as unauthenticated and don't create an application.
        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
        $response->assertJsonFragment(['message' => 'Unauthenticated.']);
        $this->assertCount(0, $user->applications, 'Application should not be created.');
    }

    /** @test */
    public function applying_for_closed_events_will_return_unauthorized()
    {
        // (1) Given we have an authenticated user.
        /** @var User $user */
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $this->assertAuthenticatedAs($user); // Make sure user is authenticated.
        // and we have an event closed for registration.
        /** @var Event $event */
        $event = factory(Event::class)->create(['registration_status' => 'closed']);
        // (2) When a user submit a request to apply for an event
        $response = $this->postJson("events/{$event->getRouteKey()}/applications");
        // (3) We deny the request as unauthorized and don't create an application.
        $response->assertStatus(Response::HTTP_FORBIDDEN);
        $response->assertJsonFragment(['message' => __('Registration is closed for this event.')]);
        $this->assertCount(0, $user->applications, 'Application should not be created.');
    }


    /** @test */
    public function a_user_can_withdraw_his_application()
    {
        /** @var User $user */
        $this->actingAs($user = factory(User::class)->create());
        /** @var Event $event */
        $event = factory(Event::class)->create(['registration_status' => 'open']);
        $event->applyBy($user);
        /** @var \App\Models\Application $application */
        $this->assertTrue($event->applicants->first()->is($user));
        $application = $user->fresh()->applications->first();

        $response = $this->deleteJson("/events/{$event->getRouteKey()}/applications/{$application->getRouteKey()}");

        $response->assertStatus(Response::HTTP_ACCEPTED);
        $response->assertJsonFragment(['message' => __('Your application was withdrawn.')]);
        $applicationStatus = $application->fresh()->status;
        $this->assertTrue($applicationStatus === 'withdrawn',
            "Expected application status withdrawn, got $applicationStatus");
    }

    /** @test */
    public function only_authenticated_and_authorized_users_can_withdraw_applications()
    {
        /** @var User $user */
        $user = factory(User::class)->create();
        $event = factory(Event::class)->create(['registration_status' => 'open']);
        $event->applyBy($user);

        // Authentication
        $response = $this->deleteJson("/events/{$event->getRouteKey()}/applications/{$user->applications->first()->getRouteKey()}");

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
        $response->assertJsonFragment(['message' => 'Unauthenticated.']);

        // Authorization
        $this->actingAs(factory(User::class)->create());
        $response = $this->deleteJson("/events/{$event->getRouteKey()}/applications/{$user->applications->first()->getRouteKey()}");

        $response->assertStatus(Response::HTTP_FORBIDDEN);
        $response->assertJsonFragment(['message' => 'This action is unauthorized.']);
    }

    /** @test */
    public function an_applicant_can_get_his_application_for_an_event()
    {
        $this->actingAs($user = factory(User::class)->create());
        $event = factory(Event::class)->create(['registration_status' => 'open']);
        $application = $event->applyBy($user);

        $response = $this->getJson("/events/{$event->getRouteKey()}/applications");

        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson([
            'data' => [
                'id'         => $application->id,
                'user_id'    => $user->id,
                'event_id'   => $event->id,
                'created_at' => $application->created_at->toDateTimeString(),
            ],
        ]);
    }


    /** @test */
    public function an_announcement_is_made_when_a_user_applies_to_participate_in_an_event()
    {
        // To fake laravel events. Events will not be actually fired.
        EventFacade::fake();
        // (1) Given we have an authenticated user
        $this->actingAs($user = factory(User::class)->create());
        // and an open event
        $event = factory(Event::class)->create(['registration_status' => 'open']);
        // (2) When the user applies to participate in the event.
        $this->postJson("events/{$event->getRouteKey()}/applications")
             ->assertStatus(Response::HTTP_CREATED);
        // (3) Then an event will be fired to announce the user's application to participate
        EventFacade::assertDispatched(UserAppliedToParticipate::class,
            function (UserAppliedToParticipate $userAppliedEvent) use ($user, $event) {

                $this->assertTrue($user->is($userAppliedEvent->user),
                    'The correct User is not attached to the announcement.');

                $this->assertTrue($event->is($userAppliedEvent->event),
                    'The correct event is not attached to the announcement.');

                return true;
            });
    }

}
