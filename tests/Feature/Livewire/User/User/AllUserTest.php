<?php

namespace Tests\Feature\Livewire\User\User;

use App\Livewire\User\User\AllUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllUserTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllUser::class)
            ->assertStatus(200);
    }
}
