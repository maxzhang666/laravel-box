<?php

namespace App\Admin\Controllers;

use Dcat\Admin\Http\Controllers\AuthController as BaseAuthController;

class AuthController extends BaseAuthController
{
    /**
     * 登录页面视图.
     * laravel-box定义.
     *
     * @var string
     */
    protected $view = 'admin.login';
}
