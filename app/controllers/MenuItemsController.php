<?php

class MenuItemsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /menuitems
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /menuitems/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$menus = Menu::lists('name', 'id');
		$menuitems = MenuItem::parent()->get()->lists('name', 'id');
		$menuitems[0] = '---- Top Level -----';
		ksort($menuitems);

		return View::make('menu_items.create', compact('menus','menuitems'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /menuitems
	 *
	 * @return Response
	 */
	public function store()
	{
		// tergantung tipe menu apa yang ingin disimpan, perilaku setiap tipe berbeda prosesnya
		$type = Input::get('menuitem_type');

		if ($type == 'page') {
			$inputdata = Input::all();
			$menu_id = $inputdata['menu_id'];

			foreach ($inputdata['menuitems'] as $menuitem) {
				
				if(isset($menuitem['id'])) {

					$type = $menuitem['type'];
					$id = $menuitem['id'];

					// Set the item data based on type, manual code currently for each type. Refer to routes.
					if($type == 'page') {

						$page = Page::find($id);

						$itemdata['name'] = $page->title;
						$itemdata['link'] = 'pages/'.$page->slug;
						$itemdata['menu_id'] = $menu_id;
					}

					// Validate and crate the data
					$validator = Validator::make($itemdata, MenuItem::$rules);

					if ($validator->fails())
					{
						return Redirect::back()->withErrors($validator)->withInput();
					}

					MenuItem::create($itemdata);
				}
			}
		}
		
		if ($type == 'custom') {
			
			$validator = Validator::make(Input::all(), MenuItem::$rules);

			if ($validator->fails())
			{
				return Redirect::back()->withErrors($validator)->withInput();
			}

			MenuItem::create(Input::except('menuitem_type'));
		}

		return Redirect::route('admin.menus.index')->with("message","Data berhasil disimpan");
	}

	/**
	 * Display the specified resource.
	 * GET /menuitems/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /menuitems/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$menus = Menu::lists('name', 'id');
		$menuitem = MenuItem::find($id);
		$menuitems = MenuItem::parent()->get()->lists('name', 'id');
		$menuitems[0] = '---- Top Level -----';
		ksort($menuitems);
		unset($menuitems[$id]);

		return View::make('menu_items.edit', compact('menus', 'menuitem', 'menuitems'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /menuitems/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$menuitem = MenuItem::findOrFail($id);
		$data = Input::all();
		// dd($data);

		$validator = Validator::make($data, MenuItem::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$menuitem->update($data);

		// Jika dirubah menjadi child dan memiliki child dibawahnya (jika ada) maka akan dibuat top level
		if( $data['parent_id'] != '0' ) {
			if(count($menuitem->childs()))
			{
				foreach ($menuitem->childs as $child) {
					$child->parent_id = 0;
					$child->save();
				}
			}
		}

		return Redirect::route('admin.menus.index')->with("message","Data berhasil disimpan");
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /menuitems/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		MenuItem::destroy($id);

		return Redirect::route('admin.menus.index')->with('message', 'Data berhasil dihapus');
	}

}