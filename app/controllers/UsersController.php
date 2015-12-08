<?php

class UsersController extends BaseController {

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
		    if (Auth::attempt($userdata)) {

		    	// validation successful!
		        // redirect them to the secure section or whatever
		        // Auth::user()->role;
		        return Redirect::to('admin/dashboard');

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

		if(Input::has('password'))
		{
			$inputs['password']					= Hash::make(Input::get('password'));
			$rules['password'] 					= 'required|min:8|confirmed';
			$rules['password_confirmation'] 	= 'required|min:8';
		}

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$user->update($inputs);

		return Redirect::route('admin.users.index')->with("message","Data berhasil disimpan");
	}

	public function updateProfile()
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

		if(Input::has('password'))
		{
			$inputs['password']					= Hash::make(Input::get('password'));
			$rules['password'] 					= 'required|min:8|confirmed';
			$rules['password_confirmation'] 	= 'required|min:8';
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

	/**
	 * Show the form for creating a new post
	 *
	 * @return Response
	 */
	public function create()
	{
		$status = ['1' => 'Active','0' => 'Not Active'];
		$roles = Role::lists('name', 'id');
		return View::make('users.create', compact('roles', 'status'));
	}

	/**
	 * Store a newly created post in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$file = Input::file('image');
		$category = Postcategory::find(Input::get('post_category_id'));

		$data = array(
			'title'				=> ucwords(Input::get('title')),
			'slug'				=> $this->slugify(Input::get('title')),
			'content'			=> Input::get('content'),
			'excerpt'			=> Input::get('excerpt'),
			'post_category_id'	=> Input::get('post_category_id'),
			'created_at'		=> Input::get('created_at'),
			'status'			=> Input::get('status'),
			'comment_status'	=> Input::get('comment_status'),
			'social_status'		=> Input::get('social_status')
		);

		$validator = Validator::make($data, Post::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		if (Input::hasFile('image')) {
			// checking file is valid.
			if (Input::file('image')->isValid()) {
				$destinationPath = '/uploads/'.$category->slug; // upload path
				$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
				$fileName = rand(1,1000).'_'.$data['slug'].'.'.$extension; // renameing image
				Input::file('image')->move(public_path().$destinationPath, $fileName); // uploading file to given path
				$data['image'] = $destinationPath."/".$fileName;
			}
			else {
				// sending back with error message.
				return Redirect::back()->with('errors', 'Uploaded file is not valid')->withInput();
			}
		}

		$post = Post::create($data);

		if (Input::has('related_members')) {
			$post->members()->sync(Input::get('related_members'));
		}

		$url = url('posts') . '/' . $data['slug'];

		// if(Sysparam::getValue('twitter_autopost') == 1) {
		// 	Twitter::postTweet(['status' => $data['title'] . $url, 'format' => 'json']);
		// }

		return Redirect::route('admin.posts.index')->with("message","Data berhasil disimpan");
	}

	public function edit($id)
	{
		$user = User::find($id);
		$status = ['1' => 'Active','0' => 'Not Active'];
		$roles = Role::lists('name', 'id');
		return View::make('users.edit', compact('user', 'roles', 'status'));
	}

}
