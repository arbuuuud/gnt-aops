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
	
    public function insertPoolingSchedule($contact_id,$member_id,$template_id){
        $contactTarget = Contact::find($contact_id);
        $memberTarget = Member::find($member_id);
        // $templateTarget = Email_Template::find($member_id);
//!!!!!!!!!!!!! arbud: Template blom ada !!!!!!!!!!!!!!
        if(!$contactTarget || !$memberTarget){
        	return null ;
        }
        $stag = new EmailSchedullerPool();
        $stag->contact_id = $contact_id;
        $stag->member_id = $member_id;
        $stag->template_id = $template_id;
        $configurationMember = MemberConfiguration::where('member_id',$member_id)->where('param_code',MemberConfiguration::FOLLOW_UP_SEQUENCE)->first();
		if(!$configurationMember){
        	return null ;
		}        
		$followUpSequence = $configurationMember->param_value;
        $stag->execution_date = date('Y-m-d H:i:s',strtotime("+".$followUpSequence." day"));
        $emailSchedullerPool = EmailSchedullerPool::where('member_id',$member_id)->where('contact_id',$contact_id)->where('template_id',$template_id)->first();

        if($emailSchedullerPool){
            //save history       
            $emailHistory = new emailHistory();
            $emailHistory->template_id= $emailSchedullerPool->template_id;
            $emailHistory->member_id = $emailSchedullerPool->member_id;
            $emailHistory->contact_id = $emailSchedullerPool->contact_id;
//!!!!!!!!!!!!! arbud: add status in delete !!!!!!!!!!!!!!
            $emailHistory->date_sent = date('Y-m-d H:i:s');
            $emailHistory->save();
            //delete pool
            $emailSchedullerPool->delete();   
        }
        //add entry
        if($contactTarget->active && $memberTarget->active){
        	$stag->save();
        	return $stag->toJson();	
        }else{
        	return null;
        }
    }

	// Add your validation rules here
	public static $rules = [
		'first_name' => 'required',
		'email' => 'required|email',
		'address' => 'required',
		'phone_home' => 'required|string',
        'last_follow_up' => 'required|date',
	];


	protected $guarded = array();

	public function emailhistories()
    {
        return $this->hasMany('EmailHistory','contact_id');
    }

}