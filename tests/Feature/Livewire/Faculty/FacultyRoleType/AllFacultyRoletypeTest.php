<?php

namespace Tests\Feature\Livewire\Faculty\FacultyRoleType;

use Tests\TestCase;
use Livewire\Livewire;
use App\Models\Roletype;
use Illuminate\Foundation\Testing\WithFaker;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Livewire\Faculty\FacultyRoleType\AllFacultyRoletype;

class AllFacultyRoletypeTest extends TestCase
{
    // use RefreshDatabase;

    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllFacultyRoletype::class)
            ->assertStatus(200);
    }

    /** @test */
    public function it_can_add_a_new_roletype()
    {
        // Livewire test
        Livewire::test(AllFacultyRoletype::class)
            ->set('roletype_name', 'New Roletype Name')
            ->call('save')
            ->assertStatus(200);

        // Assert that the new Roletype is stored in the database
        $this->assertDatabaseHas('roletypes', ['roletype_name' => 'New Roletype Name']);
    }

    public function it_can_update_a_roletype()
    {
        // Create a faculty instance using the factory
        $roletype = Roletype::factory()->create(['roletype_name' => 'Original Name']);

        Livewire::test(AllFacultyRoletype::class)
            ->set('roletype_name', 'New Roletype Name')
            ->call('update', $roletype->id) // Pass faculty ID for updating
            ->assertStatus(200);

        // Assert that the database has the updated roletype_name
        $this->assertDatabaseHas('roletypes', ['id' => $roletype->id, 'roletype_name' => 'New Roletype Name']);

        // Additional assertions if needed
    }
}
