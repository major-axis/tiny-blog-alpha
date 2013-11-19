<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title><?php echo CHtml::encode($this->pageTitle); ?></title>

  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/semantic.css">
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style-global.css">
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style-account.css">

</head>
<body>
  <div class="blog-container">
    <div class="ui small text menu">
      <div class="right menu">
        <a href="<?php echo Yii::app()->homeUrl; ?>" class="item"><i class="home icon"></i> Home</a>
      </div>
    </div>
    <div class="segment">
      <div class="ui huge header">Tiny Blog</div>
    </div>
    <?php echo $content; ?>
  </div>
</body>
</html>
