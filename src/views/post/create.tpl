{extends file='../layouts/manage.tpl'}
{block name=title prepend}Create a post{/block}
{block name=head append}
<script src="{$Yii->params['siteAssetsUrlDir'] nofilter}lib/tinymce/tinymce.jquery.js"></script>
<script src="{$Yii->params['siteAssetsUrlDir'] nofilter}lib/tinymce/jquery.tinymce.min.js"></script>
{/block}
{block name=content}
<div class="ui segment attached">
  <form class="ui form" action="{$Yii->getRequest()->getUrl()}" method="post">
    {widget name='CsrfField'}
    <div class="field">
      <label>Title</label>
      <input name="CreateForm[title]" type="text" />
    </div>
    <div class="field">
      <label>Content</label>
      <textarea name="CreateForm[content]" ui-tinymce submit-image-url="{$Yii->createUrl('upload/image')}"></textarea>
    </div>
    <div>
      <input type="submit" class="ui blue submit button" value="Create" />
    </div>
  </form>
</div>
{/block}