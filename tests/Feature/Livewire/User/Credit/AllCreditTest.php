<?php

namespace Tests\Feature\Livewire\User\Credit;

use App\Livewire\User\Credit\AllCredit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllCreditTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllCredit::class)
            ->assertStatus(200);
    }
}
