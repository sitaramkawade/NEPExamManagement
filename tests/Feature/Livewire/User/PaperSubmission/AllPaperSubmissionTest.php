<?php

namespace Tests\Feature\Livewire\User\PaperSubmission;

use App\Livewire\User\PaperSubmission\AllPaperSubmission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllPaperSubmissionTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllPaperSubmission::class)
            ->assertStatus(200);
    }
}
