<?php

namespace Tests\Feature\Livewire\User\ExamPanel;

use App\Livewire\User\ExamPanel\AllExamPanel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllExamPanelTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllExamPanel::class)
            ->assertStatus(200);
    }
}
