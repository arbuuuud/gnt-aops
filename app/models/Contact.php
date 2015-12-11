<?php

class Contact extends \Eloquent {
	
	// Add your validation rules here
	public static $rules = [
		'first_name' => 'required',
		'email' => 'required',
		'address' => 'required',
		'phone_home' => 'required',
	];


	protected $guarded = array();

	public function user()
    {
        return $this->hasMany('user');
    }

}