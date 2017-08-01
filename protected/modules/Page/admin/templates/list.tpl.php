<?php defined('ROOT') || die('Guten tag'); ?>

		<div class="sx-box sx-12 sx-box-menu" id="mod_page_list">
				<div class="pull-right">
					<div class="sxt-search"></div>
					<div class="sxt-per-page"></div>
					<div class="sxt-paginator"></div>
				</div>
				<table class="table table-striped table-hover sx-table">
					<thead>
						<tr>
							<th>#</th>
							<th>{{title}}</th>
							<th>{{keywords}}</th>
							<th>{{modified}}</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td sx-name="id"></td>
							<td sx-name="title" sx-link="edit_link"></td>
							<td sx-name="keywords"></td>
							<td sx-name="modified"></td>
							<td sx-tool="fromTrash"></td>
							<td sx-tool="trash"></td>
						</tr>
					</tbody>
				</table>
				<div class="sxt-checked-actions"></div>
			</div>

<script>
	var table = new App.Table({
		el: $('#mod_page_list'),
		items: <?=$json?>,
		
		pagination:{total: <?=$totalPages?>, perPage: <?=$perPage?>},

	});

	App.setHeaders({ icon: 'modules.page', title: 'pages', subtitle: 'list' });
	App.setBreadcrumbs( [{pages: null}] );

</script>