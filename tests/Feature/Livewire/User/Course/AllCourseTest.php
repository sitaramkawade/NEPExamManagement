<?php

namespace Tests\Feature\Livewire\User\Course;

use App\Livewire\User\Course\AllCourse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllCourseTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllCourse::class)
            ->assertStatus(200);
    }
}
