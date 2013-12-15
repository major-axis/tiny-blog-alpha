<?php

$wwwDir = realpath(dirname(__FILE__) . '/../www');

return array(
    'rememberCookieDuration' => 60*60*24*30,
    'passwordHashPbkdf2Config' => array(
        'digest' => PHPassLib\Hash\PBKDF2::DIGEST_SHA512,
        'rounds' => 12000,
        'saltsize' => 16,
    ),
    'uploadedImagesDir' => $wwwDir . '/uploaded/images',
    'title' => 'Tiny Blog Demo',
    'siteAssetsUrlDir' => '/assets/',
    'uploadedImagesUrlDir' => '/uploaded/images/',
    'pageSize' => 10,
    'messages' => array(
        'CAPTCHA_ERROR' => 'The characters you entered didn\'t match the word verification. Please try again.'
    )
);
