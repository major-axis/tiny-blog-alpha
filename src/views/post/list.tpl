{extends file='../layouts/manage.tpl'}
{block name=title prepend}{title}{/block}
{block name=content}
<div class="ui grid">
  {block name=action}{/block}
  <div class="ui eleven wide column">
  {foreach $posts as $post}
    <div class="ui segment">
      <h3 class="ui header"><a href="">{$post->title}</a></h3>
      <div>{$post->content nofilter}</div>
      <div class="ui divider"></div>
      <div>
        <i class="icon orange user"></i> <a href="">{$post->author->nickname}</a>
         | 
        <i class="icon calendar"></i> <div timestamp="{$post->last_modified_timestamp}">{literal}{{ localTime }}{/literal}</time>
      </div>
    </div>
  {/foreach}
  </div>
</div>
{/block}