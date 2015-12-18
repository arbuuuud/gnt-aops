<?php

class MemberConfigurationsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /memberconfigurations
	 *
	 * @return Response
	 */
	public function index()
	{
		// $contact = Contact::find(1);
		// // return 'return '.$contact;
		// // return date('Y-m-d H:i:s',strtotime("+3 day"));
		// $temp = $contact->insertPoolingSchedule(1,1,1);

		// return 'return '.$temp;
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /memberconfigurations/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /memberconfigurations
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /memberconfigurations/{id}
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
	 * GET /memberconfigurations/{id}/edit
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
	 * PUT /memberconfigurations/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /memberconfigurations/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function config()
	{
		$id = Auth::user()->id;
		$member = Member::where('user_id', $id)->first();
		$member_id = $member->id;
		$member_configurations = MemberConfiguration::where ('member_id', $member_id)->get();
		return View::make('member_configurations.member', compact('member_configurations'));
	}

	public function storeconfig() 
	{
		$input = Input::all();

		$id = Auth::user()->id;
		$member = Member::where('user_id', $id)->first();
		$member_id = $member->id;
		$member_configurations = MemberConfiguration::where('member_id', $member_id)->get();

		foreach ($member_configurations as $member_configuration) {
			$param_code = $member_configuration->param_code;
			$param_value = $input[$param_code];
			$member_configuration->param_value = $param_value;
			$member_configuration->save();

		}



		return Redirect::route('member.storeconfig', $member->id)->with("message","Data berhasil disimpan");
	}



















}