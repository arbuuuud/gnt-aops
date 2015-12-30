<?php

class UsersController extends BaseController {

	public function loginByToken($token){
		$user = User::Where('remember_token',$token)->first();
		Auth::loginUsingId($user->id,true);
		$htmltree = MemberAPI::getmemberchilds($user->id);
		return Redirect::to(Auth::user()->roleString().'/dashboard')->with('htmltree',$htmltree);
	}
	public function showLogin()
	{
	    // show the form
	    return View::make('login');
	}

	public function doLogin()
	{
		// validate the info, create rules for the inputs
		$rules = array(
		    'email'    => 'required|email', // make sure the email is an actual email
		    'password' => 'required|alphaNum|min:6' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
		    return Redirect::to('login')
		        ->withErrors($validator) // send back all errors to the login form
		        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

		    // create our user data for the authentication
		    $userdata = array(
		        'email'     => Input::get('email'),
		        'password'  => Input::get('password'),
		        'active'	=> 1
		    );

		    // attempt to do the login
		    if (Auth::attempt($userdata,true)) {
		    	// validation successful!
		        // redirect them to the secure section or whatever
		        // Auth::user()->role;
		        if(Auth::user()->isAdmin()){
			        return Redirect::to(Auth::user()->roleString().'/dashboard');
		        }else{
		        	$htmltree = MemberAPI::getmemberchilds(Auth::user()->id);
		        	return Redirect::to(Auth::user()->roleString().'/dashboard')->with('htmltree',$htmltree);
		        }

		    } else {        

		        // validation not successful, send back to form 
		        return Redirect::to('login')->withErrors('Email atau password yang Anda berikan salah, mohon mencoba kembali.');

		    }

		}
	}

	public function showProfile()
	{
		$user = User::find(Auth::user()->id);

		return View::make('users.profile', compact('user'));
	}

	public function updateProfile()
	{
		$user = User::findOrFail(Auth::user()->id);
		
		// define rules
		$rules['first_name'] = 'required';
		$rules['last_name'] = 'required';
		$rules['email'] = 'required|email';

		// define input
		$inputs['first_name'] = Input::get('first_name');
		$inputs['last_name'] = Input::get('last_name');
		$inputs['email'] = Input::get('email');

		if(Input::has('password'))
		{
			$inputs['password']					= Hash::make(Input::get('password'));
			$rules['password'] 					= 'required|min:6|confirmed';
			$rules['password_confirmation'] 	= 'required|min:6';
		}

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$user->update($inputs);

		return Redirect::route('user.profile')->with("message","Data berhasil disimpan");
	}

	public function doLogout()
	{
	    Auth::logout(); // log the user out of our application
	    return Redirect::to('/'); // redirect the user to the login screen
	}

	public function index()
	{
		$users = User::all();

		return View::make('users.index', compact('users'));
	}

	public function create()
	{
		$status = ['1' => 'Active','0' => 'Not Active'];
		$roles = Role::lists('name', 'id');
		return View::make('users.create', compact('roles', 'status'));
	}

	public function store()
	{
		$validator = Validator::make(Input::all(), User::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$data = array(
			'first_name'	=> Input::get('first_name'),
			'last_name'		=> Input::get('last_name'),
			'password'		=> Hash::make(Input::get('password')),
			'email'			=> Input::get('email'),
			'active'		=> 1,
			'role_id'		=> Input::get('role_id'),
		);

		$user = User::create($data);

		return Redirect::route('admin.users.index')->with("message","Data berhasil disimpan");
	}

	public function edit($id)
	{
		$user = User::find($id);
		$status = ['1' => 'Active','0' => 'Not Active'];
		$roles = Role::lists('name', 'id');
		return View::make('users.edit', compact('user', 'roles', 'status'));
	}

	/**
	 * Update the specified post in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::findOrFail($id);
		
		// define rules
		$rules['first_name'] = 'required';
		$rules['last_name'] = 'required';
		$rules['email'] = 'required|email';

		// define input
		$inputs['first_name'] = Input::get('first_name');
		$inputs['last_name'] = Input::get('last_name');
		$inputs['email'] = Input::get('email');
		$inputs['active'] = Input::get('active');
		$inputs['role_id'] = Input::get('role_id');

		if(Input::has('password'))
		{
			$inputs['password']					= Hash::make(Input::get('password'));
			$rules['password'] 					= 'required|min:6|confirmed';
			$rules['password_confirmation'] 	= 'required|min:6';
		}

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$user->update($inputs);

		return Redirect::route('admin.users.index')->with("message","Data berhasil disimpan");
	}

	public function destroy($id)
	{
		// Check apakah user yang di hapus sama dengan user yang sedang login
		if ( $id == Auth::user()->id ) {
			$message = 'Maaf tidak bisa menghapus user yang sedang digunakan';
		}
		// Check ID, user dengan ID = 1 tidak bisa dihapus
		elseif ( $id !== '1' ) {
			User::destroy($id);
			$message = 'Data berhasil dihapus';
		}
		else {
			$message = 'Maaf user ini tidak dapat dihapus';
		}

		return Redirect::route('admin.users.index')->with('message', $message);
	}

	public function loginapi(){
		// $input = Input::all();
	    
	    //$member = '{"username": "bar", "token": "attr"}';
	    // $model = json_decode($string);
	    $model = new Member;
	    $model->first_name = "haloo";
	    $model->last_name = "ajah";

	    Cookie::queue('model', $model, 60 * 24); // 30 days
	    Cookie::queue('loginname', $model->first_name, 60 * 24); // 30 days
	    return 'true';
	}
	public function logoutapi(){
		if (isset($_COOKIE['loginname'])) {
		    unset($_COOKIE['loginname']);
		    unset($_COOKIE['model']);
		    setcookie('loginname', null, -1, '/');
		    setcookie('model', null, -1, '/');
		    return 'true';
		} else {
		    return 'false';
		}
	}

















}
