<?php
/**
 * [ADMIN] フロント認証プラグイン
 *
 */
/**
 * システムナビ
 */
$config['BcApp.adminNavi.frontAuth'] = array(
		'name'		=> 'フロント認証プラグイン',
		'contents'	=> array(
			array('name' => '登録認証一覧', 
				'url' => array('admin' => true, 'plugin' => 'front_auth', 'controller' => 'front_auth', 'action' => 'index')),
			array('name' => '新規登録', 
				'url' => array('admin' => true, 'plugin' => 'front_auth', 'controller' => 'front_auth', 'action' => 'add'))
	)
);
