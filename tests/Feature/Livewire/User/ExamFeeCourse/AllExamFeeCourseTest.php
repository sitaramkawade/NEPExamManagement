<?php

namespace Tests\Feature\Livewire\User\ExamFeeCourse;

use App\Livewire\User\ExamFeeCourse\AllExamFeeCourse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllExamFeeCourseTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllExamFeeCourse::class)
            ->assertStatus(200);
    }
}
