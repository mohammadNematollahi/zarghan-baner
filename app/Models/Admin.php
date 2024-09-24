<?php

namespace App\Models;

use App\Models\Admin\Market;
use App\Models\Admin\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $guard = 'admin';
    protected $fillable = ["username" , "password" , "email" , "expire_token" , "token"];
    protected $hidden = ['password', 'remember_token'];
    
    
    public function markets()
    {
        return $this->hasMany(Market::class);
    }
    
        public function jobs()
    {
        return $this->hasMany(Job::class);
    }

}
