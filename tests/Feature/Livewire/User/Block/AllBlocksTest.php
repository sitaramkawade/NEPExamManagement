<?php

namespace Tests\Feature\Livewire\User\Block;

use App\Livewire\User\Block\AllBlocks;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllBlocksTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllBlocks::class)
            ->assertStatus(200);
    }
}
