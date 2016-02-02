<?php

class EmailTemplatesController extends \BaseController {

	/**
	 * Display a listing of emailtemplates
	 *
	 * @return Response
	 */
	public function showTemplate($template){
		// return $template;
		if (View::exists('emails.templates.'.$template)){
		    return View::make('emails.templates.'.$template);
		}
		return "Template not exist";
	}
	public function index()
	{
		$emailtemplates = Emailtemplate::all();
		// return 'asd';
		return View::make('email_templates.index', compact('emailtemplates'));
	}

	/**
	 * Show the form for creating a new emailtemplate
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('email_templates.create');
	}

	/**
	 * Store a newly created emailtemplate in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Emailtemplate::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Emailtemplate::create($data);

		return Redirect::route('admin.templates.index')->with("message","Data berhasil disimpan");
	}

	/**
	 * Display the specified emailtemplate.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$emailtemplate = Emailtemplate::findOrFail($id);
		return View::make('emails.templates.default', compact('emailtemplate'));
	}

	/**
	 * Show the form for editing the specified emailtemplate.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$emailtemplate = Emailtemplate::find($id);

		return View::make('email_templates.edit', compact('emailtemplate'));
	}

	/**
	 * Update the specified emailtemplate in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$emailtemplate = Emailtemplate::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Emailtemplate::rules($id));

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$emailtemplate->update($data);

		return Redirect::route('admin.templates.index')->with("message","Data berhasil disimpan");
	}

	/**
	 * Remove the specified emailtemplate from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Emailtemplate::destroy($id);

		return Redirect::route('admin.templates.index')->with('message', 'Data berhasil dihapus');
	}

}
