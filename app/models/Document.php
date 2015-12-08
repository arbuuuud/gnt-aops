<?php

class Document extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $guarded = [];

	public function documentable()
	{
		return $this->morphTo();
	}

}