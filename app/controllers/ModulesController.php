<?php

class ModulesController extends \BaseController {
	protected $layout = '_layouts.default';
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$modules = Module::all();
		
		$this->layout->content = View::make( 'modules.index' )
			->with( 'modules', $modules );
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		$this->layout->content = View::make( 'modules.create' );
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$module = new Module;
		
		$module->name = Input::get( 'name' );
		$module->short_name = Input::get( 'short_name' );
		$module->calendar = Input::get( 'calendar' );
		
		if ( $module->validate() ) {
			$module->courses()->sync( (array) Input::get( 'courses' ) );
			
			$module->save();
		} else {
			return Redirect::back()->withInput();
		}
		
		return Redirect::route( 'admin.modules.index' );
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show( $id ) {
		$module = Module::find( $id );
		
		if ( Request::ajax() ) {
			return $module;
		} else {
			$this->layout->content = View::make( 'modules.view' )
				->with( 'module', $module );
		}
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit( $id ) {
		$module = Module::find( $id );
		
		$this->layout->content = View::make( 'modules.edit' )
			->with( 'module', $module );
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update( $id ) {
		$module = Module::find( $id );
		
		$module->name = Input::get( 'name' );
		$module->short_name = Input::get( 'short_name' );
		$module->calendar = Input::get( 'calendar' );
		
		if ( $module->validate() ) {
			$module->courses()->sync( (array) Input::get( 'courses' ) );
			
			$module->save();
		} else {
			return Redirect::back()->withInput();
		}
		
		return Redirect::route( 'admin.modules.index' );
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy( $id ) {
		$module = Module::find( $id );
		$module->delete();
		
		return Redirect::route( 'admin.modules.index' );
	}
	
}