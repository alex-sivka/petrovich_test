<?php defined('ROOT') || die('boo boo'); ?>

<div class="sx-box sx-12 sx-box-menu">
	<form class="sx-form sx-tabs"  action="/modules/page/save">
		
			<div class="sx-12 sx-form-box">
				<div class="sx-12">
					<input type="text" name="title" sx-rules="min:3">
				</div>

				<div class="sx-12">
					<input type="text" name="keywords" class="sx-render">
				</div>
			</div>
				<div class="sx-12 sx-form-box" sx-header="{{page_text}}">
					<textarea name="body" class="sx-editor sx-render sx-no-label sx-switch-to-head"></textarea>
				</div>
			

			<div class="row sx-last sx-submit-buttons"></div>
		<div class="sx-history-info44"></div>
	</form>
</div>
<script>

	var data = <?=$json?>;
	var form = new App.Form({
		data: data,
		saveMsg: '{{page_saved}}',

		afterSave: (dt, eName) => {
			if(eName == 'save' && !data.id && dt.id) App.navigate('modules/page/edit/?id=' + dt.id);
			else App.setHeaders({ subtitle: App.lang('editing') + ' ['+data.name+']' });
		}
	});

	if(data.id){
		$(window).one('sx_boxMenuRendered', function(){
			App.$main.find('.sx-block-menu').first().find('li').removeClass('active');
		});
		App.setHeaders({ icon: 'edit', title: 'page', subtitle: App.lang('editing') + ' ['+data.name+']' });
		App.setBreadcrumbs( [{pages: 'modules/page'}, {editing: null}] );
	}else{
		App.setHeaders({ icon: 'edit', title: 'page', subtitle: App.lang('new_page') });
		App.setBreadcrumbs( [{pages: 'modules/page'}, {new_page: null}] );
	}




</script>