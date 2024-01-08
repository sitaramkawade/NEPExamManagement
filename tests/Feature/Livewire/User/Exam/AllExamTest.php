<?php

namespace Tests\Feature\Livewire\User\Exam;

use App\Livewire\User\Exam\AllExam;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllExamTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllExam::class)
            ->assertStatus(200);
    }
}
