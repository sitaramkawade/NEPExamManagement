<?php

namespace Tests\Feature\Livewire\User\CourseClass;

use App\Livewire\User\CourseClass\AllCourseClass;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllCourseClassTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllCourseClass::class)
            ->assertStatus(200);
    }
}
