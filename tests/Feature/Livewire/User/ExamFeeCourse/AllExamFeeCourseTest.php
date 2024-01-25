<?php

namespace Tests\Feature\Livewire\User\ExamFeeCourse;

use Tests\TestCase;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Livewire\User\ExamFeeCourse\AllExamFeeCourse;

class AllExamFeeCourseTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllExamFeeCourse::class)
            ->assertStatus(200);
    }
}
