<?php

return array(
    'rememberCookieDuration' => 60*60*24*30,
    'passwordHashPbkdf2Config' => array(
        'digest' => PHPassLib\Hash\PBKDF2::DIGEST_SHA512,
        'rounds' => 12000,
        'saltsize' => 16,
    ),
    'title' => 'Tiny Blog Demo',
    'siteAssetsUrlDir' => '/',
    'messages' => array(
        'CAPTCHA_ERROR' => 'The characters you entered didn\'t match the word verification. Please try again.'
    )
);
