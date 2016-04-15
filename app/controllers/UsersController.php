<?php

class UsersController extends BaseController {

	public function showDashboard()
	{
		return View::make('users.dashboard')->with('member',Auth::user());
	}
	public function updateWelcomeMessage()
	{
		$user = User::find(Auth::user()->id);

		$data = array(
			'welcome_message'	=> Input::get('welcome_message'),
			'welcome_phone_number'	=> Input::get('welcome_phone_number')
		);
		$customRule['welcome_message'] = 'required';
		$customRule['welcome_phone_number'] = 'required';

		$messages = array(
			'required' => 'Harap mengisi informasi :attribute.',
			'image' => 'Tipe file gambar yang Anda berikan salah, mohon mencoba kembali.'
		);

		$validator = Validator::make($data, $customRule, $messages);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		if (Input::hasFile('welcome_photo')) {
			// checking file is valid.
			if (Input::file('welcome_photo')->isValid()) {
				$destinationPath = '/uploads/anggota'; // upload path
				$extension = Input::file('welcome_photo')->getClientOriginalExtension(); // getting image extension
				$fileName = $user->id.'.'.$extension; // rename image
				Input::file('welcome_photo')->move(public_path().$destinationPath, $fileName); // uploading file to given path
				$data['welcome_photo'] = $destinationPath."/".$fileName;
			}
			else {
				// sending back with error message.
				return Redirect::back()->with('errors', 'Uploaded file is not valid')->withInput();
			}
		}

		$user->update($data);

		return Redirect::route('member.dashboard')->with("message","Data berhasil disimpan");
	}
	public function loginByToken($token)
	{
		$user = User::Where('remember_token',$token)->first();
		Auth::loginUsingId($user->id,true);
		$htmltree = MemberAPI::getmemberchilds($user->id);
		return Redirect::to(Auth::user()->roleString().'/dashboard')->with('htmltree',$htmltree);
	}
	public function showEmail($templateid,$contactid)
	{
		$contact = Contact::find($contactid);
		$template = EmailTemplate::find($templateid);
		$urlEmail = $template->html_body;

		$emailtemplate = Emailtemplate::findOrFail($id);
		return View::make('emails.templates.default', compact('emailtemplate'));
		
		return View::make('users.showemail')->with('contact',$contact)->with('urlEmail',$urlEmail);
		
	}
	public function showOutbox()
	{
		$emailHistory = EmailHistory::where('member_id',Auth::user()->id)->get();
		// return $emailHistory->toJson();
		return View::make('users.outbox')->with('email_histories',$emailHistory);
	}
	public function sendEmailpost()
	{
		$rules = [
			'contact_id' => 'required',
			'template_id' => 'required'
		];
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
		    return Redirect::back()
		        ->withErrors($validator);
		} else {
			$contact = Contact::find(Input::get('contact_id'));

			if(!$contact->active){
				return Redirect::back()->with('message','Kontak tidak aktif');
			}
			$memberid = Auth::user()->id;
			$contactid = Input::get('contact_id');
			$templateid = Input::get('template_id');
			$issent = EmailSchedullerPool::sendManualEmail($memberid,$contactid,$templateid);
			if($issent){
				return Redirect::to(Auth::user()->roleString().'/outbox')->with('message','Email berhasil dikirim.');
			}
			return Redirect::back()->with('message','Email tidak dapat dikirim, mohon mencoba kembali.');
		}
	}
	public function sendEmail()
	{
		$contacts = Contact::where('user_id',Auth::user()->id)->lists('full_name', 'id');;
		$templates = EmailTemplate::lists('subject', 'id');
		$list_templates = EmailTemplate::all();
		return View::make('users.send', compact('contacts','templates','list_templates'));
	}
	public function showLogin()
	{
	    // show the form
	    return View::make('login');
	    // $host_url = Sysparam::getValue('master_web_dashboard');
	    // return Redirect::to($host_url);
	}
	public function doLogin()
	{
		// validate the info, create rules for the inputs
		$rules = array(
		    'username'    => 'required', // make sure the email is an actual email
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
		        'username'     => Input::get('username'),
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
		$rules['username'] = 'required';
		$rules['name'] = 'required';

		// define input
		$inputs['username'] = Input::get('username');
		$inputs['name'] = Input::get('name');

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
		$status = ['1' => 'Aktif','0' => 'Tidak Aktif'];
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
		$rules['name'] = 'required';
		$rules['username'] = 'required';

		// define input
		$inputs['name'] = Input::get('name');
		$inputs['username'] = Input::get('username');
		$inputs['active'] = Input::get('active');
		$inputs['role_id'] = Input::get('role_id');

		if($inputs['role_id'] == 2) {
			$message = 'Anda tidak bisa mengedit data member melalui sistem AOPS. Harap merubah data member melalui sistem utama.';
		}
		else {

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
			$message = 'Data berhasil disimpan';
		}

		return Redirect::route('admin.users.index')->with("message",$message);
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