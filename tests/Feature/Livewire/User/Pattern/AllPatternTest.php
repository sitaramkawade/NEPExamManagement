<?php

namespace Tests\Feature\Livewire\User\Pattern;

use App\Livewire\User\Pattern\AllPattern;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllPatternTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllPattern::class)
            ->assertStatus(200);
    }
}
