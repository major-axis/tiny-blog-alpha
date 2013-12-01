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
  {include file='../fragments/header.tpl'}
  <div class="blog-container">
    <div class="blog-header">
      <h1>Tiny Blog</h1>
    </div>
    <div class="ui menu">
      <a class="active item">
        <i class="home icon"></i> Home
      </a>
      <a class="item">
        <i class="info letter icon"></i> About
      </a>
      <div class="right menu">
        <div class="item">
          <div class="ui icon input">
            <input placeholder="Search..." type="text">
            <i class="search link icon"></i>
          </div>
        </div>
      </div>
    </div>
    {block name=content}{/block}
  </div>
</body>
</html>