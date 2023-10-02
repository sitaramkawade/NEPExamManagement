<div>
<select name="patternclass_id" wire:model.live="selectedPatternclass" required class="form-input rounded-md shadow-sm mt-1 block w-full">
        <option value="" selected>
                {{"Select Pattern class"}}
        </option>
        @foreach($courses as $course)
        @foreach($course->course_classes as $course_class)
        @foreach($course_class->patterns as $pattern)

        <option value="{{$pattern->pivot->id}}">
            {{$pattern->pivot->id}} {{$course_class->classyear->classyear_name}} {{$course->course_name}}
            {{$pattern->pattern_name}}
        </option>
        @endforeach @endforeach @endforeach

    </select>   
    @if(isset($selectedPatternclass))
    <select name="subjectcategory_id" wire:model.live="selectedCategory" required class="form-input rounded-md shadow-sm mt-1 block w-full">
        <option value="">
            {{"Select Category"}}
        </option>
     
        @foreach($subjectcategories as $subjectcategory)

        <option value="{{$subjectcategory->id}}">
            {{ Str::upper( $subjectcategory->subjectcategory)}}
        </option>
        @endforeach
      
    </select>  @endif
    @if(isset($selectedCategory))
    <select name="subject_id"  required class="form-input rounded-md shadow-sm mt-1 block w-full">
        <option value="">
            {{"Select Subject"}}
        </option>
        @if($subjects)
        @foreach($subjects as $subject)

        <option value="{{$subject->id}}">
            {{ Str::upper( $subject->subject_name)}}{{" ( Department : ".$subject->department->dept_name." )"}}
        </option>
        @endforeach
        @endif
    </select>
    @endif  

</div>
