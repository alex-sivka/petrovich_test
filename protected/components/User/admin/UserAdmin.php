<?php


class UserAdmin extends Controller {
	
	public function init(){
		App::User()->access('global', 'user', 'read');
		$items = $this->model->byRequest()->all();
		
		foreach($items as $item){
			$item->edit_link = '/' . ADM_DIR . '/components/user/edit/?id=' . $item->id;
			$item->group_name = 'admin';
		}
		
		$json = $items->toJson();
		
		include 'templates/list.tpl.php';
		
	}
	
	public function edit(){
		App::User()->access('global', 'user', 'write');
		$item = $this->model->fetchById(Request::query()->id());

		if(Request::query()->id() && !$item->id) Admin::page404();

		if(!$item->id) $item->active = 1;
		
		$item->delete('pass');
		/*if($this->model->img) {
			$preview = json_encode(array('img' => \Img::get('public/images/users/' . $this->model->img, 300, 300, true)));
		}else{
			$preview = '{}';
		}*/

		$json = $item->toJson();
		include 'templates/edit.tpl.php';
	}
	
	public function save(){
		App::User()->access('global', 'user', 'write');
		$item = $this->model->set(Request::post()->get());
		
		if(($item->pass_ || !$item->id) && mb_strlen($item->pass_,'utf-8') < 4)
			Admin::error( array( 'name' =>'pass_', 'msg' => Lang::get('msg_pass_to_short') ) );
		
		if($item->pass_){
			$item->pass = User::hashPass($item->pass_);
			if($item->id != App::User()->get('id')) $item->hash = '';
		}
		
		$item->save();
		Admin::success(array('id' => $item->id));
	}
	
	public function upload(){
		App::User()->access('global', 'user', 'write');
		$img = new \Uploader('public/images/users');
		$img = $img->save();
		if(!$img) Admin::error();
		$this->model->fetchById( Request::post()->id() );
		if($this->model->img) \Img::removeAll('public/images/users', $this->model->img);
		$this->model->img = $img;
		$this->model->save();
		Admin::success( array('value' => $img) );
	}
	
	private function getGroupSelect(){
		$data = $this->model->get();
		$data->group_id__options = [];
		$groups = Db::select()->where('status', '<=', App::get('User')->group->status)->order('status desc')->fetch('userGroups');
		foreach($groups as $item) $data->group_id__options[] = ['value'=>$item->id, 'text'=> $item->name];
	}
	
	public function switchState(){
		App::User()->access('global', 'user', 'write');
		AdminTools::switchState($this->model);
	}
	
	public function toTrash(){
		App::User()->access('module', 'user', 'write');
		AdminTools::toTrash($this->model);
	}
	
	public function fromTrash(){
		App::User()->access('module', 'user', 'write');
		AdminTools::fromTrash($this->model);
	}
	
	function remove(){
		App::User()->access('module', 'user', 'write');
		AdminTools::remove($this->model);
	}
}