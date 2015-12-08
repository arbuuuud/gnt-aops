<?php

class AjaxController extends \BaseController {

	public function saveimage()
	{
		if (Request::ajax()) {
			if (Input::file('image')->isValid()) {
				$destinationPath = public_path().'/uploads/summernote'; // upload path
				$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
				$fileName = rand(1,1000).'.'.$extension; // renameing image
				Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
				echo URL::to('/uploads/summernote/'.$fileName);
			}
		}
		else {
			return Redirect::to('/');
		}
	}

}
