<?php

namespace Tests\Feature\Livewire\User\Cap;

use App\Livewire\User\Cap\AllCap;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllCapTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllCap::class)
            ->assertStatus(200);
    }
}
