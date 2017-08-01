<link rel="stylesheet" href="/assets/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="/assets/font-awesome/css/font-awesome.min.css">

<script src="/assets/jquery/dist/jquery.min.js"></script>
<script src="/assets/bootstrap/dist/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="/assets/magnific-popup/dist/magnific-popup.css">
    <script src="/assets/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    
    <link rel="stylesheet" href="/assets/jquery-ui/themes/smoothness/jquery-ui.min.css" />
 
 	<!--<link rel="stylesheet" href="/<?=ADM_DIR?>/js/libs/ui/sivka.ui.css" /> -->
    <script src="/assets/jquery-ui/jquery-ui.min.js"></script>
    <script src="/assets/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
    <!--<script src="/<?=ADM_DIR?>/js/libs/ui/sivka.ui.js"></script>-->

    <link rel="stylesheet" href="/assets/jquery.fancytree/dist/skin-lion/ui.fancytree.min.css" />
    <script src="/assets/jquery.fancytree/dist/jquery.fancytree-all.min.js"></script>
    
    
    <script src="/assets/sprintf/dist/sprintf.min.js"></script>
	<script src="/assets/lodash/dist/lodash.min.js"></script>
    <script src="/assets/backbone/backbone-min.js"></script>
	<script src="/assets/backbone-deep-model/dist/backbone-deep-model.min.js"></script>
	<script src="/assets/vue/dist/vue.min.js"></script>
    
    <script src="/<?=ADM_DIR?>/js/App.js"></script>
	<script src="/<?=ADM_DIR?>/js/App.Init.js"></script>
	<script src="/<?=ADM_DIR?>/js/App.Utils.js"></script>
	<script src="/<?=ADM_DIR?>/js/App.HtmlCompiler.js"></script>
	<script src="/<?=ADM_DIR?>/js/App.Modal.js"></script>
	<script src="/<?=ADM_DIR?>/js/App.Table.js"></script>
	<script src="/<?=ADM_DIR?>/js/App.Form.js"></script>
	<script src="/<?=ADM_DIR?>/js/App.File.js"></script>
	<script src="/<?=ADM_DIR?>/js/App.Gallery.js"></script>

    <?php if ($config->editor && $config->editor_active == 1){
		require_once ROOT . 'js/editors/' . $config->editor . '/scripts.php';
	} ?>
	
	<?php if ($config->filemanager && $config->int('filemanager_active') == 1){ ?>
		<link rel="stylesheet" type="text/css" media="screen" href="/<?=ADM_DIR?>/js/filemanagers/<?=$config->filemanager?>/css/<?=$config->filemanager?>.min.css">
		<script src="/<?=ADM_DIR?>/js/filemanagers/<?=$config->filemanager?>/js/<?=$config->filemanager?>.js"></script>
		<script src="/<?=ADM_DIR?>/js/filemanagers/<?=$config->filemanager?>/sx_connector.js"></script>
	<?php } ?>
	
	
	<script src="/<?=ADM_DIR?>/js/uploader.js"></script>
	<script src="/assets/jquery.cookie/jquery.cookie.js"></script>



	<script src="/assets/moment/min/moment.min.js"></script>
	<script src="/assets/moment/locale/<?=$app->Lang->langName()?>.js"></script>
	<link rel="stylesheet"  href="/assets/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css"/>
	<script src="/assets/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>


<link rel="stylesheet" href="/<?=ADM_DIR?>/assets/style.css">
<link rel="stylesheet" href="/<?=ADM_DIR?>/assets/modal.css">

<link href="/assets/tooltipster/dist/css/tooltipster.bundle.min.css" rel="stylesheet">
<link href="/assets/tooltipster/dist/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-light.min.css" rel="stylesheet">
<script src="/assets/tooltipster/dist/js/tooltipster.bundle.min.js"></script>

<link href="/assets/animate.css/animate.min.css" rel="stylesheet">
<script src="/assets/remarkable-bootstrap-notify/bootstrap-notify.min.js"></script>

<link href="/assets/jquery-toastmessage/src/main/resources/css/jquery.toastmessage.css" rel="stylesheet">
<script src="/assets/jquery-toastmessage/src/main/javascript/jquery.toastmessage.js"></script>

<script src="/<?=ADM_DIR?>/js/uploader.js"></script>

<link rel="stylesheet" href="/assets/select2/dist/css/select2.min.css" />
<script src="/assets/select2/dist/js/select2.full.min.js"></script>
<script src="/assets/select2/dist/js/i18n/<?=$app->Lang->langName()?>.js"></script>

<? $opts = isset($frameMode) ? json_encode(array('mode'=>'frame')) : ''; ?>
<script>
	$(function(){
		App.init(<?=$opts?>);
	});
</script>
