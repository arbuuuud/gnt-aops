<?php

class PostsController extends \BaseController {

	/**
	 * Display a listing of posts
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::latest()->get();

		return View::make('posts.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new post
	 *
	 * @return Response
	 */
	public function create()
	{
		$selected_cat_id = Input::get('cat', 4); // Check from which category page user is coming from, default to Berita category
		$selected_cat = Postcategory::find($selected_cat_id);
		$postcategories = Postcategory::lists('title', 'id');
		$members = Member::lists('name', 'id');
		return View::make('posts.create', compact('postcategories','members', 'selected_cat'));
	}

	/**
	 * Store a newly created post in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$file = Input::file('image');
		$category = Postcategory::find(Input::get('post_category_id'));

		$data = array(
			'title'				=> ucwords(Input::get('title')),
			'slug'				=> $this->slugify(Input::get('title')),
			'content'			=> Input::get('content'),
			'excerpt'			=> Input::get('excerpt'),
			'post_category_id'	=> Input::get('post_category_id'),
			'created_at'		=> Input::get('created_at'),
			'status'			=> Input::get('status'),
			'comment_status'	=> Input::get('comment_status'),
			'social_status'		=> Input::get('social_status')
		);

		$validator = Validator::make($data, Post::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		if (Input::hasFile('image')) {
			// checking file is valid.
			if (Input::file('image')->isValid()) {
				$destinationPath = '/uploads/'.$category->slug; // upload path
				$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
				$fileName = rand(1,1000).'_'.$data['slug'].'.'.$extension; // renameing image
				Input::file('image')->move(public_path().$destinationPath, $fileName); // uploading file to given path
				$data['image'] = $destinationPath."/".$fileName;
			}
			else {
				// sending back with error message.
				return Redirect::back()->with('errors', 'Uploaded file is not valid')->withInput();
			}
		}

		$post = Post::create($data);

		if (Input::has('related_members')) {
			$post->members()->sync(Input::get('related_members'));
		}

		$url = url('posts') . '/' . $data['slug'];

		// if(Sysparam::getValue('twitter_autopost') == 1) {
		// 	Twitter::postTweet(['status' => $data['title'] . $url, 'format' => 'json']);
		// }

		return Redirect::route('admin.posts.index')->with("message","Data berhasil disimpan");
	}

	/**
	 * Display the specified post.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$post = Post::where('slug', '=', $slug)->published()->first();

		if($post) {
			$related_posts = Post::related($post->post_category_id, $post->id)
						->published()
						->orderBy('created_at', 'desc')
						->get();

			// Increment the views counter
			$post->increment('view_count');

			return View::make('posts.show', compact('post','related_posts'));	
		}
		else {
			return View::make('layouts.unpublished');
		}
	}

	/**
	 * Show the form for editing the specified post.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::find($id);
		$category = $post->category;
		$postcategories = Postcategory::lists('title', 'id');

		return View::make('posts.edit', compact('post', 'category', 'postcategories','members'));
	}

	/**
	 * Update the specified post in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$post = Post::findOrFail($id);
		$file = Input::file('image');
		$category = Postcategory::find(Input::get('post_category_id'));

		$data = array(
			'title'				=> ucwords(Input::get('title')),
			'slug'				=> $this->slugify(Input::get('slug')),
			'content'			=> Input::get('content'),
			'excerpt'			=> Input::get('excerpt'),
			'post_category_id'	=> Input::get('post_category_id'),
			'status'			=> Input::get('status'),
			'comment_status'	=> Input::get('comment_status'),
			'social_status'		=> Input::get('social_status'),
			'created_at'		=> Input::get('created_at')
		);

		$validator = Validator::make($data, Post::rules($id));

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		if (Input::hasFile('image')) {
			// checking file is valid.
			if (Input::file('image')->isValid()) {
				$destinationPath = '/uploads/'.$category->slug; // upload path
				$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
				$fileName = rand(1,1000).'_'.$data['slug'].'.'.$extension; // renameing image
				Input::file('image')->move(public_path().$destinationPath, $fileName); // uploading file to given path
				$data['image'] = $destinationPath."/".$fileName;
			}
			else {
				// sending back with error message.
				return Redirect::back()->with('errors', 'Uploaded file is not valid')->withInput();
			}
		}

		if (Input::hasFile('documents')) {

			$documents = Input::file('documents');

			foreach ($documents as $newdocument) {

				if($newdocument !== NULL) {
					// dd($newdocument);
					// checking file is valid.
					$destinationPath = '/uploads/documents'; // upload path
					$fileName = rand(1,1000).'_'.$newdocument->getClientOriginalName(); // renameing image
					$newdocument->move(public_path().$destinationPath, $fileName); // uploading file to given path

					// Save the photo
					$document = new Document;
					$document->name = $fileName;
					$document->path = $destinationPath."/".$fileName;
					$document->save();

					$post->documents()->save($document);
				}
			}
		}

		if (Input::has('related_members')) {
			$post->members()->sync(Input::get('related_members'));
		}

		$post->update($data);

		return Redirect::route('admin.posts.edit',$post->id)->with("message","Data berhasil disimpan");
	}

	/**
	 * Remove the specified post from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Post::destroy($id);

		return Redirect::route('admin.posts.index')->with('message', 'Data berhasil dihapus');
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
