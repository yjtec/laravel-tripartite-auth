# 第三方账号授权

## 微信开放平台APP授权

```php
    $app = TripartiteAuth::WeChatOpenPlatform();//创建实例
    $token = $app->getAccessToken($code);//根据code获取Token信息
    $user_info = $app->getUserByToken($token);//根据Token信息获取用户信息
```