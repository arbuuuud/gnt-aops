<?php

class Contact extends \Eloquent {

	protected $fillable = [];

	public function checkStatusScheduller($template_id)
    {
    	//$memberConfiguration  = MemberConfiguration::where('param_code','FOLLOW_UP_SEQUENCE')->where('member_id',$member_id)->first();
        
        // if(!$memberConfiguration){
        // 	return -1;
        // }
        $emailSent = $this->email_sent;
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
	
	// Add your validation rules here
	public static $rules = [
		'first_name' => 'required',
		'email' => 'required',
		'address' => 'required',
		'phone_home' => 'required',
	];


	protected $guarded = array();

	public function user()
    {
        return $this->hasMany('user');
    }

}