<?php
app::import('Controller', 'Plugins');	//継承するコントローラのpluginsをインポートする
class FrontAuthController extends PluginsController {
	var $name = "FrontAuth";
	var $uses = array('Plugin','User','GlobalMenu','UserGroup','FrontAuth.FrontAuthMember');
	var $components = array('BcReplacePrefix','BcAuth','Cookie','BcAuthConfigure');	//認証がかかる
	
/**
 * ぱんくずナビ
 *
 * @var array
 * @access public
 */
	var $crumbs = array(
		array('name' => 'メンバーログイン画面', 'url' => array('plugin' => 'front_auth', 'controller' => 'front_auth', 'action' => 'index'))
	);

/**
 * beforeFilter
 */
 	function beforeFilter() {
		parent::beforeFilter();
		if (!preg_match('/^admin_/', $this->action)) {
			$this->BcAuth->allow($this->action);
		}
	}
	
	function index() {
		$this->redirect('/news');
		$this->pageTitle = 'トピックス一覧';	//上書きすることもできる
	}
	
	function login() {
		$user = $this->BcAuth->user();
		$userModel = $this->BcAuth->userModel;
		//var_dump($user);
		//var_dump($userModel);
		$this->set('userModel', $userModel);
		$this->set('user', $user);
		
		//$this->redirect('/admin/users/login');
		//var_dump($this->Session->read('url'));
	}
	
	function logout() {
		if(!empty($_SESSION['Auth']['User'])) {
			$this->Session->destroy();
			$this->Session->setFlash('ログアウトしました');
		}
		$this->redirect('/');
	}
	
	function admin_index() {
		$this->pageTitle = '認証登録一覧';
		$this->subMenuElements = array('front_auth_index');
		
		$datas = $this->FrontAuthMember->find('all');
		$this->set('datas', $datas);
	}
	
	function admin_add() {
		$this->pageTitle = '新規認証メンバー追加';
		if ($this->data) {
			// 送信データをDBに保存
			$this->FrontAuthMember->set($this->data);
			if ($this->FrontAuthMember->save()) {
				$this->Session->setFlash('保存しました');
				$this->redirect('index');
			} else {
				$this->Session->setFlash('失敗！');
			}
		}
	}
	
	function admin_edit($id) {
		$this->pageTitle = '認証メンバー編集';
		$this->subMenuElements = array('front_auth_index');
		
		if (!$this->data) {
		# フォームにDBデータを表示
			$this->data = $this->FrontAuthMember->read(null, $id);
		} else {
			// 送信データをDBに保存
			$this->FrontAuthMember->set($this->data);
			if ($this->FrontAuthMember->save()) {
				$this->Session->setFlash('保存しました');
				$this->redirect('index');
			} else {
				$this->Session->setFlash('失敗！');
			}
			
		}
		$datas = $this->FrontAuthMember->find('all');
		$this->set('datas', $datas);
	}
	
	function admin_delete($id) {
		if($this->FrontAuthMember->delete($id)) {
			$this->Session->setFlash('削除しました');
			$this->redirect('index');
		} else {
			$this->Session->setFlash('失敗！');
			$this->redirect('index');
		}
	}

}
?>