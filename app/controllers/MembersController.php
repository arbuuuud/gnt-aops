<?php

class MembersController extends \BaseController {

	/**
	 * Display a listing of members
	 *
	 * @return Response
	 */

    public function showDashboard()
	{
		$htmltree = MemberAPI::getmemberchilds();
		return View::make('members.dashboard')->with('htmltree',$htmltree);

	}

	public function index()
	{
		$members = Member::all();
//		$members = Member::orderBy('first_name', 'asc')->get();

		return View::make('members.index', compact('members'));
	}

	/**
	 * Show the form for creating a new member
	 *
	 * @return Response
	 */
	public function create()
	{
		$active = ['1' => 'Active','0' => 'Not Active'];
		$gender = ['1'=>'Male','0'=>'Female'];

		return View::make('members.create', compact('members','active','gender'));
	}

	/**
	 * Store a newly created member in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();

		$validator = Validator::make($data, Member::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		//$member = Member::create($data);
		$user = new User();
		$user->first_name = $data['first_name'];
		$user->last_name = $data['last_name'];
		$user->email = $data['email'];
		$user->password = Hash::make($data['password']);
		$user->save();	

		$member = new Member();
		$member->first_name = $data['first_name'];
		$member->last_name = $data['last_name'];
		$member->email = $data['email'];
		$member->address = $data['address'];
		$member->active = 1;
		$member->user_id = $user->id;
		$member->city = $data['city'];
		$member->province = $data['province'];
		$member->gender = $data['gender'];
		$member->phone_mobile = $data['phone_mobile'];
		$member->save();

		$memberconfig = new MemberConfiguration();
		$memberconfig->param_code = "FOLLOW_UP_SEQUENCE";
		$memberconfig->param_value = 3;
		$memberconfig->member_id = $member->id;
		$memberconfig->save();

		if (Input::hasFile('image')) {
			// checking file is valid.
			if (Input::file('image')->isValid()) {
				$destinationPath = '/uploads/anggota'; // upload path
				$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
				$fileName = $member->id.'.'.$extension; // renameing image
				Input::file('image')->move(public_path().$destinationPath, $fileName); // uploading file to given path
				$data['image'] = $destinationPath."/".$fileName;
				$member->update($data);
			}
			else {
				// sending back with error message.
				return Redirect::back()->with('errors', 'Uploaded file is not valid')->withInput();
			}
		}

		return Redirect::route('admin.members.edit', $member->id)->with("message","Data berhasil disimpan");
	}

	/**
	 * Display the specified member.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$member = Member::findOrFail($id);

		return View::make('members.show', compact('member'));
	}

	/**
	 * Display the profile page of member.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showProfile($slug)
	{
		$member = Member::where('slug', '=', $slug)->published()->first();

		if($member) {
			$category_siaran_pers = Postcategory::where('slug', '=', 'berita')->firstOrFail();
			$related_posts = $member->posts()->orderBy('created_at', 'desc')->take(10)->get();
			$related_galleries = $member->galleries()->published()->orderBy('created_at', 'desc')->take(5)->get();

			return View::make('members.profile', compact('member','related_posts','related_galleries'));
		}
		else {
			return View::make('layouts.unpublished');
		}
	}

	public function showOrganizationPosition($query)
	{
		$position = ($query == 'pimpinan') ? '1' : '0';
		$members = Member::where('organization_position', '=', $position)->paginate(10);

		return View::make('members.show', compact('members'));
	}

	/**
	 * Show the form for editing the specified member.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$active = ['1' => 'Active','0' => 'Not Active'];
		$gender = ['1'=>'Male','0'=>'Female'];
		$member = Member::find($id);

		return View::make('members.edit', compact('member','active','gender'));
	}

	/**
	 * Update the specified member in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	
	public function update($id)
	{
		$member = Member::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Member::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$member->update($data);

		return Redirect::route('admin.members.edit', $member->id)->with("message","Data saved successfully");
	}
/*
	public function update($id)
	{
		$member = Member::findOrFail($id);
		$data = Input::all();
		$data['slug'] = $this->slugify(Input::get('name'));
		$data['image'] = Input::file('image') ? Input::file('image') : $member->image;
		// dd($data);

		$validator = Validator::make($data, Member::rules($id));

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		if (Input::hasFile('image')) {
			// checking file is valid.
			if (Input::file('image')->isValid()) {
				$destinationPath = '/uploads/anggota'; // upload path
				$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
				$fileName = $id.'.'.$extension; // renameing image
				Input::file('image')->move(public_path().$destinationPath, $fileName); // uploading file to given path
				$data['image'] = $destinationPath."/".$fileName;
			}
			else {
				// sending back with error message.
				return Redirect::back()->with('errors', 'Uploaded file is not valid')->withInput();
			}
		}

		$member->update($data);

		return Redirect::route('admin.members.edit', $member->id)->with("message","Data berhasil disimpan");
	}
*/
	/**
	 * Remove the specified member from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Member::destroy($id);

		return Redirect::route('admin.members.index')->with('message', 'Data deleted successfully');
	}
/*
	public function slugify($text)
    { 
      // replace non letter or digits by -
      $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

      // trim
      $text = trim($text, '-');

      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

      // lowercase
      $text = strtolower($text);

      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);

      if (empty($text))
      {
        return 'n-a';
      }

      return $text;
    }
*/
}
