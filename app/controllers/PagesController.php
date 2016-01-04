<?php

class PagesController extends \BaseController {

	public function showHome()
	{
		// Bottom sections
		// $category_news = Postcategory::ofSlug('berita')->firstOrFail();
		$latest_news = Post::published()->latest()->paginate(10);
		
		// Sidebar related
		// $popular_news = $category_news->posts()->published()->popular()->take(5)->get();
		$popular_news = Post::published()->popular()->take(5)->get();

		return View::make('pages.templates.home', compact('latest_news', 'popular_news'));
	}

	public function peluang()
	{
		return View::make('pages.templates.peluang', compact('latest_news', 'popular_news'));
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
		$data = Input::except('documents');
		$data['slug'] = $this->slugify(Input::get('title'));

		$validator = Validator::make($data, Page::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$page = Page::create($data);

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

					$page->documents()->save($document);
				}
			}
		}

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
		$data = Input::except('documents');

		// print_r($data);
		// exit;

		$data['slug'] = $this->slugify(Input::get('title'));

		$validator = Validator::make($data, Page::rules($id));

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
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

					$page->documents()->save($document);
				}
			}
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

	public function showSitemap()
	{
		$sitemap = '<ul>
						<li>
							<a href="'.URL::to('/').'">Beranda</a>
						</li>
						<li>
							Tentang MPR
							<ul>
								<li><a href="'.URL::to('pages/'.Page::find(1)->slug).'">'.Page::find(1)->title.'</a></li>
            					<li><a href="'.URL::to('pages/'.Page::find(2)->slug).'">'.Page::find(2)->title.'</a></li>
							</ul>
						</li>
						<li>
							Profil
							<ul>
								<li><a href="'.URL::to('badan/'.Organization::find(1)->slug).'/pimpinan">Pimpinan '.Organization::find(1)->name.'</a></li>
            					<li><a href="'.URL::to('badan/'.Organization::find(2)->slug).'/pimpinan">Pimpinan '.Organization::find(2)->name.'</a></li>
            					<li><a href="'.URL::to('badan/'.Organization::find(3)->slug).'/pimpinan">Pimpinan '.Organization::find(1)->name.'</a></li>
            					<li><a href="'.URL::to('badan/'.Organization::find(4)->slug).'/pimpinan">Pimpinan '.Organization::find(1)->name.'</a></li>
							</ul>
						</li>
						<li>
							Fraksi
							<ul>
								<li>
									'.Fraction::find(1)->name.'
									<ul>
										<li><a href="'.URL::to('fraksi/'.Fraction::find(1)->slug).'/pimpinan">Pimpinan</a></li>
		            					<li><a href="'.URL::to('fraksi/'.Fraction::find(1)->slug).'/pimpinan">Anggota</a></li>
									</ul>
								</li>
								<li>
									'.Fraction::find(2)->name.'
									<ul>
										<li><a href="'.URL::to('fraksi/'.Fraction::find(2)->slug).'/pimpinan">Pimpinan</a></li>
		            					<li><a href="'.URL::to('fraksi/'.Fraction::find(2)->slug).'/pimpinan">Anggota</a></li>
									</ul>
								</li>
								<li>
									'.Fraction::find(10)->name.'
									<ul>
										<li><a href="'.URL::to('fraksi/'.Fraction::find(10)->slug).'/pimpinan">Pimpinan</a></li>
		            					<li><a href="'.URL::to('fraksi/'.Fraction::find(10)->slug).'/pimpinan">Anggota</a></li>
									</ul>
								</li>
								<li>
									'.Fraction::find(3)->name.'
									<ul>
										<li><a href="'.URL::to('fraksi/'.Fraction::find(3)->slug).'/pimpinan">Pimpinan</a></li>
		            					<li><a href="'.URL::to('fraksi/'.Fraction::find(3)->slug).'/pimpinan">Anggota</a></li>
									</ul>
								</li>
								<li>
									'.Fraction::find(6)->name.'
									<ul>
										<li><a href="'.URL::to('fraksi/'.Fraction::find(6)->slug).'/pimpinan">Pimpinan</a></li>
		            					<li><a href="'.URL::to('fraksi/'.Fraction::find(6)->slug).'/pimpinan">Anggota</a></li>
									</ul>
								</li>
								<li>
									'.Fraction::find(7)->name.'
									<ul>
										<li><a href="'.URL::to('fraksi/'.Fraction::find(7)->slug).'/pimpinan">Pimpinan</a></li>
		            					<li><a href="'.URL::to('fraksi/'.Fraction::find(7)->slug).'/pimpinan">Anggota</a></li>
									</ul>
								</li>
								<li>
									'.Fraction::find(8)->name.'
									<ul>
										<li><a href="'.URL::to('fraksi/'.Fraction::find(8)->slug).'/pimpinan">Pimpinan</a></li>
		            					<li><a href="'.URL::to('fraksi/'.Fraction::find(8)->slug).'/pimpinan">Anggota</a></li>
									</ul>
								</li>
								<li>
									'.Fraction::find(9)->name.'
									<ul>
										<li><a href="'.URL::to('fraksi/'.Fraction::find(9)->slug).'/pimpinan">Pimpinan</a></li>
		            					<li><a href="'.URL::to('fraksi/'.Fraction::find(9)->slug).'/pimpinan">Anggota</a></li>
									</ul>
								</li>
								<li>
									'.Fraction::find(5)->name.'
									<ul>
										<li><a href="'.URL::to('fraksi/'.Fraction::find(5)->slug).'/pimpinan">Pimpinan</a></li>
		            					<li><a href="'.URL::to('fraksi/'.Fraction::find(5)->slug).'/pimpinan">Anggota</a></li>
									</ul>
								</li>
								<li>
									'.Fraction::find(4)->name.'
									<ul>
										<li><a href="'.URL::to('fraksi/'.Fraction::find(4)->slug).'/pimpinan">Pimpinan</a></li>
		            					<li><a href="'.URL::to('fraksi/'.Fraction::find(4)->slug).'/pimpinan">Anggota</a></li>
									</ul>
								</li>
								<li>
									'.Fraction::find(11)->name.'
									<ul>
										<li><a href="'.URL::to('fraksi/'.Fraction::find(11)->slug).'/pimpinan">Pimpinan</a></li>
		            					<li><a href="'.URL::to('fraksi/'.Fraction::find(11)->slug).'/pimpinan">Anggota</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							Putusan MPR
							<ul>
								<li><a href="'.URL::to('pages/'.Page::find(3)->slug).'">'.Page::find(3)->title.'</a></li>
            					<li><a href="'.URL::to('pages/'.Page::find(4)->slug).'">'.Page::find(4)->title.'</a></li>
            					<li><a href="'.URL::to('pages/'.Page::find(11)->slug).'">'.Page::find(11)->title.'</a></li>
            					<li><a href="'.URL::to('pages/'.Page::find(6)->slug).'">'.Page::find(6)->title.'</a></li>
            					<li><a href="'.URL::to('pages/'.Page::find(7)->slug).'">'.Page::find(7)->title.'</a></li>
							</ul>
						</li>
						<li>
							Sosialisasi
							<ul>
								<li><a href="'.URL::to('pages/'.Page::find(9)->slug).'">'.Page::find(9)->title.'</a></li>
            					<li><a href="'.URL::to('pages/'.Page::find(10)->slug).'">'.Page::find(10)->title.'</a></li>
            					<li><a href="'.URL::to('pages/'.Page::find(5)->slug).'">'.Page::find(5)->title.'</a></li>
							</ul>
						</li>
						<li>
							Pengkajian
							<ul>
								<li><a href="'.URL::to('kategori/seminar-fgd-rdp').'">Seminar / FGD / RDP</a></li>
            					<li><a href="'.URL::to('kategori/makalah').'">Makalah</a></li>
            					<li><a href="'.URL::to('kategori/pidato').'">Pidato</a></li>
            					<li><a href="'.URL::to('kategori/arsip').'">Arsip</a></li>
							</ul>
						</li>
						<li>
							Galeri
							<ul>
								<li><a href="'.URL::to('foto').'">Foto</a></li>
								<li><a href="'.URL::to('video').'">Video</a></li>
            					<li><a href="'.URL::to('majalah').'">Majalah</a></li>
            					<li><a href="'.URL::to('kutipan').'">Kutipan</a></li>
            					<li><a href="'.URL::to('karikatur').'">Karikatur</a></li>
							</ul>
						</li>
						<li>
							Sekretariat Jenderal
							<ul>
								<li><a href="'.URL::to('pages/'.Page::find(12)->slug).'">'.Page::find(12)->title.'</a></li>
            					<li><a href="'.URL::to('pages/'.Page::find(13)->slug).'">'.Page::find(13)->title.'</a></li>
            					<li><a href="'.URL::to('pages/'.Page::find(14)->slug).'">'.Page::find(14)->title.'</a></li>
            					<li><a href="'.URL::to('pages/'.Page::find(15)->slug).'">'.Page::find(15)->title.'</a></li>
            					<li><a href="'.URL::to('pages/'.Page::find(16)->slug).'">'.Page::find(16)->title.'</a></li>
            					<li><a href="'.URL::to('pages/'.Page::find(17)->slug).'">'.Page::find(17)->title.'</a></li>
            					<li><a href="'.URL::to('pages/'.Page::find(18)->slug).'">'.Page::find(18)->title.'</a></li>
            					<li><a href="'.URL::to('hubungi-kami').'">Hubungi Kami</a></li>
            					<li><a href="'.URL::to('pages/'.Page::find(19)->slug).'">'.Page::find(19)->title.'</a></li>
            					<li><a href="'.URL::to('pages/'.Page::find(20)->slug).'">'.Page::find(20)->title.'</a></li>
							</ul>
						</li>
					</ul>
					<hr>
					<ul>
						<li>
							Situs
							<ul>
								<li><a href="'.URL::to('sitemap').'">Sitemap</a></li>
            					<li><a href="http://lpse.mpr.go.id" target="_blank" title="Kunjungi LPSE">LPSE</a></li>
            					<li><a href="http://ppid.mpr.go.id" target="_blank" title="Kunjungi PPID">PPID</a></li>
            					<li><a href="http://pustaka.mpr.go.id" target="_blank" title="Kunjungi Perpustakaan">Perpustakaan</a></li>
            					<li><a href="'.URL::to('pages/'.Page::find(21)->slug).'">'.Page::find(21)->title.'</a></li>
							</ul>
						</li>
						<li>
							Status
							<ul>
								<li><a href="'.URL::to('badan/'.Organization::find(1)->slug).'/pimpinan">Pimpinan '.Organization::find(1)->name.'</a></li>
								<li><a href="'.URL::to('badan/'.Organization::find(1)->slug).'/anggota">Anggota '.Organization::find(1)->name.'</a></li>
								<li><a href="'.URL::to('pages/'.Page::find(4)->slug).'">'.Page::find(4)->title.'</a></li>
								<li><a href="'.URL::to('pages/'.Page::find(7)->slug).'">'.Page::find(7)->title.'</a></li>
            					<li><a href="'.URL::to('pages/'.Page::find(12)->slug).'">'.Page::find(12)->title.'</a></li>
							</ul>
						</li>
						<li>
							Partisipasi
							<ul>
								<li><a href="'.URL::to('surat').'">Surat Pembaca</a></li>
            					<li><a href="'.URL::to('kontak/create').'">Hubungi Kami</a></li>
            					<li><a href="'.URL::to('pages/'.Page::find(22)->slug).'">'.Page::find(22)->title.'</a></li>
							</ul>
						</li>
					</ul>';

		return View::make('pages.templates.sitemap', compact('sitemap'));
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

        // Search caricatures table
		$caricatures = Caricature::where('title', 'LIKE', '%'.$searchterm.'%')
			->published()
            ->get();

        if($caricatures->count()) {
	        foreach ($caricatures as $caricature) {
	        	$searchresults[] = array(
	        		'type' 			=> 'karikatur',
	        		'type_category'	=> NULL,
	        		'title'			=> $caricature->title,
	        		'link'			=> 'karikatur/'.$caricature->slug,
	        		'content'		=> NULL,
	        		'image'			=> $caricature->image,
	        		'original_updated_at'	=> $caricature->updated_at,
	        		'updated_at'	=> $caricature->translateDate($caricature->updated_at)
	        	);
	        }
	    }

	    // Search quotes table
		$quotes = Quote::where('title', 'LIKE', '%'.$searchterm.'%')
			->published()
            ->get();

        if($quotes->count()) {
	        foreach ($quotes as $quote) {
	        	$searchresults[] = array(
	        		'type' 			=> 'kutipan',
	        		'type_category'	=> NULL,
	        		'title'			=> $quote->title,
	        		'link'			=> 'kutipan/'.$quote->slug,
	        		'content'		=> NULL,
	        		'image'			=> $quote->image,
	        		'original_updated_at'	=> $quote->updated_at,
	        		'updated_at'	=> $quote->translateDate($quote->updated_at)
	        	);
	        }
	    }

	    // Search magazines table
		$magazines = Magazine::where('title', 'LIKE', '%'.$searchterm.'%')
			->orWhere('content', 'LIKE', '%'.$searchterm.'%')
			->published()
            ->get();

        if($magazines->count()) {
	        foreach ($magazines as $magazine) {
	        	$searchresults[] = array(
	        		'type' 			=> 'majalah',
	        		'type_category'	=> NULL,
	        		'title'			=> $magazine->title,
	        		'link'			=> 'majalah/'.$magazine->slug,
	        		'content'		=> $magazine->content,
	        		'image'			=> $magazine->image,
	        		'original_updated_at'	=> $magazine->updated_at,
	        		'updated_at'	=> $magazine->translateDate($magazine->updated_at)
	        	);
	        }
	    }

        // Search galleries table
		$galleries = Gallery::where('title', 'LIKE', '%'.$searchterm.'%')
			->orWhere('content', 'LIKE', '%'.$searchterm.'%')
			->published()
            ->get();

        // dd($galleries);

        if($galleries->count()) {
	        foreach ($galleries as $gallery) {
	        	$searchresults[] = array(
	        		'type' 			=> 'foto',
	        		'type_category'	=> $gallery->category->title,
	        		'title'			=> $gallery->title,
	        		'link'			=> 'galeri/'.$gallery->slug,
	        		'content'		=> NULL,
	        		'image'			=> $gallery->photos->first() ? $gallery->photos->first()->image : '',
	        		'original_updated_at'	=> $gallery->updated_at,
	        		'updated_at'	=> $gallery->translateDate($gallery->updated_at)
	        	);
	        }
	    }

	    // Search members table
		$members = Member::where('name', 'LIKE', '%'.$searchterm.'%')
			->orWhere('pob', 'LIKE', '%'.$searchterm.'%')
			->orWhere('dob', 'LIKE', '%'.$searchterm.'%')
			->orWhere('riwayat_pendidikan', 'LIKE', '%'.$searchterm.'%')
			->orWhere('riwayat_pekerjaan', 'LIKE', '%'.$searchterm.'%')
			->orWhere('riwayat_organisasi', 'LIKE', '%'.$searchterm.'%')
			->orWhere('organization_subposition', 'LIKE', '%'.$searchterm.'%')
			->published()
            ->get();

        if($members->count()) {
	        foreach ($members as $member) {
	        	$searchresults[] = array(
	        		'type' 			=> 'anggota',
	        		'type_category'	=> NULL,
	        		'title'			=> $member->name,
	        		'link'			=> 'anggota/'.$member->slug,
	        		'content'		=> NULL,
	        		'image'			=> $member->image,
	        		'original_updated_at'	=> $member->updated_at,
	        		'updated_at'	=> $member->translateDate($member->updated_at)
	        	);
	        }
	    }

	    // Search fractions table
		$fractions = Fraction::where('name', 'LIKE', '%'.$searchterm.'%')
			->published()
            ->get();

        if($fractions->count()) {
	        foreach ($fractions as $fraction) {
	        	$searchresults[] = array(
	        		'type' 			=> 'fraksi',
	        		'type_category'	=> NULL,
	        		'title'			=> $fraction->name,
	        		'link'			=> 'fraksi/'.$fraction->slug,
	        		'content'		=> NULL,
	        		'image'			=> $fraction->image,
	        		'original_updated_at'	=> $fraction->updated_at,
	        		'updated_at'	=> $fraction->translateDate($fraction->updated_at)
	        	);
	        }
	    }

	   	// Search fractions table
		$organizations = Organization::where('name', 'LIKE', '%'.$searchterm.'%')
			->published()
            ->get();

        if($organizations->count()) {
	        foreach ($organizations as $organization) {
	        	$searchresults[] = array(
	        		'type' 			=> 'badan',
	        		'type_category'	=> NULL,
	        		'title'			=> $organization->name,
	        		'link'			=> 'badan/'.$organization->slug,
	        		'content'		=> NULL,
	        		'image'			=> $organization->image,
	        		'original_updated_at'	=> $organization->updated_at,
	        		'updated_at'	=> $organization->translateDate($organization->updated_at)
	        	);
	        }
	    }

	    // print_r($searchresults);
	    // array_sort($searchresults,'updated_at',SORT_DESC); // sort by latest updated
	    return $searchresults;
	}

	public function showPHPInfo()
	{
		phpinfo();
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
