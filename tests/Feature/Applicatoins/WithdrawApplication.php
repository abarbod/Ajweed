<?php

namespace Tests\Feature\Applications;

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class WithdrawApplication extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_withdraw_his_application()
    {
        /** @var User $user */
        $this->actingAs($user = factory(User::class)->create());
        /** @var Event $event */
        $event = factory(Event::class)->create(['registration_status' => 'open']);
        $event->applyBy($user);
        $this->assertTrue($event->applicants->first()->is($user));

        $response = $this->deleteJson("/applications/{$user->applications->first()->getRouteKey()}");

        $response->assertStatus(Response::HTTP_ACCEPTED);
        $response->assertJsonFragment(['message' => __('Your application was withdrawn.')]);
        $applicationStatus = $user->fresh()->applications->first()->status;
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

}
