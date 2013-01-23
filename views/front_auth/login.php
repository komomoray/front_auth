<?php $bcBaser->css('/front_auth/css/front_auth.style') ?>
	
<?php if (empty($_SESSION['Auth']['User'])): ?>
<div id="Login">
	
	<div id="LoginInner">
				
		<h2>メンバーログイン画面</h2>
		<p>ログインしてください。</p>
		
		<?php echo $bcForm->create($userModel, array('url' => '/users/login', 'id' => 'UserLoginForm')) ?>
		<table id="UserLoginFromTable">
			<tr>
				<th><?php echo $bcForm->label($userModel.'.name', 'アカウント名') ?></th>
				<td><?php echo $bcForm->input($userModel.'.name', array('type' => 'text', 'size'=>16 ,'tabindex'=>1)) ?>
					<?php echo $bcForm->error($userModel.'.name') ?></td>
			</tr>
			<tr>
				<th><?php echo $bcForm->label($userModel.'.password', 'パスワード') ?></th>
				<td><?php echo $bcForm->input($userModel.'.password',array('type' => 'password', 'size'=>16,'tabindex'=>2)) ?>
					<?php echo $bcForm->error($userModel.'.password') ?></td>
			</tr>
		</table>
		<div class="submit">
			<?php echo $bcForm->submit('ログイン', array('div' => false, 'class' => 'btn-red button', 'id' => 'BtnLogin','tabindex'=>4)) ?>
		</div>
		<div class="remember">
			<?php //echo $bcForm->input($userModel.'.saved', array('type' => 'checkbox', 'label' => '保存する','tabindex'=>3)) ?>　
		</div>
		<?php echo $bcForm->end() ?>
	</div>

</div>
<?php else: ?>
	<h2>入室エラー</h2>
	<p>現在ログインしているアカウントでは閲覧できません。<br>ログアウトしたあと、閲覧権限のあるアカウントで再度ログインしてください。</p>
	<div id="loginAccount">
		<p><span class="attention"><?php echo $user['real_name_1']." ".$user['real_name_2'] ?></span>さんでログイン中</p>
		<p><?php echo $bcBaser->link("ログアウト", "/front_auth/logout"); ?></p>
	</div>
<?php endif ?>

<?php // var_dump($_SERVER["HTTP_REFERER"]) ?>

