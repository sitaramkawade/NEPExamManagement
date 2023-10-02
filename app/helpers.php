<?php
use \App\Models\Gendermaster; 
function Genders(){   
   
      return Gendermaster::where('is_active','1')->get();
}