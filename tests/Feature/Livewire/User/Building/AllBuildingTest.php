<?php

namespace Tests\Feature\Livewire\User\Building;

use App\Livewire\User\Building\AllBuilding;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllBuildingTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllBuilding::class)
            ->assertStatus(200);
    }
}
