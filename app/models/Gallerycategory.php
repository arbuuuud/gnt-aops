<?php

class Gallerycategory extends \Eloquent {

	protected $table = 'gallerycategories';
	protected $guarded = array();

	// Add your validation rules here
	public static $rules = [
		'title' => 'required',
		'slug' => 'required|alpha_dash|unique:gallerycategories'
	];

	public static function rules ($id=0, $merge=[]) {
        return array_merge(
            [
                'title' => 'required',
                'slug'  => 'required|alpha_dash|unique:gallerycategories,slug'.($id ? ",$id" : ''),
            ], 
        $merge);
    }

    public function scopeMenuOrder()
    {
        return $this->orderBy('menu_order', 'ASC');
    }

    public function scopePublished($query)
    {
        return $query->whereStatus('1');
    }

	public function galleries()
    {
        return $this->hasMany('Gallery','gallery_category_id');
    }

}