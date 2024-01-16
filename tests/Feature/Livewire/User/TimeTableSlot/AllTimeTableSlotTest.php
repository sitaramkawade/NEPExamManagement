<?php

namespace Tests\Feature\Livewire\User\TimeTableSlot;

use App\Livewire\User\TimeTableSlot\AllTimeTableSlot;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllTimeTableSlotTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllTimeTableSlot::class)
            ->assertStatus(200);
    }
}
