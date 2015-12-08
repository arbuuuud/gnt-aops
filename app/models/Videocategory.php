<?php

class Videocategory extends \Eloquent {

	protected $table = 'videocategories';
	protected $guarded = array();

	// Add your validation rules here
	public static $rules = [
		'title' => 'required',
		'slug' => 'required|alpha_dash|unique:videocategories'
	];

	public static function rules ($id=0, $merge=[]) {
        return array_merge(
            [
                'title' => 'required',
                'slug'  => 'required|alpha_dash|unique:videocategories,slug'.($id ? ",$id" : ''),
            ], 
        $merge);
    }

	public function videos()
    {
        return $this->hasMany('Video','video_category_id');
    }

}