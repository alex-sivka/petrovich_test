<?php

class Page extends Controller {
	
	public function init(){
		
		$link = App::Router()->getLink();
		
		if($link == '/') return $this->renderMain();
		
		else $this->render();
	}
	
	
	function renderMain(){
		
		$data = new sxObject;
		
		$data->pages = $this->model->byRequest()->order('id')->fetch();
		
		$data->paginatorPages = ceil($this->model->calc() / 5);
		
		$data->layout = 'home';
		
		View::render($data);
	}
	
    public function render(){

        $data = $this->model->fetchById(App::Router()->getLink(0));
        
        $data->layout = 'post';

        App::View()->render($data);
    }

}