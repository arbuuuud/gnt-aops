<?php

class PostCategoriesController extends \BaseController {

	/**
	 * Display a listing of postcategories
	 *
	 * @return Response
	 */
	public function index()
	{
		$postcategories = Postcategory::all();

		return View::make('postcategories.index', compact('postcategories'));
	}

	/**
	 * Show the form for creating a new Postcategory
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('postcategories.create');
	}

	/**
	 * Store a newly created Postcategory in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Postcategory::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Postcategory::create($data);

		return Redirect::route('admin.postcategories.index');
	}

	/**
	 * Display the specified Postcategory.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$category = Postcategory::where('slug', '=', $slug)->firstOrFail();
		$posts = $category->posts()->orderBy('created_at', 'desc')->get();

		return View::make('postcategories.show', compact('category', 'posts'));	
	}

	/**
	 * Display the specified Postcategory.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showArchive($slug, $date = NULL)
	{
		$category = Postcategory::where('slug', '=', $slug)->firstOrFail();

		if($category) {
			$posts = $category->posts();

			if ($date != NULL) {
				$posts = $posts->like('created_at', $date);
			}

			$posts = $posts->paginate(10);
			return View::make('postcategories.archive', compact('category', 'posts'));	
		}
		else {
			return 'Not Found';
		}
	}

	/**
	 * Show the form for editing the specified Postcategory.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Postcategory = Postcategory::find($id);

		return View::make('postcategories.edit', compact('Postcategory'));
	}

	/**
	 * Update the specified Postcategory in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$Postcategory = Postcategory::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Postcategory::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$Postcategory->update($data);

		return Redirect::route('admin.postcategories.index');
	}

	/**
	 * Remove the specified Postcategory from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Postcategory::destroy($id);

		return Redirect::route('postcategories.index');
	}

}
