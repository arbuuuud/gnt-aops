<?php

class GuestmailsController extends \BaseController {

	/**
	 * Display a listing of guestmails
	 *
	 * @return Response
	 */
	public function index()
	{
		$guestmails = Guestmail::all();

		return View::make('guestmails.index', compact('guestmails'));
	}

	public function showArchive()
	{
		$guestmails = Guestmail::published()
					->orderBy('created_at', 'desc')
					->paginate(10);

		return View::make('guestmails.archive', compact('guestmails'));
	}

	/**
	 * Show the form for creating a new guestmail
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('guestmails.create');
	}

	/**
	 * Store a newly created guestmail in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = array(
			'name' 		=> Purifier::clean(Input::get('name')),
			'address'	=> Purifier::clean(Input::get('address')),
			'city'		=> Purifier::clean(Input::get('city')),
			'phone'		=> Purifier::clean(Input::get('phone')),
			'email'		=> Purifier::clean(Input::get('email')),
			'title'		=> Purifier::clean(Input::get('title')),
			'content'	=> Purifier::clean(Input::get('content')),
			'captcha'	=> Input::get('captcha'),
			'status'	=> Input::get('status')
		);
		
		$messages = array(
		    'captcha.captcha' => 'Captcha yang Anda masukan salah, harap mencoba kembali.',
		);

		$validator = Validator::make($data, Guestmail::$rules, $messages);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		unset($data['captcha']);
		Guestmail::create($data);

		Mail::send('emails.guestmail', $data, function($message) {
        	$message->to(Sysparam::getValue('admin_email'))->subject('Surat Pembaca | MPRgoid');
        	// $message->to('rengga.saksono@asclar.com')->subject('Surat Pembaca | MPRgoid');
    	});

		return Redirect::route('surat.create')->with("message","Terima kasih telah menulis surat kepada MPR, surat Anda akan kami review dan akan ditampilkan di halaman Surat Pembaca setelah kami setuju untuk ditampilkan.");
	}

	/**
	 * Display the specified guestmail.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$guestmail = Guestmail::findOrFail($id);

		return View::make('guestmails.show', compact('guestmail'));
	}

	/**
	 * Show the form for editing the specified guestmail.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$guestmail = Guestmail::find($id);

		return View::make('guestmails.edit', compact('guestmail'));
	}

	/**
	 * Update the specified guestmail in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$guestmail = Guestmail::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Guestmail::rules());

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$guestmail->update($data);

		return Redirect::route('admin.guestmails.edit', $guestmail->id)->with('message', 'Data berhasil disimpan');
	}

	/**
	 * Remove the specified guestmail from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Guestmail::destroy($id);

		return Redirect::route('admin.guestmails.index')->with('message', 'Data berhasil dihapus');
	}

}
