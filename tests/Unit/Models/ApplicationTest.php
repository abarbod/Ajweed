<?php

namespace Tests\Unit\Models;

use App\Models\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApplicationTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function it_can_be_withdrawn()
    {
        /** @var Application $application */
        $application = factory(Application::class)->create(['status' => 'processing']);

        $application->withdraw();

        $this->assertDatabaseHas($application->getTable(), [
            'status' => 'withdrawn'
        ]);
    }

}
