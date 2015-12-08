<?php

class VideosController extends \BaseController {

	/**
	 * Display a listing of videos
	 *
	 * @return Response
	 */
	public function index()
	{
		$videos = Video::orderBy('created_at', 'desc')->get();

		return View::make('videos.index', compact('videos'));
	}

	/**
	 * Show the form for creating a new video
	 *
	 * @return Response
	 */
	public function create()
	{
		$videocategories = Videocategory::lists('title', 'id');
		return View::make('videos.create', compact('videocategories'));
	}

	/**
	 * Store a newly created video in storage.
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

		$validator = Validator::make($data, Video::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		if (Input::hasFile('image')) {
			// checking file is valid.
			if (Input::file('image')->isValid()) {
				$destinationPath = '/uploads/videos/thumbs'; // upload path
				$extension = Input::file('file')->getClientOriginalExtension(); // getting image extension
				$fileName = rand(1,1000).'_'.$data['slug'].'.'.$extension; // renameing image
				Input::file('image')->move(public_path().$destinationPath, $fileName); // uploading file to given path
				$data['image'] = $destinationPath."/".$fileName;
			}
			else {
				// sending back with error message.
				return Redirect::back()->with('errors', 'Uploaded file is not valid')->withInput();
			}
		}

		$video = Video::create($data);

		return Redirect::route('admin.videos.edit', $video->id)->with("message","Data berhasil disimpan");
	}

	/**
	 * Display the specified video.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$videocategories = Videocategory::all();
		$video = Video::where('slug', '=', $slug)->published()->first();

		if($video) {
			$related_posts = Video::where('video_category_id', $video->video_category_id)
						->whereNotIn('id', array($video->id))
						->orderBy('created_at', 'desc')
						->take(5)
						->get();

			return View::make('videos.show', compact('videocategories','video','related_posts'));
		}
		else {
			return View::make('layouts.unpublished');
		}
	}

	/**
	 * Show the form for editing the specified video.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$video = Video::find($id);
		$videocategories = Videocategory::lists('title', 'id');
		return View::make('videos.edit', compact('video','videocategories'));
	}

	/**
	 * Update the specified video in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::except('file','image');
		// dd(Input::file('file'));
		$video = Video::findOrFail($id);

		$data = array(
			'title'		=> ucwords(Input::get('title')),
			'slug'		=> $this->slugify(Input::get('slug')),
			'content'	=> Input::get('content'),
			'excerpt'	=> Input::get('excerpt'),
			'status'	=> Input::get('status'),
			'comment_status'	=> Input::get('comment_status'),
			'social_status'		=> Input::get('social_status')
		);

		$validator = Validator::make($data, Video::rules($id));

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput($input);
		}

		if (Input::hasFile('image')) {
			// checking file is valid.
			if (Input::file('image')->isValid()) {
				$destinationPath = '/uploads/videos/thumbs'; // upload path
				$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
				$fileName = rand(1,1000).'_'.$data['slug'].'.'.$extension; // renameing image
				Input::file('image')->move(public_path().$destinationPath, $fileName); // uploading file to given path
				$data['image'] = $destinationPath."/".$fileName;
			}
			else {
				// sending back with error message.
				return Redirect::back()->with('errors', 'Uploaded file is not valid')->withInput($input);
			}
		}

		if (Input::hasFile('file')) {

			// dd(Input::file('file'));
			// $datafile['file'] = Input::file('file');
			$destinationPath = '/uploads/videos'; // upload path
			$extension = Input::file('file')->getClientOriginalExtension(); // getting image extension
			$fileName = rand(1,1000).'_'.$data['slug'].'.'.$extension; // renameing image
			Input::file('file')->move(public_path().$destinationPath, $fileName); // uploading file to given path
			$data['file'] = $destinationPath."/".$fileName;
		}

		$video->update($data);

		return Redirect::route('admin.videos.edit', $video->id)->with("message","Data berhasil disimpan");
	}

	/**
	 * Remove the specified video from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$video = Video::find($id);
		File::delete(public_path().$video->file);
		File::delete(public_path().$video->image);
		Video::destroy($id);
		return Redirect::route('admin.videos.index')->with('message', 'Data berhasil dihapus');
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
