<?php

namespace Tests\Feature\Livewire\User\AcademicYear;

use App\Livewire\User\AcademicYear\AllAcademicYear;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllAcademicYearTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllAcademicYear::class)
            ->assertStatus(200);
    }
}
