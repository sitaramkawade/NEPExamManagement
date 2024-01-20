<?php

namespace Tests\Feature\Livewire\User\ExamTimeTable;

use App\Livewire\User\ExamTimeTable\AllExamTimeTable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllExamTimeTableTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllExamTimeTable::class)
            ->assertStatus(200);
    }
}
