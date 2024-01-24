<?php

namespace Tests\Feature\Livewire\User\ExamFee;

use Tests\TestCase;
use Livewire\Livewire;
use App\Livewire\User\ExamFee\AllExamFee;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AllExamFeeTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllExamFee::class)
            ->assertStatus(200);
    }
}
