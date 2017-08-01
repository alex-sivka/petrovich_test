<?php defined('ROOT') || die('boo boo'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title><?=Lang::get('entering')?></title>
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/assets/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/<?=ADM_DIR?>/templates/default/css/animate.min.css">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="/<?=ADM_DIR?>/templates/default/css/main.min.css">
    
    <script src="/assets/jquery/dist/jquery.min.js"></script>
    <script src="/assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/<?=ADM_DIR?>/js/Login.js"></script>
  </head>
  <body class="login">
    <div class="form-signin">
      <div class="text-center">
        <img src="/<?=ADM_DIR?>/assets/images/logo_s.png" alt="Logo">
      </div>
      <hr>
      <div class="tab-content">
        <div id="login" class="tab-pane active">
          <form id="login">
            <p class="text-muted text-center">
              <?=Lang::get('enter_email_password')?>
            </p>
            <input type="text" placeholder="Email" id="email" class="form-control top">
            
			<div class="input-group">
				<input type="password" placeholder="Password" id="password" class="form-control bottom">
				<input type="text" placeholder="Password" id="_pass" style="display: none;" class="form-control bottom">
				<span class="input-group-btn">
					<button class="btn btn-default" id="show_pass" type="button" style="padding: 11px;margin-bottom: 9px;"><i class="fa fa-eye"></i></button>
				</span>
			</div>
            <!--<input type="checkbox" name="nohash" value="1"> <?=Lang::get('foreign_computer')?>-->
            
			<div class="alert alert-danger" style="display: none;"><?=Lang::get('incorrect_data')?></div>
            <button class="btn btn-lg btn-primary btn-block btn-rect" type="submit"><?=Lang::get('entering')?></button>
          </form>
          
        </div>
        <div id="forgot" class="tab-pane">
          <form id="recover">
            <p class="text-muted text-center"><?=Lang::get('enter_your_email')?></p>
            <input type="email" id="email2" class="form-control">
            <br>
            <div class="alert alert-danger" style="display: none;"><?=Lang::get('incorrect_data')?></div>
            <div class="alert alert-success" style="display: none;"><?=Lang::get('new_pass_sended')?></div>
            <button class="btn btn-lg btn-danger btn-block btn-rect" type="submit"><?=Lang::get('send')?></button>
          </form>
        </div>
      </div>
      <hr>
      <div class="text-center">
        <ul class="list-inline">
          <li> <a class="text-muted" href="#login" data-toggle="tab"><?=Lang::get('entering')?></a>  </li>
          <li> <a class="text-muted" href="#forgot" data-toggle="tab"><?=Lang::get('forgot_password')?>?</a>  </li>
        </ul>
      </div>
    </div>

    <script type="text/javascript">
    
    $(function(){ Login.init('<?=ADM_DIR?>'); });
    
    
      (function($) {
        $(document).ready(function() {
          $('.list-inline li > a').click(function() {
            var activeForm = $(this).attr('href') + ' > form';
            //console.log(activeForm);
            $(activeForm).addClass('animated fadeIn');
            //set timer to 1 seconds, after that, unload the animate animation
            setTimeout(function() {
              $(activeForm).removeClass('animated fadeIn');
            }, 1000);
          });
        });
      })(jQuery);
    </script>
  </body>
</html>