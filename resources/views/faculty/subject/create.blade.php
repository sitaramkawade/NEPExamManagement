<x-faculty-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Subject !!!') }}



        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col">

                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

                        <div class="py-2   align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="m-10 shadow-md rounded-lg px-3 py-4 overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <div class="block mb-8">
                                <a href="{{ route('admin.subject.showsubject') }}"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Back </a>
                            </div>
                           
                            <div>{{"Department : ".$dept->first()->dept_name}}</div>
                                <form method="POST" action="{{ route('admin.subject.storesubject',$dept->first()->id) }}">
                                    @csrf
                                    <div class="flex  bg-white">
                            <div class="w-1/2 border-r-2 border-gray-250">
                            <div class="p-2">
                            <div class="ml-6">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
      
            <x-input-label for="subject_name" :value="__('Subject Name')" />
            <x-text-input id="subject_name" class="block mt-1 w-full" type="text" name="subject_name" :value="old('subject_name')" required autofocus autocomplete="subject_name" />
            <x-input-error :messages="$errors->get('subject_name')" class="mt-2" />
            </div></div>
        </div>
                        
                                    
                                     <div class="p-2">

<div class="ml-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
      
            <x-input-label for="subject_code" :value="__('Subject Code')" />
            <x-text-input id="subject_code" class="block mt-1 w-full" type="text" name="subject_code" :value="old('subject_code')" required autocomplete="subject_code" />
            <x-input-error :messages="$errors->get('subject_code')" class="mt-2" />
            </div></div>
        </div>

        <div class="p-2">

<div class="ml-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
      
                                        <x-input-label for="subject_shortname" value="{{ __('Subject Shortname') }}" />
                                        <x-text-input id="subject_shortname" class="block mt-1 w-full" type="text" name="subject_shortname" :value="old('subject_shortname')" required autofocus autocomplete="subject_shortname" />
                                        <x-input-error :messages="$errors->get('subject_shortname')" class="mt-2" />
                                        </div></div>
        </div>
        <div class="p-2">

<div class="ml-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
      
                                        <x-input-label for="subject_sem" value="{{ __('Subject Semester') }}" />
                                        <select id="subject_sem"  class="block mt-1 w-full rounded" name="subject_sem">
                                        <option disabled selected >
                                                {{"Select Subject Semester"}}
                                            </option>
                                        @for($i=1;$i<=6;$i++)
                                        <option value="{{$i}}""> {{$i}} </option>
                                        @endfor 
                                        
                                    </select>
                                    <x-input-error :messages="$errors->get('subject_sem')" class="mt-2" />
                                        </div></div>
        </div>
                                    <div class="p-2">

<div class="ml-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
      
                                        <x-input-label for="subjectcategory_id" value="{{ __('Subject Category') }}" />
                                        <select id="subjectcategory_id"  class="block mt-1 w-full rounded" name="subjectcategory_id">
                                        <option disabled selected >
                                                {{"Select Subject Category"}}
                                            </option>

                                            @foreach ($subjectcategories as $item)
                                            <option value={{$item->id}}  >
                                                {{ Str::upper( $item->subjectcategory)}}
                                            </option>
                                            @endforeach
                                           
                                         
                            
                                        </select>   
                                        <x-input-error :messages="$errors->get('subjectcategory_id')" class="mt-2" />
                                        </div></div>
        </div>
                        
                                      <div class="p-2">

<div class="ml-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
      
                                        <x-input-label for="subjecttype_id" value="{{ __('Subject Type') }}" />
                                        <select id="subjecttype_id"  class="block mt-1 w-full rounded" name="subjecttype_id">
                                        <option disabled selected >
                                                {{"Select Subject Type"}}
                                            </option>

                                            @foreach ($subjecttypes as $item)
                                            <option value={{$item->id}}  >
                                                {{ Str::upper( $item->type_name)}}
                                            </option>
                                            @endforeach
                                           
                                         
                            
                                        </select>   
                                        <x-input-error :messages="$errors->get('subjecttype_id')" class="mt-2" />
                                        </div></div>
        </div>
                                   
                                      <div class="p-2">

<div class="ml-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
      
                                        <x-input-label for="subjectexam_type" value="{{ __('Subject Exam Type') }}" />
                                        <select id="subjectexam_type"  class="block mt-1 w-full rounded" name="subjectexam_type">
                                            <option disabled selected>
                                                {{"Select Exam Type"}}
                                            </option>
                                            <option value='IE'  >
                                                {{ "Internal-External"}}
                                            </option>
                                            <option value='IP'  >
                                                {{ "Internal-Practical"}}
                                            </option>
                                            <option value='IEP'  >
                                                {{ "Internal-External-Practical"}}
                                            </option>
                                            <option value='I'  >
                                                {{ "Only Internal"}}
                                            </option>
                                            </select>    
                                        <x-input-error :messages="$errors->get('subjectexam_type')" class="mt-2" />
                                        </div></div>
        </div>
                                      <div class="p-2">

<div class="ml-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
      
                                        <x-input-label for="subject_credit" value="{{ __('Subject Credit') }}" />
                                        <select id="subject_credit"  class="block mt-1 w-full rounded" name="subject_credit">
                                        @for($i=1;$i<5;$i++)
                                        <option @if($i==2) selected @endif value="{{$i}}""> {{$i}} </option>
                                        @endfor 
                                        
                                    </select>
                                    <x-input-error :messages="$errors->get('subject_credit')" class="mt-2" />
                                        </div></div>
        </div>
        
        </div>
<div class="w-1/2">
<div class="p-2">

<div class="ml-1 mr-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
      
                                        <x-input-label for="subject_maxmarks" value="{{ __('Subject maxmarks') }}" />
                                        <x-text-input id="subject_maxmarks" class="block mt-1 w-full" type="text" name="subject_maxmarks" :value="old('subject_maxmarks')" required autofocus autocomplete="subject_maxmarks" />
                                        <x-input-error :messages="$errors->get('subject_maxmarks')" class="mt-2" />
                                        </div></div>
        </div>
                <div class="p-2">
                <div class="ml-1 mr-6">
                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
      
                    <x-input-label for="subject_maxmarks_int" value="{{ __('Subject maxmarks for internal') }}" />
                    <x-text-input id="subject_maxmarks_int" class="block mt-1 w-full" type="text" name="subject_maxmarks_int" :value="old('subject_maxmarks_int')" required autofocus autocomplete="subject_maxmarks_int" />
                    <x-input-error :messages="$errors->get('subject_maxmarks_int')" class="mt-2" />
                </div></div></div>
            <div class="p-2">

<div class="ml-1 mr-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
     
                    <x-input-label for="subject_maxmarks_intpract" value="{{ __('Subject maxmarks for internal practical') }}" />
                    <x-text-input id="subject_maxmarks_intpract" class="block mt-1 w-full" type="text" name="subject_maxmarks_intpract" :value="old('subject_maxmarks_intpract')" required autofocus autocomplete="subject_maxmarks_intpract" />
                    <x-input-error :messages="$errors->get('subject_maxmarks_intpract')" class="mt-2" />
                 </div></div></div>
                                    <div class="p-2">

<div class="ml-1 mr-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
     
    <x-input-label for="subject_maxmarks_ext" value="{{ __('Subject maxmarks for external') }}" />
                    <x-text-input id="subject_maxmarks_ext" class="block mt-1 w-full" type="text" name="subject_maxmarks_ext" :value="old('subject_maxmarks_ext')" required autofocus autocomplete="subject_maxmarks_ext" />
                    <x-input-error :messages="$errors->get('subject_maxmarks_ext')" class="mt-2" />
                </div></div></div>
                                    <div class="p-2">

<div class="ml-1 mr-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
     
                                        <x-input-label for="subject_totalpassing" value="{{ __('Subject Totalpassing') }}" />
                                        <x-text-input id="subject_totalpassing" class="block mt-1 w-full" type="text" name="subject_totalpassing" :value="old('subject_totalpassing')" required autofocus autocomplete="subject_totalpassing" />
                                        <x-input-error :messages="$errors->get('subject_totalpassing')" class="mt-2" />
                                        </div></div></div>
                                    <div class="p-2">

<div class="ml-1 mr-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
     
                                        <x-input-label for="subject_intpassing" value="{{ __('Subject internal passing') }}" />
                                        <x-text-input id="subject_intpassing" class="block mt-1 w-full" type="text" name="subject_intpassing" :value="old('subject_intpassing')" required autofocus autocomplete="subject_intpassing" />
                                        <x-input-error :messages="$errors->get('subject_intpassing')" class="mt-2" />
                                        </div></div></div>

                                    
                                      <div class="p-2">

<div class="ml-1 mr-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
     
                                        <x-input-label for="subject_intpractpassing" value="{{ __('Subject internal-practical passing') }}" />
                                        <x-text-input id="subject_intpractpassing" class="block mt-1 w-full" type="text" name="subject_intpractpassing" :value="old('subject_intpractpassing')" required autofocus autocomplete="subject_intpractpassing" />
                                        <x-input-error :messages="$errors->get('subject_intpractpassing')" class="mt-2" />
                                        </div></div></div>
                                    <div class="p-2">

<div class="ml-1 mr-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
     
                                        <x-input-label for="subject_extpassing" value="{{ __('Subject External passing') }}" />
                                        <x-text-input id="subject_extpassing" class="block mt-1 w-full" type="text" name="subject_extpassing" :value="old('subject_extpassing')" required autofocus autocomplete="subject_extpassing" />
                                        <x-input-error :messages="$errors->get('subject_extpassing')" class="mt-2" />
                                        </div></div></div>
                                  
                                        </div>
</div>
                                    <div class="flex items-center justify-end mt-4">
                                    
                        
                                        <x-primary-button class="ml-4">
                                            {{ __('Add Subject') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                              
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

</x-faculty-layout>
