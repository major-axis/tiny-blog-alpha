<div class="account-block">
  <form class="ui warning form segment" action="<?php echo Yii::app()->getRequest()->getUrl(); ?>" method="post">
    <?php echo FormHelper::csrfField(); ?>
    <input type="hidden" name="redirectTo" value="<?php echo $redirectTo; ?>" />
    <div class="account-form">
      <h3 class="ui header">Sign in</h3>
      <?php if(isset($messages['errors']))
      { ?>
      <div class="ui warning message">
        <ul class="list">
          <?php foreach($messages['errors'] as $errorMsg)
          { ?>
            <li><?php echo CHtml::encode($errorMsg); ?></li>
          <?php } ?>
        </ul>
      </div>
      <?php } ?>
      <div class="field">
        <label>Nickname</label>
        <input name="SigninForm[nickname]" placeholder="Nickname" type="text" value="<?php echo CHtml::encode(FormHelper::prevInput('SigninForm', 'nickname')); ?>" />
        <?php if(isset($messages['fields']) && isset($messages['fields']['nickname']))
        { ?>
          <div class="ui red pointing above ui label"><?php echo CHtml::encode($messages['fields']['nickname'][0]) ?></div>
        <?php } ?>
      </div>
      <div class="field">
        <label>Password</label>
        <input name="SigninForm[password]" placeholder="Password" type="password" />
        <?php if(isset($messages['fields']) && isset($messages['fields']['password']))
        { ?>
          <div class="ui red pointing above ui label"><?php echo CHtml::encode($messages['fields']['password'][0]) ?></div>
        <?php } ?>
      </div>
      <div class="field">
        <label>We need to make sure you are a real person</label>
        <div class="ui two column grid">
          <div class="column">
            <input name="SigninForm[captcha]" placeholder="Type the word" type="text" />
            <?php if(isset($messages['fields']) && isset($messages['fields']['captcha']))
            { ?>
              <div class="ui red pointing above ui label"><?php echo CHtml::encode($messages['fields']['captcha'][0]) ?></div>
            <?php } ?>
          </div>
          <div class="column">
            <img alt="" src="<?php echo Yii::app()->createUrl('site/captcha') ?>">
          </div>
        </div>
      </div>
      <div class="inline field">
        <div class="ui checkbox">
          <input name="SigninForm[rememberMe]" id="keep-signed-in" type="checkbox" value="1" checked="true" />
          <label for="keep-signed-in"></label>
        </div>
        <label>Keep me signed in</label>
      </div>
      <input type="submit" class="ui blue submit button" value="Sign in" />
    </div>
  </form>
</div>
