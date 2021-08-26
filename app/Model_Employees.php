<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Model_Employees extends Authenticatable
{
    protected $table = 'employees';
    protected $fillable = ['first_name','last_name','company_id','email','phone','password','created_by_id','updated_by_id'];

    public function companies()
    {
        return $this->belongsTo('App\Model_Companies','company_id');
    }
    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by_id', 'id');
    }
    public function updatedBy()
    {
        return $this->belongsTo('App\User', 'updated_by_id', 'id');
    }
    public function getFullNameAttribute()
    {
        return "{$this->last_name} {$this->first_name}";
    }
}
