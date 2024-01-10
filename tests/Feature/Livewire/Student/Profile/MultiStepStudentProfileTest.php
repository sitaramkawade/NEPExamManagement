<?php

namespace Tests\Feature\Livewire\Student\Profile;

use Tests\TestCase;
use Livewire\Livewire;
use App\Models\Student;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Livewire\Student\Profile\MultiStepStudentProfile;

class MultiStepStudentProfileTest extends TestCase
{
    use RefreshDatabase;

    public function renders_successfully()
    {
        Livewire::test(MultiStepStudentProfile::class)->assertStatus(200);
    }


// /** @test */
//     public function it_can_save_student_information_and_advance_to_next_step()
//     {
//         // Create a user or use the existing one
//         $user = factory(Student::class)->create();

//         Livewire::actingAs($user)
//             ->test(MultiStepStudentProfile::class)
//             ->set('memid', '123456')
//             ->set('abcid', '123456789012')
//             ->set('aadhar_name', 'John Doe')
//             ->set('student_name', 'Jane Doe')
//             ->set('email', 'xyz@gmail.com')
//             ->set('mobile_no', '1234567890')
//             ->set('father_name', 'ABC')
//             ->set('mother_name', 'PQR')
//             ->set('gender', '1')
//             ->set('date_of_birth', '2000-25-05')
//             ->set('nationality', '1')
//             ->set('adharnumber', '123456789012')
//             ->set('caste_category_id', '1')
//             ->set('caste_id', '1')
//             ->set('is_noncreamylayer', '0')
//             ->set('is_handicap', '0')
//             ->call('student_information_form')

//             // Assert that the user data has been updated
//             ->assertSet('user.memid', '123456')
//             ->assertSet('user.aadhar_card_no', '123456789012') // Assuming adharnumber is '123456789012'
//             ->assertSet('user.studentprofile.student_name_on_adharcard', 'John Doe')
//             ->assertSet('user.studentprofile.mother_name', 'Jane Doe')

//             // Assert that the current step has been updated
//             ->assertSet('current_step', 2)

//             // Assert that success alert has been dispatched
//             ->assertDispatchedBrowserEvent('alert', [
//                 'type' => 'success',
//                 'message' => 'Step 1: Student Information Saved Successfully !!',
//             ]);
//     }
}
