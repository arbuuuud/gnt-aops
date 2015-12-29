<?php

class ApiController extends \BaseController {

    public function execute()
	{
		error_log('execute ');
		error_log($_REQUEST['enc_request']);
		//Define our id-key pairs
		$applications = array(
			'APP001' => '28e336ac6c9423d946ba02d19c6a2632', //randomly generated app key 
		);
		
		try {
			//*UPDATED*
			//get the encrypted request
			$enc_request = $_REQUEST['enc_request'];
			
			//get the provided app id
			$app_id = $_REQUEST['app_id'];
			
			//check first if the app id exists in the list of applications
			if( !isset($applications[$app_id]) ) {
				throw new Exception('Application does not exist!');
			}
			
			//decrypt the request
			$params = json_decode(trim(mcrypt_decrypt( MCRYPT_RIJNDAEL_256, $applications[$app_id], base64_decode($enc_request), MCRYPT_MODE_ECB )));
			
			//check if the request is valid by checking if it's an array and looking for the controller and action
			if( $params == false || isset($params->action) == false ) {
				throw new Exception('Request is not valid');
			}
			
			//cast it into an array
			$params = (array) $params;
			
			//get the controller and format it correctly so the first
			//letter is always capitalized
			//get the action and format it correctly so all the
			//letters are not capitalized, and append 'Action'
			$action = strtolower($params['action']).'Action';
			// if (class_exists('MyClass')) {
			//     $myclass = new MyClass();
			// }
			$controller = new MemberAPI($params);
			
			
			//check if the action exists in the controller. if not, throw an exception.
			if( method_exists($controller, $action) === false ) {
				throw new Exception('Action is invalid.');
			}
			
			//execute the action
			$result['data'] = $controller->$action();
			$result['success'] = true;
			
		} catch( Exception $e ) {
			//catch any exceptions and report the problem
			$result = array();
			$result['success'] = false;
			$result['errormsg'] = $e->getMessage();
		}

		//echo the result of the API call
		echo json_encode($result);
		exit();
	}

}