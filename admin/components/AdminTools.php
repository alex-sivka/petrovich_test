<?php

class AdminTools {
	
	public static function toTrash($model, $ids = [], $data = []){
		$ids = self::getIds($ids);
		foreach($ids as $id) $model->updateRow( array('id'=>$id, 'deleted'=>1) );
		if($data !== false) self::finish($ids, $data);
	}
	
	public static function fromTrash($model, $ids = [], $data = []){
		$ids = self::getIds($ids);
		foreach($ids as $id) $model->updateRow( array('id'=>$id, 'deleted'=>0) );
		if($data !== false) self::finish($ids, $data);
	}
	
	public static function remove($model, $ids = [], $data = []){
		$ids = self::getIds($ids);
		foreach($ids as $id) Db::deleteRow($model->getTable(), $id);
		if($data !== false) self::finish($ids, $data);
	}
	
	public static function switchState($model, $ids = [], $data = []){
		$ids = self::getIds($ids);
		$flag = Request::post()->int('flag');
		$col = Request::post()->name;
		foreach($ids as $id) $model->updateRow( array('id'=>$id, $col=>$flag) );
		if($data !== false) self::finish($ids, $data);
	}
	
	public static function sort($model, $data = []){
		$post = Request::post();
		$table = $model->getTable();
		$item = Db::fetchById($table, $post->id);
		Db::update($table)->where('parent_id', $post->parent_id)->where('priority', '>=', $item->priority)->where('priority', '!=', 0)->run('`priority` = `priority`-1');
		if($post->next_id){
			$next = Db::fetchById($table, $post->next_id);
			Db::update($table)->where('parent_id', $post->parent_id)->where('priority', '>=', $next->priority)->run('`priority` = `priority`+1');
			Db::update($table)->where('id', $post->id)->run('`priority` = '.$next->priority);
		}else{
			$prev = Db::fetchById($table, $post->prev_id);
			Db::update($table)->where('id', $post->id)->run('`priority` = '. ($prev->priority + 1));
		}
		if($data !== false) self::finish([], $data);
	}
	
	public static function finish($ids, $data = []){
		$data['ids'] = $ids;
		die(json_encode(['success' => 1, 'data' => $data]));
	}
	
	private static function getIds($ids){
		if(!$ids) $ids = Request::post('ids');
		return $ids;
	}
	
}