<?php

namespace Tests\Feature\Applications;

use App\Models\Event;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApplyForEventTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_application_is_created_when_a_user_apply_for_an_event()
    {
        // (1) Given we have a user.
        /** @var User $user */
        $user = factory(User::class)->create();
        // and we have an event open for registration.
        /** @var Event $event */
        $event = factory(Event::class)->create(['registration_status' => 'open']);
        // (2) When a user apply for an event
        $event->applyBy($user);
        // (3) Then a new application by the user will be created for this event.
        $this->assertCount(1, $user->applications, 'No application was created for the user.');
        $this->assertTrue($user->applications->first()->event->is($event),
            'Event associated with the application is not the correct one.');
    }

    /** @test */
    public function applying_to_closed_events_is_not_allowed()
    {
        // (1) Given we have an event closed for registration.
        /** @var Event $event */
        $event = factory(Event::class)->create(['registration_status' => 'closed']);
        $this->assertTrue($event->registration_status === 'closed'); // Sanity check (make sure it's closed)
        /** @var User $user */
        $user = factory(User::class)->create();

        try {
            // (2) When a user apply for this event
            $event->applyBy($user);
            // (3) Then we throw an exception and do not create the application
            $this->fail("Users should not be able to apply for closed events.");

        } catch (\App\Exceptions\ApplyingForClosedEventException $exception) {
        }

        $this->assertCount(0, $user->applications, 'Application should not be created.');
    }

    /** @test */
    public function new_applications_will_have_processing_status()
    {
        // (1) Given we have a user.
        /** @var User $user */
        $user = factory(User::class)->create();
        // and we have an event open for registration.
        /** @var Event $event */
        $event = factory(Event::class)->create(['registration_status' => 'open']);
        // (2) When a user apply for an event
        $event->applyBy($user);

        // (3) The created application will have processing status.
        $this->assertEquals('processing', $user->applications->first()->status);
    }

    /** @test */
    public function users_can_apply_only_once_to_an_event()
    {
        // (1) Given we have a user.
        /** @var User $user */
        $user = factory(User::class)->create();
        // And we have an event.
        /** @var Event $event */
        $event = factory(Event::class)->create(['registration_status' => 'open']);
        // And the user has already applied to this event.
        $event->applyBy($user);
        $this->assertTrue($user->applications->first()->event->is($event));
        // (2) When the user applies to the same event.
        $event->applyBy($user);
        // (3) Then no duplicate application is created
        $this->assertCount(1, $user->fresh()->applications, 'There should be exactly one application for the user.');
    }


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
        $response->assertJsonFragment(['message' => 'ok']);
        $this->assertCount(1, $user->applications, 'No application was created for the user.');
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

}
