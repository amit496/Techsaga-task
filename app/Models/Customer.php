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


    public function getStatusAttribute($value)
    {
        if ($value == 1)
        {
            return '<span class="badge bg-success">Approved</span>';
        }
        elseif ($value == 2)
        {
            return '<span class="badge bg-secondary">Rejected</span>';
        }
        else
        {
            return '<span class="badge bg-warning">Pending</span>';
        }
    }


    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }

}
