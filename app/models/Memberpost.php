<?php

class Memberpost extends \Eloquent {

	protected $table = 'member_post';

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

}