<?php

namespace Tests\Feature\Livewire\User\Cgpa;

use App\Livewire\User\Cgpa\AllCgpa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllCgpaTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllCgpa::class)
            ->assertStatus(200);
    }
}
