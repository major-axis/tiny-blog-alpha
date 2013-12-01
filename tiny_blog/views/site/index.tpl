{extends file='../layouts/blank.tpl'}
{block name=title prepend}Home{/block}
{block name=content}
<div class="blank-content-block">
  <div class="ui center aligned basic segment">
    Hi, {if $Yii->user->isGuest}Guest{else}{$Yii->user->model->nickname}{/if}
  </div>
</div>
{/block}