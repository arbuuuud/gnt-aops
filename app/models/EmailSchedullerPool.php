<?php

class EmailSchedullerPool extends \Eloquent {
	protected $fillable = [];

	public function checkStatusScheduller($member_id,contact_id,template_id)
    {
    	$contact = Contact::find($contact_id);
    	$member = Member::find($member_id);
    	$memberConfiguration  = Member_configuration::where('param_code','FOLLOW_UP_SEQUENCE')->where('member_id',$member_id)->first();
        if(!$contact&& !$member && !$memberConfiguration){
        	return -1;
        }
        $emailSent = $contact->email_sent
        if($emailSent == "" || $emailSent == null){
        	return 0;
        }
        if (strpos($emailSent,',') !== false) {	
			$templates = explode(",",$emailSent);
			foreach ($templates as $template) {
				if($template==$template_id){
					return 1;
				}
			}
        }else{ 
        	if($emailSent==$template_id){
        		return 1;
        	}
        	return 0;
        }
		return 0;
        
    }
}