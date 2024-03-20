<?php

namespace Tests\Feature\Livewire\User\Faculty;

use App\Livewire\User\Faculty\UserFaculty;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class UserFacultyTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(UserFaculty::class)
            ->assertStatus(200);
    }
}
