<?php echo $bcForm->create(array('controller' => 'front_auth', 'action' => 'edit')); ?>
<?php echo $bcForm->hidden('FrontAuthMember.id') ?>
<table class="row-table-01">
	<tr>
		<th>アカウント名</th>
		<td><?php echo $bcForm->text('FrontAuthMember.user') ?>※認証を許可するユーザーアカウント名</td>
	</tr>
	<tr>
		<th>アドレス</th>
		<td><?php echo $bcForm->text('FrontAuthMember.url') ?>※認証をかけたいコンテンツのアドレス</td>
	</tr>
</table>

<div class="submit">
	<?php echo $bcForm->submit('保存', array('class' => 'button')) ?>
</div>

<?php echo $bcForm->end() ?>