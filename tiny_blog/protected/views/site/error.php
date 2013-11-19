<div class="blank-content-block">
  <div class="ui center aligned basic segment">
    <?php if(isset($code))
    { ?>
      <div class="ui header">
        Error <?php echo CHtml::encode($code); ?>
      </div>
    <?php } ?>
    <?php $errorMessage = Yii::app()->user->getFlash('errorMessage');
    if(isset($errorMessage))
    { ?>
      <div>
        <?php echo CHtml::encode($errorMessage); ?>
      </div>
    <?php } ?>
  </div>
</div>
