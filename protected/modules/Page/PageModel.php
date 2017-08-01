<?php

class PageModel extends Model {
	
	protected $tableName = 'pet__page';
	
	function rules(){
		$rules = array(
			'name' => Validator::length(3),
			'alias' => Validator::length(3)->alias($this),
		);
		$messages = array(
			'name' => 'Введите имя',
		);
		
		return array('rules' => $rules, 'messages' => $messages);
	}
	
	
	//function details(){
	//	return $this->hasOne('pageDetails', 'page_id');
	//}
}