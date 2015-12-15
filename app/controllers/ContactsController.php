<?php

class ContactsController extends \BaseController {

	/**
	 * Display a listing of contacts
	 *
	 * @return Response
	 */
	public function index()
	{
		$contacts = Contact::all();

		return View::make('contacts.index', compact('contacts'));
	}

	/**
	 * Show the form for creating a new Contact
	 *
	 * @return Response
	 */
	public function create()
	{

		$active = ['1' => 'Active','0' => 'Not Active'];
		$automaticFollowUp = ['1' => 'Automatic','0' => 'Manual'];
		$gender = ['1'=>'Male','0'=>'Female'];

		return View::make('contacts.create', compact('active','automaticFollowUp','gender'));
	}

	/**
	 * Store a newly created Contact in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Contact::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		
		$data['member_id'] = 1;   //anto : isi ngasal dulu deh to pake id 1 (pastiin member id 1 ada di phpmyadmin ya nto.. kalo g ada buat aja ngasal) 
									// anto : sama di table member_configuration insert manual dlu ya nto di phpmyadmin biar function insertpool dibawah g error
									        //isi pake : id=1, member_id=1, param_code=FOLLOW_UP_SEQUENCE, param_value= 3
		$data['active'] = 1;
		$data['isAutomaticFollowUp'] = 1;
		$data['email_sent'] = "";
		
		$contact = Contact::create($data);
		$contact->insertPoolingSchedule($contact->id,$contact->member_id,1);
		 
		return Redirect::route('admin.contacts.index');
	}

	/**
	 * Display the specified Contact.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$Contact = Contact::findOrFail($id);

		return View::make('contacts.show', compact('Contact'));
	}

	/**
	 * Show the form for editing the specified Contact.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$active = ['1' => 'Active','0' => 'Not Active'];
		$automaticFollowUp = ['1' => 'Automatic','0' => 'Manual'];
		$gender = ['1'=>'Male','0'=>'Female'];
		$Contact = Contact::find($id);

		return View::make('contacts.edit', compact('Contact', 'active','automaticFollowUp','gender'));
	}

	/**
	 * Update the specified Contact in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$Contact = Contact::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Contact::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$Contact->update($data);

		return Redirect::route('admin.contacts.index');
	}

	/**
	 * Remove the specified Contact from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Contact::destroy($id);

		return Redirect::route('admin.contacts.index');
	}

}
