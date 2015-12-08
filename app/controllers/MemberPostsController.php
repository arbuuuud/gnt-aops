<?php

class MemberPostsController extends \BaseController {

	/**
	 * Display a listing of memberposts
	 *
	 * @return Response
	 */
	public function index()
	{
		$memberposts = Memberpost::all();
		
		return View::make('memberposts.index', compact('memberposts'));
	}

	/**
	 * Show the form for creating a new memberpost
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('memberposts.create');
	}

	/**
	 * Store a newly created memberpost in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Memberpost::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Memberpost::create($data);

		return Redirect::route('memberposts.index');
	}

	/**
	 * Display the specified memberpost.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$member = Member::where('slug', '=', $slug)->firstOrFail();
		$posts = $member->posts()->orderBy('created_at', 'desc')->paginate(10);

		return View::make('memberposts.show', compact('member','posts'));
	}

	/**
	 * Show the form for editing the specified memberpost.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$memberpost = Memberpost::find($id);

		return View::make('memberposts.edit', compact('memberpost'));
	}

	/**
	 * Update the specified memberpost in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$memberpost = Memberpost::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Memberpost::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$memberpost->update($data);

		return Redirect::route('memberposts.index');
	}

	/**
	 * Remove the specified memberpost from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Memberpost::destroy($id);

		return Redirect::route('memberposts.index');
	}

}
