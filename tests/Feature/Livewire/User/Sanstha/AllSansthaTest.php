<?php

namespace Tests\Feature\Livewire\User\Sanstha;

use App\Livewire\User\Sanstha\AllSanstha;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllSansthaTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllSanstha::class)
            ->assertStatus(200);
    }
}
