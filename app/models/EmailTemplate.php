<?php

class EmailTemplate extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'sequence' => 'required|integer|unique:email_templates',
        'subject'  => 'required',
        'content_main_title'  => 'required',
        'content_body'  => 'required',
	];

	// Custom validation rules for store (update)
    public static function rules ($id=0, $merge=[]) {
        return array_merge(
            [
                'subject'  => 'required',
        		'content_main_title'  => 'required',
        		'content_body'  => 'required',
                'sequence'  => 'required|integer|unique:email_templates,sequence'.($id ? ",$id" : ''),
            ], 
        $merge);
    }

	// Don't forget to fill this array
	protected $guarded = array();

}