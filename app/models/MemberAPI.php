<?php
class MemberAPI extends \Eloquent
{
	private $_params;
	
	public function __construct($params)
	{
		$this->_params = $params;
	}
	public function checkparams(){
		if(!$this->_params['member_id']||!$this->_params['username']||!$this->_params['name']||!$this->_params['tgllahir']||!$this->_params['tglaplikasi']||!$this->_params['sponsor_id']||!$this->_params['introducer_id']){
			return false;
		}
		return true;
	}
	public function loginAction(){
		if(!$this->checkparams()){
			return 0;
		}
		if($this->_params['member_id'] == 1){
			return 0;
		}
		$user = User::where('id',$this->_params['member_id'])->where('first_name',$this->_params['username'])->first();
		if($user){

		}else{
			if(!User::where('id', '=', $this->_params['member_id'])->exists()){
			$user = new User();
			$user->id = $this->_params['member_id']; 
			$user->first_name = $this->_params['username']; 
			$user->last_name = $this->_params['name']; 
			$user->email = $this->_params['name']; 

			$user->password = Hash::make(rand());
			$user->active = 1; 
			$user->save();
			}else{
				return 0;
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
	public static function getmemberchilds(){
		try{

			$apicaller = new ApiCaller('APP001', '28e336ac6c9423d946ba02d19c6a2632','http://localhost/aops-server/');

			$todo_items = $apicaller->sendRequest(array(
				'controller' => 'member',
				'action' => 'getmemberchilds',
				'username' => 'aops',
				'userpass' => 'password',
				'member_id' => 1
			));
			return $todo_items;
		}catch(Exception $e){
			return 'Trouble Connection';
		}
	}

}