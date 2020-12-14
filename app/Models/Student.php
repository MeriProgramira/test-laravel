<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $table ='students';
    public $fillable = ['ime','odsjek', 'biografija','image','user_id'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
