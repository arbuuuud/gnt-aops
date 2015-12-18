<?php

class EmailSchedullerPool extends \Eloquent {
	protected $fillable = [];
	/*
		for get email which can be executed today
	*/
	public function getTargetEmails(){
		
		$polls = EmailSchedullerPool::where( DB::raw('DAY(execution_date)'), '=', date('d') )->get();
		return $polls;
	}
	public function executeEmails(){
		$pools = $this->getTargetEmails();
		if(!$pools){
			return;
		}
		foreach ($pools as $pool) {
			$trysending = true;
			$contact = Contact::find($pool->contact_id);
			if($contact->templateExist($pool->template_id)){
				$templateid = $contact->getAvalaibleTemplate();
				if($templateid==0){ //if template for send not exist disactivated contact
					$trysending = false;
					$contact->saveHistory("all have been sent",$pool->member_id,$pool->template_id);
					$contact->active = 0;
					$contact->save();
				}else{ //try to send another template
					$contact->saveHistory("sendanother",$pool->member_id,$pool->template_id);
					$pool->template_id = $templateid;
					$pool->save();
				}
			} 
			if($trysending){
				if($pool->sendEmail()){
					if($contact->email_sent == "" ||$contact->email_sent ==0){
						$contact->email_sent=$pool->template_id;
					}else{
						$contact->email_sent=$contact->email_sent.",".$pool->template_id;
					}
					$contact->save();
					$contact->saveHistory("success",$pool->member_id,$pool->template_id);
					$newtemplate = $contact->getAvalaibleTemplate();
					if($newtemplate){
						$contact->insertPoolingSchedule($contact->id,$contact->member_id,$newtemplate);
					}else{
						$contact->saveHistory("all have been sent",$pool->member_id,$pool->template_id);
						$contact->active = 0;
						$contact->save();
					}
					$pool->delete();
				}else{
//ARBUD : doing something retry 3x
				}
			}
		}
	}
	public function sendEmail(){
		return true;
	}
}



