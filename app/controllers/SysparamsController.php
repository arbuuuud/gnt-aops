<?php

class SysparamsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /sysparams
	 *
	 * @return Response
	 */
	public function index()
	{
		$sysparams = Sysparam::all();
		// foreach ($sysparams as $sysparam) {
		// 	echo $sysparam->value;
		// }
		return View::make('sysparams.index', compact('sysparams'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /sysparams/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /sysparams
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /sysparams/{id}
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
	 * GET /sysparams/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$sysparam = Sysparam::find($id);
		return View::make('sysparams.edit', compact('sysparam'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /sysparams/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$sysparam = Sysparam::findOrFail($id);
		
		if($sysparam->type == 'file'){
			if (Input::hasFile('content')) {
				if (Input::file('content')->isValid()) {
					$destinationPath = '/img'; // upload path
					$extension = Input::file('content')->getClientOriginalExtension(); // getting image extension
					$fileName = rand(1,1000).'_'.$sysparam->key.'.'.$extension; // renameing image
					Input::file('content')->move(public_path().$destinationPath, $fileName); // uploading file to given path
					$sysparam->value->content = $destinationPath."/".$fileName;
				}
				else {
					// sending back with error message.
					return Redirect::back()->with('errors', 'Uploaded file is not valid')->withInput();
				}
			}
		}
		else {
			$sysparam->value->content = Input::get('content');
		}

		$sysparam->push();

		return Redirect::route('admin.sysparams.index')->with("message","Data berhasil disimpan");
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /sysparams/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}