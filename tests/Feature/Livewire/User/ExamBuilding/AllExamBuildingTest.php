<?php

namespace Tests\Feature\Livewire\User\ExamBuilding;

use App\Livewire\User\ExamBuilding\AllExamBuilding;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllExamBuildingTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllExamBuilding::class)
            ->assertStatus(200);
    }
}
