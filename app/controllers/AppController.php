<?php

class AppController extends BaseController {
	protected $layout = '_layouts.default';
	
	public function index() {
		$today = new DateTime( 'today' );
		$modules = Module::with( 'courses' )
			->where( 'start_date', '<=', $today )
			->where( 'end_date', '>=', $today )
			->get();
		
		$courses = [];
		
		if ( count( $modules ) > 0 ) {
			$ids = [];
			foreach( $modules as $module ) {
				$ids = array_merge( $ids, $module->courses->lists( 'id' ) );
			}
			
			$courses = Course::with( 'modules' )
				->whereIn( 'id', array_unique( $ids ) )
				->get();
		}
		
		$this->layout->content = View::make( 'home' )
			->with( 'courses', $courses );
	}
	
	public function admin() {
		$courses = Course::all();
		
		$this->layout->content = View::make( 'admin' )
			->with( 'courses', $courses );
	}
	
	public function update( $id = 'all' ) {
		if ( is_numeric( $id ) ) {
			$courses = Course::find( $id );
		} else {
			$today = new DateTime( 'today' );
			$modules = Module::with( 'courses' )
				->where( 'start_date', '<=', $today )
				->where( 'end_date', '>=', $today )
				->get();
		}
		
		if ( count( $modules ) > 0 ) {
			foreach ( $modules as $module ) {
				$module->retrieve();
			}
		} else {
			// No active courses.
		}
		
		$this->layout->content = View::make( 'update' );
	}
}