<?php

namespace Tests\Feature\Livewire\User\ClassYear;

use App\Livewire\User\ClassYear\AllClassYear;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllClassYearTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllClassYear::class)
            ->assertStatus(200);
    }
}
