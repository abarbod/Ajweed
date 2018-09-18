<?php

namespace Tests\Unit\Models;

use App\Exceptions\ApplyingForClosedEventException;
use App\Models\Application;
use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventTest extends TestCase
{
    use RefreshDatabase;

    /** @var \App\Models\Event */
    protected $event;

    /** @var \App\Models\User */
    protected $user;

    protected function setUp()
    {
        parent::setUp();

        $this->event = factory(Event::class)->state('open')->create();
        $this->user = factory(User::class)->create();
    }


    /** @test */
    public function it_accepts_applications_from_users()
    {
        $this->event->applyBy($this->user);

        $this->assertTrue($this->event->applicants()->first()->is($this->user),
            "A new applicant should be attached to the event.");
    }

    /** @test */
    public function it_returns_an_application_when_applied_to_by_a_user()
    {
        $actual = $this->event->applyBy($this->user);
        $this->assertInstanceOf(Application::class, $actual,
            'Applying to an event should return an instance of Application. Got instance of ' . get_class($actual));
    }

    /** @test */
    public function it_rejects_applications_if_registration_status_is_closed()
    {
        $event = factory(Event::class)->state('closed')->create();

        try {
            $event->applyBy($this->user);
        } catch (ApplyingForClosedEventException $exception) {
            $this->assertEquals(0, $event->applicants->count(), 'Closed events should not accept applications.');

            return;
        }

        $this->fail('Applying to events closed for registration should throw an exception.');
    }

    /** @test */
    public function it_creates_new_application_with_processing_status()
    {
        $application = $this->event->applyBy($this->user);

        $this->assertEquals($application->status, 'processing');
    }

    /** @test */
    public function reapplying_to_an_event_will_update_the_application_status_to_processing()
    {
        $withdrawnApplication = $this->event->applyBy($this->user);
        $withdrawnApplication->withdraw();
        $this->assertEquals($withdrawnApplication->status, 'withdrawn');

        $application = $this->event->applyBy($this->user);

        $this->assertInstanceOf(Application::class, $application);
        $this->assertEquals($application->status, 'processing');
        $this->assertTrue($application->is($withdrawnApplication));
    }

    /** @test */
    public function it_accepts_applications_from_a_user_only_once()
    {
        $firstApplication = $this->event->applyBy($this->user);
        $this->assertCount(1, $this->event->applications);

        $secondApplication = $this->event->applyBy($this->user);

        $this->assertCount(1, $this->event->applications,
            'Events should accept only one application from the same user');
        $this->assertTrue($firstApplication->is($secondApplication));
    }

    /** @test */
    public function it_does_not_change_the_application_status_when_a_user_applies_twice()
    {
        $application = $this->event->applyBy($this->user);
        $this->assertEquals($application->status, 'processing');
        $application->update(['status' => 'rejected']);

        $this->event->applyBy($this->user);

        $this->assertEquals('rejected', $application->status);
    }


}
