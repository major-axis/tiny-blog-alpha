<div class="ui fixed transparent inverted small menu blog-user-nav">
  <div class="blog-container">
    <div class="right menu">
      {if $Yii->user->isGuest}
      <a class="item">
        <i class="login icon"></i> Sign in
      </a>
      {else}
      <div class="ui dropdown item" hover-dropdown-menu>
        <i class="user icon"></i> {$Yii->user->model->nickname} <i class="icon dropdown"></i>
        <div class="menu">
          <a href="{$Yii->createUrl('account/signOut')}" class="item"><i class="sign out icon"></i> Sign out</a>
        </div>
      </div>
      {/if}
    </div>
  </div>
</div>