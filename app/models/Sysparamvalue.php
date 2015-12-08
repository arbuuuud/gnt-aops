<?php

class Sysparamvalue extends \Eloquent {
	
	protected $table = 'sysparamvalues';
	protected $guarded = array();

	public function key()
    {
        return $this->belongsTo('Sysparam', 'sysparam_key_id');
    }
}