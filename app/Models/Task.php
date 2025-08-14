<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
   use HasFactory;

   protected $fillable = [
       'title',
       'description',
       'long_description',
   ]; // Specify the attributes that are mass assignable

//    protected $guarded = []; // Specify the attributes that are not mass assignable
}
