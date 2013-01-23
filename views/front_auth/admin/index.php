<table class="list-table">
	<tr>
		<th width="60px"></th>
		<th width="60px"></th>
		<th width="200px">名前</th>
		<th>アドレス</th>
	</tr>
	<?php foreach ($datas as $data): ?>
	<tr>
		<td><?php $bcBaser->link('編集', array('plugin' => 'front_auth', 'controller' => 'front_auth', 'action' => 'edit', $data['FrontAuthMember']['id'])) ?></td>
		<td><?php $bcBaser->link('削除', array('plugin' => 'front_auth', 'controller' => 'front_auth', 'action' => 'delete', $data['FrontAuthMember']['id'])) ?></td>
		<td><?php echo $data['FrontAuthMember']['user'] ?></td>
		<td><?php echo $data['FrontAuthMember']['url'] ?></td>
	</tr>
	<?php endforeach ?>

</table>
