<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStudenteducationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
      
     
        return [           
            
            'boarduniversity_id' => 'required',
            'passing_year' => 'required',
            'seat_number' => 'required',
            'cgpa' => 'required',
            'grade' => 'required',
            'obtained_marks' => 'required',
            'total_marks' => 'required',
            'percentage' => 'required',
            'educationalcourse_id' =>  [

                'required', 

                Rule::unique('studentpreviousexams')

                       ->where('student_id', auth()->id())

               ]
            
        ];
    }
    public function messages(){
        return [
'educationalcourse_id'=>'Education Qualification is already Exist',
        ];
    }
}
