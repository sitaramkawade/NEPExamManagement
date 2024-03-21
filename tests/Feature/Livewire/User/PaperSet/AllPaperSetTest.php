<?php

namespace Tests\Feature\Livewire\User\PaperSet;

use App\Livewire\User\PaperSet\AllPaperSet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllPaperSetTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllPaperSet::class)
            ->assertStatus(200);
    }
}
