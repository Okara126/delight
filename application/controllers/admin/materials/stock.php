<?php

class Admin_Materials_Stock_Controller extends Base_Controller 
{
	public function action_index()
	{
		$data['query'] = Material::where('owner_id', '=', Auth::user()->id)->get();
		$data['suppliers'] = Supplier::all();
		return View::make('admin.materials.stock', $data);
	}

	// --------------------------------------------------------------------------
}