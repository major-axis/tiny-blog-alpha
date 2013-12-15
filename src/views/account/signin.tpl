{extends file='../layouts/account.tpl'}
{block name=title prepend}Sign in{/block}
{block name=content}
<div class="account-block">
  <form class="ui warning form segment" action="{$Yii->getRequest()->getUrl()}" method="post">
    {widget name='CsrfField'}
    <input type="hidden" name="redirectTo" value="{$redirectTo nofilter}" />
    <div class="account-form">
      <h3 class="ui header">Sign in</h3>
      {if isset($messages['errors'])}
      <div class="ui warning message">
        <ul class="list">
        {foreach $messages['errors'] as $errorMsg}
          <li>{$errorMsg}</li>
        {/foreach}
        </ul>
      </div>
      {/if}
      <div class="field">
        <label>Nickname</label>
        <input name="SignInForm[nickname]" placeholder="Nickname" type="text" value="{previous_value form='SignInForm' field='nickname'}" />
        {if isset($messages['fields']) && isset($messages['fields']['nickname'])}
          <div class="ui red pointing above ui label">{$messages['fields']['nickname'][0]}</div>
        {/if}
      </div>
      <div class="field">
        <label>Password</label>
        <input name="SignInForm[password]" placeholder="Password" type="password" />
        {if isset($messages['fields']) && isset($messages['fields']['password'])}
          <div class="ui red pointing above ui label">{$messages['fields']['password'][0]}</div>
        {/if}
      </div>
      <div class="field">
        <label>We need to make sure you are a real person</label>
        <div class="ui two column grid">
          <div class="column">
            <input name="SignInForm[captcha]" placeholder="Type the word" type="text" />
            {if isset($messages['fields']) && isset($messages['fields']['captcha'])}
              <div class="ui red pointing above ui label">{$messages['fields']['captcha'][0]}</div>
            {/if}
          </div>
          <div class="column">
            <img captcha-img url="{$Yii->createUrl('site/captcha')}">
          </div>
        </div>
      </div>
      <div class="inline field">
        <div class="ui checkbox">
          <input name="SignInForm[rememberMe]" id="keep-signed-in" type="checkbox" value="1" checked="true" />
          <label for="keep-signed-in"></label>
        </div>
        <label>Keep me signed in</label>
      </div>
      <div>
        <input type="submit" class="ui blue submit button" value="Sign in" />
      </div>
    </div>
  </form>
</div>
{/block}