<?php

namespace Tests\Feature\Livewire\User\DepartmentType;

use App\Livewire\User\DepartmentType\AllDepartmentType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllDepartmentTypeTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllDepartmentType::class)
            ->assertStatus(200);
    }
}
