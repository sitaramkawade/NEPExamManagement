<?php

namespace Tests\Feature\Livewire\User\SubjectOrder;

use App\Livewire\User\SubjectOrder\GenerateSubjectOrder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class GenerateSubjectOrderTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(GenerateSubjectOrder::class)
            ->assertStatus(200);
    }
}
