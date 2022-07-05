## Laravel Box

Laravel 后台开发整合包，集成 dcat-admin、JWT、iseed、easy-wechat 以及 laravel-debugbar，省去配置过程，开箱即用。

版本可直接参考 `composer.json` 中的配置。

### 使用

`git clone` 本仓库。

`php artisan admin:install`

`php artisan db:seed`

### 集成配置

#### Laravel

box 完成了 Laravel 的本地化配置，时区为 `Asia/Shanghai`，默认语言为 `zh_CN`。

#### DcatAdmin

box 完成了 DcatAdmin 的部署任务，并且对登陆页面做了还原，现在与其 demo 站点展示的页面一致。

#### JWT

box 将 JWT 与 DcatAdmin 完美整合，使用 `admin_users` 表的 `username` 和 `password` 对用户信息进行鉴权。

基础鉴权接口控制器：`app/Http/Controllers/AuthController`

基础鉴权接口路由：`routes/api.php`

|名称|方法|地址|描述|
|---|---|---|---|
|登录|POST|`/api/auth/login`|用户登录，获取 JWT 。|
|注销|POST|`/api/auth/logout`|用户注销。|
|当前用户信息|POST|`/api/auth/me`|返回当前登录用户的信息。|
|刷新token|POST|`/api/auth/refresh`|生成新的 token，生成的 token 不会禁用之前可用的 token，可平行使用。|

#### iseed

iseed 是一个便捷的数据库填充生成工具，可以快速的将数据库表内的现有数据导出为 `database/seeders` 下的填充文件，从而可用 `php artisan db:seed` 命令实现应用数据预填充。

例如，应用开发完成后，需要预填充菜单和权限信息，那么我们可以使用 `php artisan iseed admin_menu,admin_permissions` 命令来实现填充数据的生成作业。

### 截图

![](https://tva1.sinaimg.cn/large/008i3skNgy1gtbhuhxuexj31sy0u0ail.jpg)
