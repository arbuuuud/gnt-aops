<?php

class ContactsController extends \BaseController {

	/**
	 * Display a listing of contacts
	 *
	 * @return Response
	 */
	public function index()
	{

		if(Auth::user()->isAdmin()){
			$contacts = Contact::all();
		}else{
			$member = Member::where('user_id',Auth::user()->id)->first();
			if($member){
				$contacts = Contact::where('member_id',$member->id)->get();
				$memberCollection = $member->members;
				$memberCollection->add($member);
			}else{
				$contacts = null;
			}
		}

		return View::make('contacts.index', compact('contacts', 'memberCollection'));
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

		$member = Member::where('user_id',Auth::user()->id)->first();

		$data['member_id'] = $member->id;   
		$data['active'] = 1;
		$data['isAutomaticFollowUp'] = 1;
		$data['email_sent'] = "";
		
		$contact = Contact::create($data);
		$contact->insertPoolingSchedule($contact->id,$contact->member_id,1);
		
		return Redirect::route(Auth::user()->roleString().'.contacts.index');
	}

	/**
	 * Display the specified Contact.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$contact = Contact::findOrFail($id);
		$contacts = Contact::find($id);
		$email_histories = $contact->emailhistories;

		return View::make('contacts.show', compact('contact','contacts','email_histories'));
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
		$contact = Contact::find($id);

		return View::make('contacts.edit', compact('contact', 'active','automaticFollowUp','gender'));
	}

	/**
	 * Update the specified Contact in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$contact = Contact::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Contact::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$contact->update($data);

		return Redirect::route('admin.contacts.edit', $member->id)->with("message","Data berhasil disimpan");
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

		return Redirect::route('admin.contacts.index')->with('message', 'Data deleted successfully');

	}

	public function unsubscribe($contactstring)
	{
		// return $this->encryptContact(1);
		// $contact = Contact::decryptContact($contactstring);
		// return $contact->email;	
		return View::make('pages.templates.unsubscribe')->with('contactstring', $contactstring);;
	}
	public function unsubscribeconfirm($contactString)
	{
		//return page unsubscribe
		$contact = Contact::decryptContact($contactString);
		if($contact){
			$contact->active = 0;
			$contact->save();
			$message = 'Contact berhasil di unsubscribe';
		}else{
			$message = 'gagal';
		}
		return View::make('pages.templates.unsubscribe')->with('message', $message);

	}

}
