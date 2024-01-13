<?php


namespace Tests\Feature\Livewire\User\EducationalCourse;

use App\Livewire\User\EducationalCourse\AllEducationalCourse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllEducationalCourseTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllEducationalCourse::class)
            ->assertStatus(200);
    }
}
