<?php

class PagesController extends \BaseController {

	public function showHome($username)
	{
		// checkmemberexist
		$memberapi = MemberAPI::getMemberByUserName($username);
		if(!$memberapi){
			return Redirect::to('https://www.gntclub.com/');
		}
		$member = User::find($memberapi->member_id);
		$page = Page::findBySlug('home')->published()->first();
		$cookie = Cookie::make('member_id', $member->member_id, 60);

		if($page) {
			return View::make('pages.templates.home', compact('page', 'member'))->withCookie($cookie);
		}
		else {
			return View::make('layouts.unpublished');
		}
	}

	public function peluang()
	{
		$page = Page::findBySlug('peluang')->published()->first();
		$posts = Post::latest()->take(3)->get();
		if($page) {
			return View::make('pages.templates.peluang', compact('page', 'posts'));
		}
		else {
			return View::make('layouts.unpublished');
		}
	}

	/**
	 * Display a listing of pages
	 *
	 * @return Response
	 */
	public function index()
	{
		$pages = Page::all();

		return View::make('pages.index', compact('pages'));
	}

	/**
	 * Show the form for creating a new page
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pages.create');
	}

	/**
	 * Store a newly created page in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data['slug'] = $this->slugify(Input::get('title'));

		$validator = Validator::make($data, Page::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$page = Page::create($data);

		return Redirect::route('admin.pages.index')->with("message","Data berhasil disimpan");
	}

	/**
	 * Display the specified page.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$page = Page::findBySlug($slug)->published()->first();
		
		if($page) {
			return View::make('pages.templates.'.$page->template, compact('page'));
		}
		else {
			return View::make('layouts.unpublished');
		}
	}

	/**
	 * Show the form for editing the specified page.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$page = Page::find($id);

		return View::make('pages.edit', compact('page'));
	}

	/**
	 * Update the specified page in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$page = Page::findOrFail($id);

		// print_r($data);
		// exit;

		$data['slug'] = $this->slugify(Input::get('title'));

		$validator = Validator::make($data, Page::rules($id));

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$page->update($data);

		return Redirect::route('admin.pages.edit', $page->id)->with("message","Data berhasil disimpan");
	}

	/**
	 * Remove the specified page from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Page::destroy($id);

		return Redirect::route('admin.pages.index')->with('message', 'Data berhasil dihapus');
	}

	public function search()
	{
		$searchterm = Input::get('s');
		$currentPage = Input::get('page', 1) - 1;
		
		$perPage = 10;
		$searchcollections = $this->searchable($searchterm);

		$pagedData = array_slice($searchcollections, $currentPage * $perPage, $perPage);
		$searchresults = Paginator::make($pagedData, count($searchcollections), $perPage);
		$searchresults->appends('s',$searchterm);

        return View::make('pages.templates.search', compact('searchterm', 'searchresults'));
	}

	public function searchable($searchterm)
	{
		$searchresults = array();

		// Search posts table
		$posts = Post::where('title', 'LIKE', '%'.$searchterm.'%')
			->orWhere('content', 'LIKE', '%'.$searchterm.'%')
			->published()
            ->get();

        if($posts->count()) {
        	foreach ($posts as $post) {
	        	$searchresults[] = array(
	        		'type' 			=> 'artikel',
	        		'type_category'	=> $post->category->title,
	        		'title'			=> $post->title,
	        		'link'			=> 'posts/'.$post->slug,
	        		'content'		=> $post->excerpt != NULL ? $post->excerpt : str_limit(strip_tags($post->content), 300),
	        		'image'			=> $post->image,
	        		'original_updated_at'	=> $post->updated_at,
	        		'updated_at'	=> $post->translateDate($post->updated_at)
	        	);
	        }
        }

        // Search pages table
		$pages = Page::where('title', 'LIKE', '%'.$searchterm.'%')
			->orWhere('content', 'LIKE', '%'.$searchterm.'%')
			->published()
            ->get();

        if($pages->count()) {
	        foreach ($pages as $page) {
	        	$searchresults[] = array(
	        		'type' 			=> 'halaman',
	        		'type_category'	=> NULL,
	        		'title'			=> $page->title,
	        		'link'			=> 'pages/'.$page->slug,
	        		'content'		=> $page->excerpt != NULL ? $page->excerpt : str_limit(strip_tags($page->content), 300),
	        		'image'			=> NULL,
	        		'original_updated_at'	=> $page->updated_at,
	        		'updated_at'	=> $page->translateDate($page->updated_at)
	        	);
	        }
	    }

	    // print_r($searchresults);
	    // array_sort($searchresults,'updated_at',SORT_DESC); // sort by latest updated
	    return $searchresults;
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
