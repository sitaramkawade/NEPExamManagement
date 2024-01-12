<?php

namespace Tests\Feature\Livewire\Faculty\UpdateProfile;

use App\Livewire\Faculty\UpdateProfile\UpdateProfile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class UpdateProfileTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(UpdateProfile::class)
            ->assertStatus(200);
    }
}
