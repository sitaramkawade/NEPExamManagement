<div>

    <select name="subjectcategory_id" wire:model.live="selectedCategory" required class="form-input rounded-md shadow-sm mt-1 block w-full">
        <option value="">
            {{"Select Category"}}
        </option>
        @if($subjectcategories)
        @foreach($subjectcategories as $subjectcategory)

        <option value="{{$subjectcategory->id}}">
            {{ Str::upper( $subjectcategory->subjectcategory)}}
        </option>
        @endforeach
        @endif
    </select>
    @if(isset($selectedCategory))
    @if($this->visibility==2)
    <select name="classyear_id" required class="form-input rounded-md shadow-sm mt-1 block w-full">
        @foreach($classyears as $classyear)
        <option value="{{$classyear->id}}">
            {{ Str::upper( $classyear->classyear_name)}}
        </option>
        @endforeach

    </select>

    @else @if($this->visibility==1)
    <select name="patternclass_id" required class="form-input rounded-md shadow-sm mt-1 block w-full">
        @foreach($courses as $course)
        @foreach($course->course_classes as $course_class)
        @foreach($course_class->patterns as $pattern)

        <option value="{{$pattern->pivot->id}}">
            {{$pattern->pivot->id}} {{$course_class->classyear->classyear_name}} {{$course->course_name}}
            {{$pattern->pattern_name}}
        </option>
        @endforeach @endforeach @endforeach

    </select>

    @endif @endif
    @endif
</div>