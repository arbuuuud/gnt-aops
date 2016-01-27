<?php

class ContactsController extends \BaseController {

	/**
	 * Display a listing of contacts
	 *
	 * @return Response
	 */
	public function index()
	{
		$memberCollection = array();
		if(Auth::user()->isAdmin()){
			$contacts = Contact::all();
		}else{
			$contacts = Contact::where('member_id',Auth::user()->id)->get();
			$memberCollection = MemberAPI::getmemberapiselect(Auth::user()->id);
			foreach ($memberCollection as $member) {
				if(!User::find($member->member_id)){
					$user = new User();
					$user->id = $member->member_id; 
					$user->first_name = $member->name; 
					$user->last_name = ""; 
					$user->email =$member->name; 

					$user->password = Hash::make(rand());
					$user->active = 1; 
					$user->save();
				}
				$membercontacts = Contact::where('member_id',$member->member_id)->get();
				$contacts =  $contacts->merge($membercontacts);
			}
			// return $contacts->toJson();
		}

		return View::make('contacts.index', compact('contacts', 'memberCollection'));
	}

	// public function index()
	// {

	// 	if(Auth::user()->isAdmin()){
	// 		$contacts = Contact::all();
	// 	}else{
	// 		$member = Member::where('user_id',Auth::user()->id)->first();
	// 		if($member){
	// 			$contacts = Contact::where('member_id',$member->id)->get();
	// 			$memberCollection = $member->members;
	// 			$memberCollection->add($member);
	// 		}else{
	// 			$contacts = null;
	// 		}
	// 	}

	// 	return View::make('contacts.index', compact('contacts', 'memberCollection'));
	// }

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
	public function registercontact()
	{

		$contact = Contact::find(60);
		$bool = $contact->insertPoolingSchedule($contact->id,$contact->member_id,1);
		return $bool;

		$customRule = [
			'full_name' => 'required',
			'email'	=> 'required|email|unique:contacts',
			'phone_number' => 'required'
		];
		$validator = Validator::make($data = Input::all(), $customRule);

		if ($validator->fails())
		{
			// return var_dump($validator);
			return Redirect::back()->withErrors($validator)->withInput();
		}

		// $member = Member::where('user_id',Auth::user()->id)->first();

		// $data['member_id'] = Auth::user()->id;   
		$data['active'] = 1;
		$data['isAutomaticFollowUp'] = 1;
		$data['email_sent'] = "";
		
		$contact = new Contact();
		$contact->member_id = $data['member_id']; 
		$contact->first_name = $data['full_name']; 
		$contact->email = $data['email']; 
		$contact->phone_home = $data['phone_number']; 
		$contact->email_sent = $data['email_sent']; 
		$contact->isAutomaticFollowUp = $data['isAutomaticFollowUp']; 
		$contact->active = $data['active']; 
		$contact->save();
		$contact->insertPoolingSchedule($contact->id,$contact->member_id,1);

		$template = 'emails.registercontact';
		$data['contact'] = $contact;	
        Mail::send($template, $data, function($message) use($data) {
    		$message->to($data['contact']->email, $data['contact']->first_name)->subject('Welcome to the GNT AOPS!');
		});

		return View::make('pages.templates.peluang', compact('latest_news', 'popular_news'));
	}
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Contact::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		// $member = Member::where('user_id',Auth::user()->id)->first();

		$data['member_id'] = Auth::user()->id;   
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
