<?php

namespace Tests\Feature\Livewire\User\University;

use App\Livewire\User\University\AllUniversity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllUniversityTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllUniversity::class)
            ->assertStatus(200);
    }
}
