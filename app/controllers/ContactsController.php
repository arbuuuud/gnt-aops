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
		$memberCollection = MemberAPI::getmemberapiselect(Auth::user()->id);
		foreach ($memberCollection as $member) {
			if(!User::find($member->member_id)){
				$user = new User();
				$user->id = $member->member_id; 
				$user->username = $member->username; 
				$user->name = $member->name; 

				$user->password = Hash::make(rand());
				$user->active = 1; 
				$user->save();
			}
			$membercontacts = Contact::where('user_id',$member->member_id)->get();
			$contacts =  $contacts->merge($membercontacts);
		}
		return View::make('contacts.index', compact('contacts', 'memberCollection'));
	}

	public function showMemberContacts()
	{
		$memberCollection = array();
		if(Auth::user()->isAdmin()){
			$contacts = Contact::all();
		}else{
			$contacts = Contact::where('user_id',Auth::user()->id)->get();
			$memberCollection = MemberAPI::getmemberapiselect(Auth::user()->id);
			foreach ($memberCollection as $member) {
				if(!User::find($member->member_id)){
					$user = new User();
					$user->id = $member->member_id; 
					$user->username = $member->username; 
					$user->name = $member->name; 

					$user->password = Hash::make(rand());
					$user->active = 1; 
					$user->save();
				}
				$membercontacts = Contact::where('user_id',$member->member_id)->get();
				$contacts =  $contacts->merge($membercontacts);
			}
			// return $contacts->toJson();
		}

		return View::make('contacts.member', compact('contacts', 'memberCollection'));
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
	public function registercontact()
	{
		$customRule = [
			'nama_lengkap' => 'required',
			'email'	=> 'required|email|unique:contacts',
			'No_telepon' => 'required'
		];
		$messages = array(
			'required' => 'Harap mengisi informasi :attribute.',
			'email' => 'Format email yang diberikan salah.',
			'unique' => ':attribute sudah terdaftar, mohon menggunakan :attribute lain.'
		);
		$validator = Validator::make($data = Input::all(), $customRule, $messages);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$data['active'] = 1;
		$data['isAutomaticFollowUp'] = 1;
		$data['email_sent'] = "";
		
		$contact = new Contact();
		$contact->user_id = $data['member_id']; 
		$contact->full_name = ucwords(Input::get('nama_lengkap')); 
		$contact->email = Input::get('email'); 
		$contact->phone_number = Input::get('no_telepon'); 
		$contact->email_sent = $data['email_sent']; 
		$contact->isAutomaticFollowUp = $data['isAutomaticFollowUp']; 
		$contact->active = $data['active']; 
		$contact->save();
		$contact->insertPoolingSchedule($contact->id,$contact->user_id,1);

		$template = 'emails.registercontact';
		$data['contact'] = $contact;	
        Mail::send($template, $data, function($message) use($data) {
    		$message->to($data['contact']->email, $data['contact']->full_name)->subject('Terimakasih atas ketertarikan Anda terhadap GNT Club!');
		});

		return Redirect::to('peluang');
	}
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Contact::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$data['member_id'] = Auth::user()->id;   
		$data['active'] = 1;
		$data['isAutomaticFollowUp'] = 1;
		$data['email_sent'] = "";
		
		$contact = Contact::create($data);
		$contact->insertPoolingSchedule($contact->id,$contact->user_id,1);
		
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
		$active = ['1' => 'Aktif','0' => 'Tidak Aktif'];
		$automaticFollowUp = ['1' => 'Automatic','0' => 'Manual'];
		$contact = Contact::find($id);

		return View::make('contacts.edit', compact('contact', 'active','automaticFollowUp'));
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

		return Redirect::route(Auth::user()->roleString().'.contacts.index')->with("message","Data berhasil disimpan");
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
			$message = 'Anda telah berhasil di unsubscribe dari newsletter kami.';
		}else{
			$message = 'Request tidak berhasil, mohon refresh halaman dan mencoba kembali.';
		}
		return View::make('pages.templates.unsubscribe')->with('message', $message);

	}

}
