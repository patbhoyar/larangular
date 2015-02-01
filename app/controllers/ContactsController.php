<?php

class ContactsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            return View::make("contacts.index");
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
            $user = new User();
            $user->name = Input::get('name');
            $user->email = Input::get('email');
            $user->mobile = Input::get('mobile');
            $user->save();
            echo json_encode(array('msg' => 'success', 'id' => $user->id));
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	}


	/**
	 * Show the form for editing the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
            $user = User::find($id);
            $user->name = Input::get('name');
            $user->email = Input::get('email');
            $user->mobile = Input::get('mobile');
            $user->save();
            echo 'success';
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
            User::find($id)->delete();
            echo "success";
	}

        public function getAll(){
            $contacts = User::all();
            return json_encode($contacts);
        }
}
