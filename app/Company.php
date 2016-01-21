<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {
	
    protected $table = 'company';

    public function user()
    {
        return $this->hasMany('App\user');
    }

}
