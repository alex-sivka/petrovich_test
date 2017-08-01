<div class="sx-box sx-12 sx-box-menu">
	<form class="sx-form"  action="/components/user/save">
        <div class="row"></div>
		<div class="row">
			<div class="sx-6 sx-form-box">
				<input type="text" name="name" sx-rules="min:3">
				<input type="text" name="email" sx-rules="email">
                
                <div class="form-group">
                    <label class="control-label col-sm-4">{{change_password}}</label>
                    <div class="col-sm-8">
                    <div class="input-group">
                        <input type="password" name="pass_" class="form-control bottom sx-no-render" autocomplete="off">
                        <input type="text" style="display: none;" class="form-control bottom js-show-pass-input sx-no-render">
                        <span class="input-group-btn">
                            <button class="btn btn-default btn-rect js-show-pass-btn" type="button" style="margin-bottom: 9px;"><i class="fa fa-eye"></i></button>
                        </span>
                    </div>
                    </div>
                </div>
				<!--<select name="group_id" sx-label="users_group"></select>-->
				<input type="checkbox" sx-label="active_sm" name="active">
			</div>
			
			<div class="sx-6 sx-form-box" sx-header="{{image}}">
				<div class="sx-form-img" sx-name="img"></div>
			</div>
			
		</div>
        <div class="sx-submit-buttons"></div>
	</form>
</div>

<script>

	var data = <?=$json?>;
	var form = new App.Form({
		data: data,
		saveMsg: '{{user_saved}}',
		//preview: <?//=$preview?>,
		afterSave: (dt, eName) => {
			if(eName == 'save' && !data.id && dt.id) App.navigate('components/user/edit/?id=' + dt.id);
			else App.setHeaders({ subtitle: App.lang('editing') + ' ['+data.name+']' });
		}
	});

	if(data.id){
		App.setHeaders({ icon: 'edit', title: 'user', subtitle: App.lang('editing') + ' ['+data.name+']' });
		App.setBreadcrumbs( [{users: 'components/user'}, {editing: null}] );
	}else{
		App.setHeaders({ icon: 'edit', title: 'user', subtitle: App.lang('new_user') });
		App.setBreadcrumbs( [{users: 'components/user'}, {new_user: null}] );
	}
	
    let $passInput = form.find('input[name=pass_]');
	let $showInput = form.find('.js-show-pass-input');
	form.find('.js-show-pass-btn').on('mousedown touchstart',function(){
		let val = $passInput.hide().val();
		$showInput.show().val(val);
	}).on('mouseup touchend', function(){
		let val = $showInput.hide().val();
		$passInput.show().val(val);
	});
	
	setTimeout(function(){
		form.find('input[name=pass_]').val('');
	},200);

</script>