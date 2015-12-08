<?php

class Role extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	protected $guarded = array();

	public function user()
    {
        return $this->hasMany('user');
    }

}