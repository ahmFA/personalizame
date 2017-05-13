<?php
class Home extends CI_Controller {
	public function index() {
		enmarcar2($this, 'home');
	}
	
	public function indexAdmin(){
		enmarcar($this,'homeAdmin');
	}
}
?>