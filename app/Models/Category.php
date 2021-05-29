<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    public function getImage(){
        return $this->image != ''?$this->image:'images/logo.PNG';
    }

    public function getTime(){
        return $this->created_at->diffForHumans();
    }
}
