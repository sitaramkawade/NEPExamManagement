<?php

namespace Tests\Feature\Livewire\User\QuestionPaperBank;

use App\Livewire\User\QuestionPaperBank\AllQuestionPaperBank;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllQuestionPaperBankTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllQuestionPaperBank::class)
            ->assertStatus(200);
    }
}
