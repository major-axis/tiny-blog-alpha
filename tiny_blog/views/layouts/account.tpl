<!DOCTYPE html>
<html {if isset($ngApp)}id="ng-app" ng-app="{$ngApp}"{/if}>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title>{block name=title} - {$Yii->params['title']}{/block}</title>

  {block name=head}
  <link rel="stylesheet" type="text/css" href="{$Yii->params['siteAssetsUrlDir'] nofilter}css/semantic.css">
  <link rel="stylesheet" type="text/css" href="{$Yii->params['siteAssetsUrlDir'] nofilter}css/style-global.css">
  <link rel="stylesheet" type="text/css" href="{$Yii->params['siteAssetsUrlDir'] nofilter}css/style-account.css">

  <!--[if lte IE 8]>
    <script src="{$Yii->params['siteAssetsUrlDir'] nofilter}js/lib/json3/json3.js"></script>
  <![endif]-->
  <script src="{$Yii->params['siteAssetsUrlDir'] nofilter}js/lib/jquery/jquery-1.10.2.js"></script>
  <script src="{$Yii->params['siteAssetsUrlDir'] nofilter}js/lib/angular/angular.js"></script>
  <script src="{$Yii->params['siteAssetsUrlDir'] nofilter}js/lib/semantic/semantic.js"></script>
  <script src="{$Yii->params['siteAssetsUrlDir'] nofilter}js/app/app.js"></script>
  {/block}
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