<?php

namespace Tests\Feature\Livewire\User\GenerateExamOrder;

use App\Livewire\User\GenerateExamOrder\GenerateExamOrder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class GenerateExamOrderTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(GenerateExamOrder::class)
            ->assertStatus(200);
    }
}
