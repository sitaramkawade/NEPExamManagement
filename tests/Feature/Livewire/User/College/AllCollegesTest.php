<?php

namespace Tests\Feature\Livewire\User\College;

use App\Livewire\User\College\AllColleges;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllCollegesTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllColleges::class)
            ->assertStatus(200);
    }
}
