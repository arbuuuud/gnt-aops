<?php

class Contact extends \Eloquent {

	protected $fillable = [];

	public function templateExist($template_id)
    {
    	//$memberConfiguration  = MemberConfiguration::where('param_code','FOLLOW_UP_SEQUENCE')->where('member_id',$member_id)->first();
        
        // if(!$memberConfiguration){
        // 	return -1;
        // }
        $emailSent = $this->email_sent;
        if($emailSent == "" || $emailSent == null|| $emailSent == "0"){
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
            $this->saveHistory("canceled",$emailSchedullerPool->member_id,$emailSchedullerPool->template_id);
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
    public function getAvalaibleTemplate(){
        $maxtemplate = 8;
        $templateTarget=1;
        while($templateTarget<=$maxtemplate){
            if($this->templateExist($templateTarget)){
                $templateTarget++;
            }else{
                return $templateTarget;
            } 
        }
        return 0;
    }
    public function saveHistory($status,$member_id,$template_id){
            $emailHistory = new emailHistory();
            $emailHistory->template_id= $template_id;
            $emailHistory->member_id = $member_id;
            $emailHistory->contact_id = $this->id;
            $emailHistory->status = $status;
            $emailHistory->date_sent = date('Y-m-d H:i:s');
            $emailHistory->save();
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

    public function encryptContact($contact){
        $secret = Crypt::encrypt('1'); //encrypted
        return $secret;
    }
    public static function decryptContact($contactString){
        $decrypted_secret = Crypt::decrypt($contactString); //decrypted
        $contact = Contact::find($decrypted_secret);
        return $contact;




    }

}