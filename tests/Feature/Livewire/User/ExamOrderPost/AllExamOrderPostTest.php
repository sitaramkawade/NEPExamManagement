<?php

namespace Tests\Feature\Livewire\User\ExamOrderPost;

use App\Livewire\User\ExamOrderPost\AllExamOrderPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllExamOrderPostTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllExamOrderPost::class)
            ->assertStatus(200);
    }
}
