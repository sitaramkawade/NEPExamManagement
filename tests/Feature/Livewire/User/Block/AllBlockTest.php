<?php

namespace Tests\Feature\Livewire\User\Block;

use App\Livewire\User\Block\AllBlock;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllBlockTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllBlock::class)
            ->assertStatus(200);
    }
}
