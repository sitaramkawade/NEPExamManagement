<?php

namespace Tests\Feature\Livewire\Faculty\Subject;

use App\Livewire\Faculty\Subject\AllSubject;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllSubjectTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllSubject::class)
            ->assertStatus(200);
    }
}
