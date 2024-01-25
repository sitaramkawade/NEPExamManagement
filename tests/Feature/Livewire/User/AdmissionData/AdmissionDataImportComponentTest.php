<?php

namespace Tests\Feature\Livewire\User\AdmissionData;

use App\Livewire\User\AdmissionData\AdmissionDataImportComponent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AdmissionDataImportComponentTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AdmissionDataImportComponent::class)
            ->assertStatus(200);
    }
}
