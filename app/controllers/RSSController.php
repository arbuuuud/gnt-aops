<?php

class RSSController extends \BaseController {

	public function index()
	{
		$categories = Postcategory::all();
		return View::make('pages.templates.rss', compact('categories'));
	}

	public function generatePosts($slug)
	{
		// category: makalah, pidato, seminar-fgd-rdp, berita, arsip
		$category = Postcategory::where('slug', '=', $slug)->firstOrFail();
		$posts = $category->posts()->orderBy('created_at', 'desc')->take(20)->get();

		$title = $category->title.' - Majelis Permusyawaratan Rakyat';
		$lang = 'id';
		$date = date('l, d M Y H:i:s');
		$copyright = 'Majelis Permusyawaratan Rakyat Copyright '.date('Y');
		$desc = 'RSS Feed untuk '.$category->title;
		$sitelink = URL::to('/');

		$feed = Rss::feed('2.0', 'UTF-8');
    	$feed->channel(array(
    		'title' => $title,
    		'language'	=> $lang,
    		'copyright'	=> $copyright,
    		'description' => $desc,
    		'link' => $sitelink,
    		'pubDate'	=> $date,
        	'lastBuildDate'	=> $date
    	));
    	
    	foreach($posts as $post) {
        	$feed->item(array(
        		'title' => $post->title,
        		'category' => $post->category->name,
        		'description|cdata' => strip_tags($post->content),
        		'link' => $post->slug,
        	));
    	}
		return Response::make($feed, 200, array('Content-Type' => 'text/xml'));
	}

    public function generateLatestPost()
    {
        $posts = Post::orderBy('created_at', 'desc')->take(20)->get();

        $title = 'Berita Terkini - Majelis Permusyawaratan Rakyat';
        $lang = 'id';
        $date = date('l, d M Y H:i:s');
        $copyright = 'Majelis Permusyawaratan Rakyat Copyright '.date('Y');
        $desc = 'RSS Feed untuk Berita Terkini';
        $sitelink = URL::to('/');

        $feed = Rss::feed('2.0', 'UTF-8');
        $feed->channel(array(
            'title' => $title,
            'language'  => $lang,
            'copyright' => $copyright,
            'description' => $desc,
            'link' => $sitelink,
            'pubDate'   => $date,
            'lastBuildDate' => $date
        ));
        
        foreach($posts as $post) {
            $feed->item(array(
                'title' => $post->title,
                'category' => $post->category->name,
                'description|cdata' => strip_tags($post->content),
                'link' => $post->slug,
            ));
        }
        return Response::make($feed, 200, array('Content-Type' => 'text/xml'));
    }

    public function generatePopularPost()
    {
        $category_news = Postcategory::ofSlug('berita')->firstOrFail();
        $posts = $category_news->posts()->published()->popular()->take(20)->get();

        $title = 'Berita Terpopuler - Majelis Permusyawaratan Rakyat';
        $lang = 'id';
        $date = date('l, d M Y H:i:s');
        $copyright = 'Majelis Permusyawaratan Rakyat Copyright '.date('Y');
        $desc = 'RSS Feed untuk Berita Terpopuler';
        $sitelink = URL::to('/');

        $feed = Rss::feed('2.0', 'UTF-8');
        $feed->channel(array(
            'title' => $title,
            'language'  => $lang,
            'copyright' => $copyright,
            'description' => $desc,
            'link' => $sitelink,
            'pubDate'   => $date,
            'lastBuildDate' => $date
        ));
        
        foreach($posts as $post) {
            $feed->item(array(
                'title' => $post->title,
                'category' => $post->category->name,
                'description|cdata' => strip_tags($post->content),
                'link' => $post->slug,
            ));
        }
        return Response::make($feed, 200, array('Content-Type' => 'text/xml'));
    }

	public function generateSuratPembaca()
	{
		$guestmails = Guestmail::where('status','1')->orderBy('created_at', 'desc')->take(20)->get();

		$title = 'Surat Pembaca - Majelis Permusyawaratan Rakyat';
		$lang = 'id';
		$date = date('l, d M Y H:i:s');
		$copyright = 'Majelis Permusyawaratan Rakyat Copyright '.date('Y');
		$desc = 'RSS Feed untuk Surat Pembaca';
		$sitelink = URL::to('/');

		$feed = Rss::feed('2.0', 'UTF-8');
    	$feed->channel(array(
    		'title' => $title,
    		'language'	=> $lang,
    		'copyright'	=> $copyright,
    		'description' => $desc,
    		'link' => $sitelink,
    		'pubDate'	=> $date,
        	'lastBuildDate'	=> $date
    	));
    	
    	foreach($guestmails as $guestmail) {
        	$feed->item(array(
        		'name' => $guestmail->name,
        		'address' => $guestmail->address,
        		'city' => $guestmail->city,
        		'phone' => $guestmail->phone,
                'email' => $guestmail->email,
                'title' => $guestmail->title,
                'content|cdata' => $guestmail->content
        	));
    	}
		return Response::make($feed, 200, array('Content-Type' => 'text/xml'));
	}

}
