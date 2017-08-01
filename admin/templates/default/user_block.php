<?php defined('ROOT') || die('Guten tag');?>

  <div class="user-media-toggleHover">
    <span class="fa fa-user"></span> 
  </div>
  <div class="user-wrapper bg-dark">
    <a class="user-link" href="/<?=ADM_DIR?>/components/users/edit/?id=<?=User::$id?>">
      <img class="media-object img-thumbnail user-img" alt="User Picture" src="<?=User::getUserImg(User::get('img'))?>">
      <!--<span class="label label-danger user-label">16</span>-->
    </a>
    <div class="media-body">
      <h5 class="media-heading"><?=User::get('name')?></h5>
      <ul class="list-unstyled user-info">
        <li> <a href="/<?=ADM_DIR?>/components/users/edit/?id=<?=User::$id?>"><?=User::getUserGroupName(User::$id)?></a>  </li>
        <li><?=Lang::get('last_visit')?> :
          <br>
          <small>
            <i class="fa fa-calendar"></i>&nbsp;<?=User::get('last_visit')?></small> 
        </li>
      </ul>
    </div>
  </div>
