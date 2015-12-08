<?php

class Sysparam extends \Eloquent {
	
	protected $guarded = array();

	// Add your validation rules here
	public static $rules = [

	];

	public function value()
    {
        return $this->hasOne('Sysparamvalue', 'sysparam_key_id');
    }

	public static function getValue($key)
	{
		$collection = Sysparam::where('key', '=', $key)->get();
		foreach ($collection as $object) {
			return $object->value->content;
		}
	}
}