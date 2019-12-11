<?php
return [
   'wechat' => [
       /**
        * 开放平台第三方平台
        */
       'open_platform' => [
           'app_id' => env('WECHAT_OPEN_PLATFORM_DEFAULT_APPID', ''),
           'secret' => env('WECHAT_OPEN_PLATFORM_DEFAULT_SECRET', ''),
           'token' => env('WECHAT_OPEN_PLATFORM_DEFAULT_TOKEN', ''),
           'aes_key' => env('WECHAT_OPEN_PLATFORM_DEFAULT_AES_KEY', ''),
       ],
       /**
        * 公众号
        */
       'official_account' => [
           'app_id' => env('WECHAT_OFFICIAL_ACCOUNT_APPID', 'your-app-id'),         // AppID
           'secret' => env('WECHAT_OFFICIAL_ACCOUNT_SECRET', 'your-app-secret'),    // AppSecret
           'token' => env('WECHAT_OFFICIAL_ACCOUNT_TOKEN', 'your-token'),           // Token
           'aes_key' => env('WECHAT_OFFICIAL_ACCOUNT_AES_KEY', ''),                 // EncodingAESKey

           /*
            * OAuth 配置
            *
            * scopes：公众平台（snsapi_userinfo / snsapi_base），开放平台：snsapi_login
            * callback：OAuth授权完成后的回调页地址(如果使用中间件，则随便填写。。。)
            */
           // 'oauth' => [
           //     'scopes'   => array_map('trim', explode(',', env('WECHAT_OFFICIAL_ACCOUNT_OAUTH_SCOPES', 'snsapi_userinfo'))),
           //     'callback' => env('WECHAT_OFFICIAL_ACCOUNT_OAUTH_CALLBACK', '/examples/oauth_callback.php'),
           // ],
       ],
   ]
];