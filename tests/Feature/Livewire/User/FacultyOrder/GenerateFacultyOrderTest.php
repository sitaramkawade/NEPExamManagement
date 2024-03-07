<?php

namespace Tests\Feature\Livewire\User\FacultyOrder;

use App\Livewire\User\FacultyOrder\GenerateFacultyOrder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class GenerateFacultyOrderTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(GenerateFacultyOrder::class)
            ->assertStatus(200);
    }
}
