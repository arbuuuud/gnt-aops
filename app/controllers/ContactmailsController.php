<?php

class ContactmailsController extends \BaseController {

	/**
	 * Display a listing of contactmails
	 *
	 * @return Response
	 */
	public function index()
	{
		$contactmails = Contactmail::orderBy('created_at', 'desc')->get();

		return View::make('contactmails.index', compact('contactmails'));
	}

	/**
	 * Show the form for creating a new contactmail
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('contactmails.create');
	}

	/**
	 * Store a newly created contactmail in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = array(
			'name' 		=> Purifier::clean(Input::get('name')),
			'phone'		=> Purifier::clean(Input::get('phone')),
			'email'		=> Purifier::clean(Input::get('email')),
			'content'	=> Purifier::clean(Input::get('content')),
			'captcha'	=> Input::get('captcha')
		);

		$messages = array(
		    'captcha.captcha' => 'Captcha yang Anda masukan salah, harap mencoba kembali.',
		);

		$validator = Validator::make($data, Contactmail::$rules, $messages);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		unset($data['captcha']);
		Contactmail::create($data);

		Mail::send('emails.contactmail', $data, function($message) {
        	$message->to(Sysparam::getValue('admin_email'))->subject('Surat Pembaca | MPRgoid');
        	// $message->to('rengga.saksono@asclar.com')->subject('Kontak | MPRgoid');
    	});

		return Redirect::route('kontak.create')->with("message","Terima kasih atas kesediaan waktu Anda mengirim pesan kepada MPR.");
	}

	/**
	 * Display the specified contactmail.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$contactmail = Contactmail::findOrFail($id);

		return View::make('contactmails.show', compact('contactmail'));
	}

	/**
	 * Show the form for editing the specified contactmail.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$contactmail = Contactmail::find($id);

		return View::make('contactmails.edit', compact('contactmail'));
	}

	/**
	 * Update the specified contactmail in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$contactmail = Contactmail::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Contactmail::rules());

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$contactmail->update($data);

		return Redirect::route('admin.contactmails.edit', $contactmail->id)->with('message', 'Data berhasil disimpan');
	}

	/**
	 * Remove the specified contactmail from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Contactmail::destroy($id);

		return Redirect::route('admin.contactmails.index')->with('message', 'Data berhasil dihapus');
	}

}
