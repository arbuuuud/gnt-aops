<?php

class EmailHistory extends \Eloquent {
	protected $fillable = [];
	protected $table = 'email_histories';

    public function template()
	{
	  return $this->belongsTo('EmailTemplate','template_id');
	}
    public function contact()
	{
	  return $this->belongsTo('Contact','contact_id');
	}
}