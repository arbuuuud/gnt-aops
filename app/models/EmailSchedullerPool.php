<?php

class EmailSchedullerPool extends \Eloquent {
	protected $fillable = [];

	public function member()
    {
        return $this->belongsTo('Member');
    }

    public function contact()
    {
        return $this->belongsTo('Contact');
    }

    // public function template()
    // {
    //     return $this->belongsTo('EmailTemplate');
    // }

   	public function sendmail()
    {
    	// Sample Data
    	$data['member'] = Member::findOrFail(1);
    	$data['contact'] = Contact::findOrFail(1);

        Mail::send('emails.templates.sample', $data, function($message) {
    		$message->to('rengga.saksono@asclar.com', 'Rengga Saksono')->subject('Welcome to the GNT AOPS!');
		});

		return true;
    }
}



