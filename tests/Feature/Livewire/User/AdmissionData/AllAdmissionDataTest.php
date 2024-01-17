<?php

namespace Tests\Feature\Livewire\User\AdmissionData;

use App\Livewire\User\AdmissionData\AllAdmissionData;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllAdmissionDataTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllAdmissionData::class)
            ->assertStatus(200);
    }
}
