<?php

namespace Tests\Feature\Livewire\User\BoardUniversity;

use App\Livewire\User\BoardUniversity\AllBoardUniversity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllBoardUniversityTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllBoardUniversity::class)
            ->assertStatus(200);
    }
}
