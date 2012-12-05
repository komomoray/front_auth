<?php
class FrontAuthHookComponent extends Object {
	var $registerHooks = array('startup','beforeRender');

	function startup($controller) {
		//$controller->uses[] = 'FrontAuth.FrontAuthMember';
		//$datas = $controller->FrontAuthMember->find('all');
		
		$FrontAuthMember = ClassRegistry::init('FrontAuth.FrontAuthMember');
		$datas = $FrontAuthMember->find('all');		
		
		if(!empty($controller->params['admin'])) {
			// 管理画面はスルー
			return;
		}

		$users = array();
		
		foreach ($datas as $data) {
			if(preg_match("/^{$data['FrontAuthMember']['url']}(\/|).*?/", @$controller->params['url']['url'])) {
				array_push($users, $data['FrontAuthMember']['user']);
			}
		}
		
		foreach ($datas as $data) {
			if(preg_match("/^{$data['FrontAuthMember']['url']}(\/|).*?/", @$controller->params['url']['url'])) {
				if(empty($_SESSION['Auth']['User'])) {
					$controller->redirect('/front_auth/login');
				}
				if(in_array($_SESSION['Auth']['User']['name'], $users) == false) {
					$controller->redirect('/front_auth/login');
				}
			}
		}
		
		/*
				//$controller->Session->write('url', ("http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]));
*/	
	}
	
	function beforeRender($controller) {
		//action 通ったあとに実行される
	}
}