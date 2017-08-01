<?php



class PageAdmin extends Controller {
	
	function init(){
		
		$this->model->setPerPage(10);
		
		$items = $this->model->query()->order('id')->byRequest()->all();
		
		$json = $this->setItems($items)->toJson();
		
		$perPage = $this->model->getPerPage();
		$totalPages = $this->model->calc();
		
		
		
		include 'templates/list.tpl.php';
	}


	public function setItems($items){
		foreach($items as $item){
			$item->edit_link = '/' . ADM_DIR . '/modules/page/edit/' . $item->id . '/';
		}
		return $items;
	}

	public function edit(){

		$item = $this->model->fetchById(Request::query()->id());

		if(Request::query()->id() && !$item->id) Admin::page404();

		if(!$item->id) $item->active = 1;

		$json = $item->toJson();

		include 'templates/edit.tpl.php';
	}

	public function save(){

		$model = $this->model->set(Request::post()->get());
		
		$model->modified = date('Y-m-d H:i:s');

		$model->save();


		Admin::success(array('id' => $model->id));
	}


}