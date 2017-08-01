<?php defined('ROOT') || die('Guten tag'); ?>

<div class="sx-box sx-12 sx-box-menu">
	<table class="table table-striped table-hover" id="sx-table">
		<thead>
		<tr>
			<th sx-sort="id">#</th>
			<th sx-sort="name" >{{name}}</th>
			<th sx-sort="group_name" >{{group_name}}</th>
			<th sx-sort="last_visit" >{{last_visit}}</th>
			<th sx-sort="active">{{active_sm}}</th>
			<th></th>
			<th></th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td sx-name="id"></td>
			<td sx-name="name" sx-link="edit_link"></td>
			<td sx-name="group_name"></td>
			<td sx-name="last_visit" sx-format="date"></td>
			<td sx-switch="active"></td>
			<td sx-tool="fromTrash"></td>
			<td sx-tool="trash"></td>
		</tr>
		</tbody>
	</table>
</div>
<script>

	new App.Table({
		el: '#sx-table',
		items: <?=$json?>,
		removeText: '{{msg_remove_user}}',
		removeMsg: '{{msg_user_removed_to_trash}}',
	});

	App.setHeaders({ icon: 'users', title: 'users', subtitle: 'list' });
	App.setBreadcrumbs( [{users: null}] );


</script>