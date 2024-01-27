<?php

namespace Tests\Feature\Livewire\User\Ratehead;

use App\Livewire\User\Ratehead\AllRateHead;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllRateHeadTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllRateHead::class)
            ->assertStatus(200);
    }
}
