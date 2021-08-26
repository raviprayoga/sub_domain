<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_Companies extends Model
{
    protected $table     = 'companies';
    protected $fillable  = ['name','email','logo','website','created_by_id','updated_by_id','created_at'];
    // protected $dates = ['created_at'];

    public function employees()
    {
        return $this->hasMany(Model_Employees::class);
    }
    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by_id', 'id');
    }
    public function updatedBy()
    {
        return $this->belongsTo('App\User', 'updated_by_id', 'id');
    }
}
