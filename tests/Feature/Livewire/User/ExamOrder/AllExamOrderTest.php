<?php

namespace Tests\Feature\Livewire\User\ExamOrder;

use App\Livewire\User\ExamOrder\AllExamOrder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllExamOrderTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllExamOrder::class)
            ->assertStatus(200);
    }
}
