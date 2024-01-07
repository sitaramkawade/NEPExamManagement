<?php

namespace Tests\Feature\Livewire\User\College;

use App\Livewire\User\College\AllCollege;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllCollegeTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllCollege::class)
            ->assertStatus(200);
    }
}
