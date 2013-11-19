<div class="blank-content-block">
  <div class="ui center aligned basic segment">
    Hi, <?php if(Yii::app()->user->isGuest) { ?>Guest<?php } else { echo CHtml::encode(Yii::app()->user->model->nickname); } ?>
  </div>
</div>
