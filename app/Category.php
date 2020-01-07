<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model {
 
     protected $table = 'course_category';
 
     protected $primaryKey = 'category_id';


     public static function CategoryMenuMain () {

     	$result = Category::where('category_status','0')->get();
     	return $result;
     }

 
}

