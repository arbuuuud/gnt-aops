<?php

class PhotosController extends \BaseController {

	/**
	 * Display a listing of photos
	 *
	 * @return Response
	 */
	public function index()
	{
		$photos = Photo::all();

		return View::make('photos.index', compact('photos'));
	}

	/**
	 * Show the form for creating a new photo
	 *
	 * @return Response
	 */
	public function create()
	{
		if ( Input::has('id') ) {
			$gallery = Gallery::find(Input::get('id'));
			return View::make('photos.create', compact('gallery'));	
		}
		else {
			return Redirect::route('admin.galleries.index');
		}
	}

	/**
	 * Store a newly created photo in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Photo::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Photo::create($data);

		return Redirect::route('photos.index');
	}

	/**
	 * Display the specified photo.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$photo = Photo::findOrFail($id);

		return View::make('photos.show', compact('photo'));
	}

	/**
	 * Show the form for editing the specified photo.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$photo = Photo::find($id);

		return View::make('photos.edit', compact('photo'));
	}

	/**
	 * Update the specified photo in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$photo = Photo::findOrFail($id);
		$gallery_id = $photo->gallery_id;

		$data['title'] = Input::get('title');
		$photo->update($data);

		return Redirect::route('admin.galleries.edit',$gallery_id)->with('fotomessage', 'Foto berhasil diupdate');
	}

	/**
	 * Remove the specified photo from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$photo = Photo::findOrFail($id);
		$gallery_id = $photo->gallery->id;
		Photo::destroy($id);
		File::delete(public_path().$photo->image);

		return Redirect::route('admin.galleries.edit',$gallery_id)->with('fotomessage', 'Foto berhasil dihapus');
	}

	public function upload($id)
	{
		$gallery = Gallery::findOrFail($id);
		$image_width = Sysparam::getValue('gallery_min_width');
		$image_height = Sysparam::getValue('gallery_min_height');

		if (Input::hasFile('file')) {

			$file = Input::file('file');

			$rules = array(
		       'file' => 'required|image|image_size:>='.$image_width.',>='.$image_height.''
		    );

		    $validator = Validator::make(array('file'=> $file), $rules);

		    if($validator->passes()) {
		    	// Move the photo
		        $destinationPath = '/uploads/galeri/'.$gallery->category->slug.'/'.$id; // upload path
				$extension = $file->getClientOriginalExtension(); // getting image extension
				$fileName = rand(1,1000).'_'.$file->getClientOriginalName(); // renameing image
				$file->move(public_path().$destinationPath, $fileName); // uploading file to given path

				// Save the photo
				$dataimage['title'] = $file->getClientOriginalName();
				$dataimage['image'] = $destinationPath."/".$fileName;
				$dataimage['gallery_id'] = $gallery->id;
				Photo::create($dataimage);

				return Response::json('success', 200);
			}
			else {
				// sending back with error message.
				return Response::json('File tidak valid', 400);
			}
		}
	}

	public function bulkprocess()
	{
		$input = Input::all();
		// dd($input);
		
		if(Input::get('bulksubmit') == 'update') {
			echo "update";
			$photos = Input::get('photos');
			foreach ($photos as $key => $value) {
				print_r($value);
				// $photo = Photo::findOrFail($id);
				// $data['title'] = Input::get('title');
				// $photo->update($data);
			}

		}

		// if(Input::get('bulksubmit') == 'delete') {
		// 	echo "hapus";
		// }
		// print_r($photos);
		// foreach ($photos as $photo) {
		// 	if(isset($photo['id'])) {
		// 		print_r($photo);
		// 	}
		// }
	}

}
