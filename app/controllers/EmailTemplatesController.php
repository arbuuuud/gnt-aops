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
		return "Template does not exist";
	}
	public function index()
	{
		$emailtemplates = EmailTemplate::all();
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
		$validator = Validator::make($data = Input::all(), EmailTemplate::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		EmailTemplate::create($data);

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
		$emailtemplate = EmailTemplate::findOrFail($id);
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
		$emailtemplate = EmailTemplate::find($id);

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
		$emailtemplate = EmailTemplate::findOrFail($id);

		$validator = Validator::make($data = Input::all(), EmailTemplate::rules($id));

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
