<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['name','gender','email','postcode','address','building_name','opinion'];

    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'email' => 'required',
        'postcode' => 'required',
        'address' => 'required',
        'opinion' => 'required'
    );

}
