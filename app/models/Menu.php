<?php

class Menu extends \Eloquent {
	
	protected $guarded = array();

	// Add your validation rules here
	public static $rules = [

	];

	public function items()
    {
        return $this->hasMany('MenuItem', 'menu_id')->orderBy('order');
    }
}