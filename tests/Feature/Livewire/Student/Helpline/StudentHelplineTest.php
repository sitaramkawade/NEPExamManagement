<?php

namespace Tests\Feature\Livewire\Student\Helpline;

use Tests\TestCase;
use Livewire\Livewire;

use App\Livewire\Student\Helpline\Helpline;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudenthelplineTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Helpline::class)
            ->assertStatus(200);
    }
}
