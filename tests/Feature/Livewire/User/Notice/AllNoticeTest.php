<?php

namespace Tests\Feature\Livewire\User\Notice;

use App\Livewire\User\Notice\AllNotice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllNoticeTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AllNotice::class)
            ->assertStatus(200);
    }
}
