<?php

namespace Tests\Feature\Livewire\Student\StudentExamForm;

use App\Livewire\Student\StudentExamForm\StudentExamForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class StudentExamFormTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(StudentExamForm::class)
            ->assertStatus(200);
    }
}
