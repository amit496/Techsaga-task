<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use HasFactory, softDeletes;


    protected $table = 'customers';
    protected $fillable = ['name' , 'email', 'contact', 'password', 'approved', 'otp'];


    public function getEmailAttribute($value)
    {
        return ucfirst($value);
    }



    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }

}
