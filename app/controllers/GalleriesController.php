<?php

class GalleriesController extends \BaseController {

	/**
	 * Display a listing of galleries
	 *
	 * @return Response
	 */
	public function index()
	{
		$galleries = Gallery::all();

		return View::make('galleries.index', compact('galleries'));
	}

	/**
	 * Show the form for creating a new gallery
	 *
	 * @return Response
	 */
	public function create()
	{
		$gallerycategories = Gallerycategory::lists('title', 'id');
		$members = Member::lists('name', 'id');
		return View::make('galleries.create', compact('gallerycategories','members'));
	}

	/**
	 * Store a newly created gallery in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = array(
			'title'		=> ucwords(Input::get('title')),
			'slug'		=> $this->slugify(Input::get('title')),
			'content'	=> Input::get('content'),
			'excerpt'	=> Input::get('excerpt'),
			'gallery_category_id'	=> Input::get('gallery_category_id'),
			'status'	=> Input::get('status'),
			'comment_status'	=> Input::get('comment_status'),
			'social_status'		=> Input::get('social_status')
		);

		$validator = Validator::make($data, Gallery::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$gallery = Gallery::create($data);

		// No longer needed, karena photo akan diupload setelah galeri berhasil dibuat
		// if (Input::hasFile('images')) {

		// 	$files = Input::file('images');
		// 	$image_width = Sysparam::getValue('gallery_min_width');
		// 	$image_height = Sysparam::getValue('gallery_min_height');

		// 	foreach($files as $file) {

		// 		if($file !== NULL) {
			    
		// 		    $rules = array(
		// 		       'file' => 'required|image|image_size:>='.$image_width.',>='.$image_height.''
		// 		    );

		// 		    $validator = Validator::make(array('file'=> $file), $rules);

		// 		    if($validator->passes()) {
		// 		    	// Move the photo
		// 		        $destinationPath = '/uploads/galeri/'.$gallery->category->slug; // upload path
		// 				$extension = $file->getClientOriginalExtension(); // getting image extension
		// 				$fileName = rand(1,1000).'_'.$file->getClientOriginalName(); // renameing image
		// 				$file->move(public_path().$destinationPath, $fileName); // uploading file to given path

		// 				// Save the photo
		// 				$dataimage['title'] = $file->getClientOriginalName();
		// 				$dataimage['image'] = $destinationPath."/".$fileName;
		// 				$dataimage['gallery_id'] = $gallery->id;
		// 				Photo::create($dataimage);
		// 			}
		// 			else {
		// 				// sending back with error message.
		// 				return Redirect::back()->with('errors', 'File yang Anda pilih tidak valid, mohon mencoba kembali')->withInput();
		// 			}
		// 		}
		// 	}
		// }

		if (Input::has('related_members')) {
			$gallery->members()->sync(Input::get('related_members'));
		}

		return Redirect::route('admin.galleries.edit', $gallery->id)->with("message","Data berhasil disimpan");
	}

	/**
	 * Display the specified gallery.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$gallerycategories = Gallerycategory::published()->menuOrder()->get();
		$gallery = Gallery::where('slug', '=', $slug)->published()->first();
		if($gallery) {
			$related_posts = Gallery::where('gallery_category_id', $gallery->gallery_category_id)
						->with('photos')
						->whereNotIn('id', array($gallery->id))
						->orderBy('created_at', 'desc')
						->take(5)
						->get();
			return View::make('galleries.show', compact('gallerycategories','gallery','related_posts'));
		}
		else {
			return View::make('layouts.unpublished');
		}
	}

	/**
	 * Show the form for editing the specified gallery.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$gallery = Gallery::find($id);
		$gallerycategories = Gallerycategory::lists('title', 'id');

		return View::make('galleries.edit', compact('gallery','gallerycategories','members'));
	}

	/**
	 * Update the specified gallery in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$gallery = Gallery::findOrFail($id);

		$data = array(
			'title'		=> ucwords(Input::get('title')),
			'slug'		=> $this->slugify(Input::get('slug')),
			'content'	=> Input::get('content'),
			'excerpt'	=> Input::get('excerpt'),
			'gallery_category_id'	=> Input::get('gallery_category_id'),
			'status'	=> Input::get('status'),
			'comment_status'	=> Input::get('comment_status'),
			'social_status'		=> Input::get('social_status'),
			'created_at'		=> Input::get('created_at')
		);

		$validator = Validator::make($data, Gallery::rules($id));

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		if (Input::has('related_members')) {
			$gallery->members()->sync(Input::get('related_members'));
		}

		$gallery->update($data);

		return Redirect::route('admin.galleries.edit', $gallery->id)->with("message","Data berhasil disimpan");
	}

	public function uploadfoto($id)
	{
		$gallery = Gallery::findOrFail($id);
		$image_width = Sysparam::getValue('gallery_min_width');
		$image_height = Sysparam::getValue('gallery_min_height');

		if (Input::hasFile('images')) {

			$files = Input::file('images');
			// var_dump($files);

			foreach($files as $file) {

				if($file !== NULL) {

					$rules = array(
				       'file' => 'required|image|image_size:>='.$image_width.',>='.$image_height.''
				    );

				    $validator = Validator::make(array('file'=> $file), $rules);

				    if($validator->passes()) {
				    	// Move the photo
				        $destinationPath = '/uploads/galeri/'.$gallery->category->slug; // upload path
						$extension = $file->getClientOriginalExtension(); // getting image extension
						$fileName = rand(1,1000).'_'.$file->getClientOriginalName(); // renameing image
						$file->move(public_path().$destinationPath, $fileName); // uploading file to given path

						// Save the photo
						$dataimage['title'] = $file->getClientOriginalName();
						$dataimage['image'] = $destinationPath."/".$fileName;
						$dataimage['gallery_id'] = $gallery->id;
						Photo::create($dataimage);
					}
					else {
						// sending back with error message.
						return Redirect::back()->with('fotoerrors', 'File yang Anda pilih tidak valid, mohon mencoba kembali')->withInput();
					}
				}
			}
		}

		return Redirect::route('admin.galleries.edit',$gallery->id)->with("fotomessage","Foto berhasil disimpan");
	}

	/**
	 * Remove the specified gallery from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$gallery = Gallery::findOrFail($id);
		foreach ($gallery->photos as $photo) {
			Photo::destroy($photo->id);
		}
		Gallery::destroy($id);

		return Redirect::route('admin.galleries.index')->with('message', 'Data berhasil dihapus');
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
