<?php

class MemberGalleriesController extends \BaseController {

	/**
	 * Display a listing of membergalleries
	 *
	 * @return Response
	 */
	public function index()
	{
		$membergalleries = Membergallery::all();

		return View::make('membergalleries.index', compact('membergalleries'));
	}

	/**
	 * Show the form for creating a new membergallery
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('membergalleries.create');
	}

	/**
	 * Store a newly created membergallery in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Membergallery::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Membergallery::create($data);

		return Redirect::route('membergalleries.index');
	}

	/**
	 * Display the specified membergallery.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$member = Member::where('slug', '=', $slug)->firstOrFail();
		$galleries = $member->galleries()->orderBy('created_at', 'desc')->paginate(10);

		return View::make('membergalleries.show', compact('member','galleries'));
	}

	/**
	 * Show the form for editing the specified membergallery.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$membergallery = Membergallery::find($id);

		return View::make('membergalleries.edit', compact('membergallery'));
	}

	/**
	 * Update the specified membergallery in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$membergallery = Membergallery::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Membergallery::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$membergallery->update($data);

		return Redirect::route('membergalleries.index');
	}

	/**
	 * Remove the specified membergallery from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Membergallery::destroy($id);

		return Redirect::route('membergalleries.index');
	}

}
