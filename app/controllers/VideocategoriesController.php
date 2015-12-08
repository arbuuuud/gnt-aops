<?php

class VideocategoriesController extends \BaseController {

	/**
	 * Display a listing of videocategories
	 *
	 * @return Response
	 */
	public function index()
	{
		$videocategories = Videocategory::get();

		return View::make('videocategories.index', compact('videocategories'));
	}

	public function showPublicIndex()
	{
		$videocategories = Videocategory::all();
		$videos = Video::orderBy('created_at', 'desc')->paginate(12);

		return View::make('videocategories.publicindex', compact('videocategories','videos'));
	}

	/**
	 * Show the form for creating a new videocategory
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('videocategories.create');
	}

	/**
	 * Store a newly created videocategory in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = array(
			'title'		=> ucwords(Input::get('title')),
			'slug'		=> $this->slugify(Input::get('title'))
		);

		$validator = Validator::make($data, Videocategory::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$videocategory = Videocategory::create($data);

		return Redirect::route('admin.videocategories.edit', $videocategory->id)->with("message","Data berhasil disimpan");
	}

	/**
	 * Display the specified videocategory for admin.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$videocategory = Videocategory::where('slug', '=', $slug)->firstOrFail();
		$videos = $videocategory->videos()->orderBy('created_at', 'desc')->get();
		return View::make('videocategories.show', compact('videocategory','videos'));
	}

	/**
	 * Display the specified Videocategory and their photos for public.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showArchive($slug)
	{
		$videocategories = Videocategory::all();
		$videocategory = Videocategory::where('slug', '=', $slug)->firstOrFail();
		$videos = $videocategory->videos()->orderBy('created_at', 'desc')->paginate(12);
		return View::make('videocategories.archive', compact('videocategories','videocategory','videos'));
	}

	/**
	 * Show the form for editing the specified videocategory.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$videocategory = Videocategory::find($id);

		return View::make('videocategories.edit', compact('videocategory'));
	}

	/**
	 * Update the specified videocategory in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$videocategory = Videocategory::findOrFail($id);

		$data = array(
			'title'		=> ucwords(Input::get('title')),
			'slug'		=> $this->slugify(Input::get('slug'))
		);

		$validator = Validator::make($data = Input::all(), Videocategory::rules($id));

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$videocategory->update($data);

		return Redirect::route('admin.videocategories.edit', $videocategory->id)->with("message","Data berhasil disimpan");
	}

	/**
	 * Remove the specified videocategory from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Videocategory::destroy($id);
		return Redirect::route('admin.videocategories.index')->with('message', 'Data berhasil dihapus');
	}

	public function slugify($text)
    { 
      // replace non letter or digits by -
      $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

      // trim
      $text = trim($text, '-');

      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

      // lowercase
      $text = strtolower($text);

      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);

      if (empty($text))
      {
        return 'n-a';
      }

      return $text;
    }

}
