<?php

namespace Tests\Feature\Livewire\User\ExamPatternClass;

use App\Livewire\User\ExamPatternClass\AllExamPatternClass;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllExamPatternClassTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllExamPatternClass::class)
            ->assertStatus(200);
    }
}
