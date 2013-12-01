{extends file='../layouts/blank.tpl'}
{block name=title prepend}Oops!{/block}
{block name=content}
<div class="blank-content-block">
  <div class="ui center aligned basic segment">
    {if $code}
    <div class="ui header">
      Error {$code}
    </div>
    {/if}
    {if $message}
    <div>
        {$message}
    </div>
    {/if}
  </div>
</div>
{/block}