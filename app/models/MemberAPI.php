<?php
class MemberAPI extends \Eloquent
{
	private $_params;
	
	public function __construct($params)
	{
		$this->_params = $params;
	}
	public function checkparams(){
		error_log($this->_params['member_id']);
		if(!isset($this->_params['member_id'])||
			!isset($this->_params['username'])||
			!isset($this->_params['name'])||
			!isset($this->_params['tgllahir'])||
			!isset($this->_params['tglaplikasi'])||
			!isset($this->_params['sponsor_id'])||
			!isset($this->_params['introducer_id'])){
		// if(!$this->_params['member_id']||!$this->_params['username']||!$this->_params['name']||!$this->_params['tgllahir']||!$this->_params['tglaplikasi']||$this->_params['sponsor_id']>=0||!$this->_params['introducer_id']>=0){
			return false;
		}
		return true;
	}
	public function loginAction(){
		if(!$this->checkparams()){
			return 1;
		}
		if($this->_params['member_id'] == 1){
			return 2;
		}
		$user = User::where('id',$this->_params['member_id'])->where('first_name',$this->_params['username'])->first();
		if($user){

		}else{
			if(!User::where('id', '=', $this->_params['member_id'])->exists()){
				error_log('ERROR 6');
			$user = new User();
			$user->id = $this->_params['member_id']; 
			$user->first_name = $this->_params['name']; 
			$user->last_name = $this->_params['username']; 
			$user->email = $this->_params['name']; 

			$user->password = Hash::make(rand());
			$user->active = 1; 
			$user->save();
			}else{
				$user= User::where('id', '=', $this->_params['member_id'])->first();
			}
		}
		Auth::loginUsingId($user->id,true);
		return Auth::user()->remember_token;
	}
	public function logout(){
		if (isset($_COOKIE['loginname'])) {
		    unset($_COOKIE['loginname']);
		    unset($_COOKIE['model']);
		    setcookie('loginname', null, -1, '/');
		    setcookie('model', null, -1, '/');
		    return true;
		} else {
		    return false;
		}
	}
	public function getmembersAction()
	{	

		return "success";
		// //create a new todo item
		// $memberItem = MemberItem::getmemberAction($this->_params['username'], $this->_params['userpass']);
		
		// //return the todo item in array format
		// return $memberItem;
	}
	public static function getAllDownline($member_id){
		
		try{

			$apicaller = new ApiCaller('APP001', '28e336ac6c9423d946ba02d19c6a2632','http://localhost/aops-server/');

			$todo_items = $apicaller->sendRequest(array(
				'controller' => 'member',
				'action' => 'getalldownline',
				'username' => 'aops',
				'userpass' => 'password',
				'member_id' => $member_id
			));
			return $todo_items;
		}catch(Exception $e){
			return 'Trouble Connection';
		}
	}
	public static function getmemberapiselect($member_id){
		try{

			$apicaller = new ApiCaller('APP001', '28e336ac6c9423d946ba02d19c6a2632','http://localhost/aops-server/');

			$todo_items = $apicaller->sendRequest(array(
				'controller' => 'member',
				'action' => 'getmemberselect',
				'username' => 'aops',
				'userpass' => 'password',
				'member_id' => $member_id
			));
			return $todo_items;
		}catch(Exception $e){
			return 'Trouble Connection';
		}
	}
	public static function getMemberByUserName($username){
		try{

			$apicaller = new ApiCaller('APP001', '28e336ac6c9423d946ba02d19c6a2632','http://localhost/aops-server/');

			$member = $apicaller->sendRequest(array(
				'controller' => 'member',
				'action' => 'getmemberbyusername',
				'username' => 'aops',
				'userpass' => 'password',
				'username' => $username
			));
			return $member;
		}catch(Exception $e){
			return null;
		}
	}
	public static function getmemberchilds($member_id){
		try{

			$apicaller = new ApiCaller('APP001', '28e336ac6c9423d946ba02d19c6a2632','http://localhost/aops-server/');

			$todo_items = $apicaller->sendRequest(array(
				'controller' => 'member',
				'action' => 'getmemberchilds',
				'username' => 'aops',
				'userpass' => 'password',
				'member_id' => $member_id
			));
			return $todo_items;
		}catch(Exception $e){
			return 'Trouble Connection';
		}
	}

}