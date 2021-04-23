<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = "db";
    protected $fillable = ['name', 'surname', 'email'];
    
    public function index(){
        return $this->hasMany(Services::class);
    }
}
