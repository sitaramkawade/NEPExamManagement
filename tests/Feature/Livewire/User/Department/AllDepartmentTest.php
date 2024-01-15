<?php

namespace Tests\Feature\Livewire\User\Department;

use App\Livewire\User\Department\AllDepartment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllDepartmentTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllDepartment::class)
            ->assertStatus(200);
    }
}
