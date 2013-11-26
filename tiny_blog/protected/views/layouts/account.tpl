<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title>{$this->pageTitle}</title>

  <link rel="stylesheet" type="text/css" href="{$Yii->params['siteAssetsUrlDir'] nofilter}css/semantic.css">
  <link rel="stylesheet" type="text/css" href="{$Yii->params['siteAssetsUrlDir'] nofilter}css/style-global.css">
  <link rel="stylesheet" type="text/css" href="{$Yii->params['siteAssetsUrlDir'] nofilter}css/style-account.css">

</head>
<body>
  <div class="blog-container">
    <div class="ui small text menu">
      <div class="right menu">
        <a href="{$Yii->homeUrl}" class="item"><i class="home icon"></i> Home</a>
      </div>
    </div>
    <div class="ui basic segment">
      <div class="ui huge header">Tiny Blog</div>
    </div>
    {block name=content}{/block}
  </div>
</body>
</html>