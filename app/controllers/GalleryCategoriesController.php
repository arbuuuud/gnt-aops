<?php

class GalleryCategoriesController extends \BaseController {

	/**
	 * Display a listing of gallerycategories
	 *
	 * @return Response
	 */
	public function index()
	{
		$gallerycategories = Gallerycategory::get();

		return View::make('gallerycategories.index', compact('gallerycategories'));
	}

	/**
	 * Display the main archive of the galeri page for public.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showPublicIndex()
	{
		$gallerycategories = Gallerycategory::published()->menuOrder()->get();
		$galleries = Gallery::published()->latest()->paginate(12);

		// foreach ($galleries as $gallery) {
		// 	echo $gallery->id;
		// }

		return View::make('gallerycategories.publicindex', compact('gallerycategories','galleries'));
	}

	/**
	 * Show the form for creating a new gallerycategory
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('gallerycategories.create');
	}

	/**
	 * Store a newly created gallerycategory in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = array(
			'title'		=> ucwords(Input::get('title')),
			'slug'		=> $this->slugify(Input::get('title'))
		);

		$validator = Validator::make($data, Gallerycategory::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$gallerycategory = Gallerycategory::create($data);

		return Redirect::route('admin.gallerycategories.edit', $gallerycategory->id)->with("message","Data berhasil disimpan");
	}

	/**
	 * Display the specified gallerycategory for admin.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$gallerycategory = Gallerycategory::where('slug', '=', $slug)->firstOrFail();
		$galleries = $gallerycategory->galleries()->orderBy('created_at', 'desc')->get();
		return View::make('gallerycategories.show', compact('gallerycategory','galleries'));
	}

	/**
	 * Display the specified Postcategory and their photos for public.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showArchive($slug)
	{
		$gallerycategories = Gallerycategory::published()->menuOrder()->get();
		
		$gallerycategory = Gallerycategory::where('slug', '=', $slug)->firstOrFail();
		$galleries = $gallerycategory->galleries()->published()->orderBy('created_at', 'desc')->paginate(12);

		return View::make('gallerycategories.archive', compact('gallerycategories','gallerycategory','galleries'));
	}

	/**
	 * Show the form for editing the specified gallerycategory.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$gallerycategory = Gallerycategory::find($id);

		return View::make('gallerycategories.edit', compact('gallerycategory'));
	}

	/**
	 * Update the specified gallerycategory in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$gallerycategory = Gallerycategory::findOrFail($id);

		$data = array(
			'title'		=> ucwords(Input::get('title')),
			'slug'		=> $this->slugify(Input::get('slug'))
		);

		$validator = Validator::make($data, Gallerycategory::rules($id));

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$gallerycategory->update($data);

		return Redirect::route('admin.gallerycategories.edit', $gallerycategory->id)->with("message","Data berhasil disimpan");
	}

	/**
	 * Remove the specified gallerycategory from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Gallerycategory::destroy($id);

		return Redirect::route('admin.gallerycategories.index')->with('message', 'Data berhasil dihapus');
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
