<?php

class MenusController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /menus
	 *
	 * @return Response
	 */
	public function index()
	{
		$menus = Menu::all();
		$menu = Menu::find('1');
		// dd($menu);
		return View::make('menus.index', compact('menus', 'menu'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /menus/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /menus
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /menus/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$menus = Menu::all();
		$menu = Menu::find($id);
		// dd($menu);
		return View::make('menus.index', compact('menus', 'menu'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /menus/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /menus/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// dd(Input::all());

		// 1. Reset all visibilities
		$menu = Menu::findOrFail($id);
		$menuitems_original = $menu->items;
		foreach ($menuitems_original as $item) {
			$item->visible = '0';
			$item->save();
		}
		
		// 2. Save the new visibility state from user inputs
		if(Input::get('menu')) {
			$menuitems = Input::get('menu');
			foreach ($menuitems as $item) {
				$menuitem_object = MenuItem::find($item);
				$menuitem_object->visible = '1';
				$menuitem_object->save();
			}
		}

		return Redirect::route('admin.menus.index')->with("message","Data berhasil disimpan");
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /menus/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}