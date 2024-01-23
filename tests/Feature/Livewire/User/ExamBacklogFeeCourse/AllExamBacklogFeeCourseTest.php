<?php

namespace Tests\Feature\Livewire\User\ExamBacklogFeeCourse;

use App\Livewire\User\ExamBacklogFeeCourse\AllExamBacklogFeeCourse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllExamBacklogFeeCourseTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllExamBacklogFeeCourse::class)
            ->assertStatus(200);
    }
}
