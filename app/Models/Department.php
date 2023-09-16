<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table="departments";
    protected $fillable = [
        'dept_name',
        'short_name',
        'departmenttype',//commaseparated type/0 means not active 1=>only ug 2=>only pg 3=>ug,pg 4=>doctorate ,5 =>all
         'college_id',
         'status',
        
    ];
     

}