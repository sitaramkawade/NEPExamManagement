<?php

namespace Tests\Feature\Livewire\User\Programme;

use App\Livewire\User\Programme\AllProgramme;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllProgrammeTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllProgramme::class)
            ->assertStatus(200);
    }
}
