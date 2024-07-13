<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Row extends Model
{
    use HasFactory;

    protected $fillable = ['first_name','last_name','qualification','dob','form_id'];

    public function form(){
        return $this->belongsTo(Form::class);
    }
}
