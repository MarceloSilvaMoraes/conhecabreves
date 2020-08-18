<?php 
class controller{
	public function loadView($viewName, $viewData = array()){
		extract($viewData);
		require 'views/'.$viewName.'.php';
	}
	
	public function loadTemplate($viewName, $viewData = array()){
		require 'views/tamplate.php';
	}
	public function loadTemplateAdm($viewName, $viewData = array()){
		require 'views/adm.php';
	}
	public function loadParceiros($viewName, $viewData = array()){
		require 'views/homeParceiro.php';
	}
	public function loadViewTemplate($viewName, $viewData = array()){
		extract($viewData);
		require 'views/'.$viewName.'.php';
	}
	
	
}

?>
