<?php

class MenuItem extends \Eloquent {

	protected $guarded = array();

	// Add your validation rules here
    public static $rules = [
        'name'      => 'required',
        'link'      => 'required',
        'menu_id'   => 'required',
    ];

	public function menu()
    {
        return $this->belongsTo('Menu');
    }

    public function childs()
    {
    	return $this->hasMany('MenuItem', 'parent_id');
    }

    public function scopeParent($query)
    {
    	return $query->where('parent_id', '=', 0);
    }

    public function scopeVisible($query)
    {
    	return $query->where('visible', '=', 1);
    }
}