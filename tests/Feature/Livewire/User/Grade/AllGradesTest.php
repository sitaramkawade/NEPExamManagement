<?php

namespace Tests\Feature\Livewire\User\Grade;

use App\Livewire\User\Grade\AllGrades;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllGradesTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllGrades::class)
            ->assertStatus(200);
    }
}
