<?php

namespace Tests\Feature\Livewire\User\PatternClass;

use App\Livewire\User\PatternClass\AllPatternClass;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllPatternClassTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllPatternClass::class)
            ->assertStatus(200);
    }
}
