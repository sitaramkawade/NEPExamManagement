<?php

<<<<<<<< HEAD:tests/Feature/Livewire/User/EducationalCourse/AllEducationalCourseTest.php
namespace Tests\Feature\Livewire\User\EducationalCourse;

use App\Livewire\User\EducationalCourse\AllEducationalCourse;
========
namespace Tests\Feature\Livewire\User\PatternClass;

use App\Livewire\User\PatternClass\AllPatternClass;
>>>>>>>> Ashutosh:tests/Feature/Livewire/User/PatternClass/AllPatternClassTest.php
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

<<<<<<<< HEAD:tests/Feature/Livewire/User/EducationalCourse/AllEducationalCourseTest.php
class AllEducationalCourseTest extends TestCase
========
class AllPatternClassTest extends TestCase
>>>>>>>> Ashutosh:tests/Feature/Livewire/User/PatternClass/AllPatternClassTest.php
{
    /** @test */
    public function renders_successfully()
    {
<<<<<<<< HEAD:tests/Feature/Livewire/User/EducationalCourse/AllEducationalCourseTest.php
        Livewire::test(AllEducationalCourse::class)
========
        Livewire::test(AllPatternClass::class)
>>>>>>>> Ashutosh:tests/Feature/Livewire/User/PatternClass/AllPatternClassTest.php
            ->assertStatus(200);
    }
}
