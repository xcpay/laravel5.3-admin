<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
Route::post('login', 'LoginController@login');
Route::get('logout', 'LoginController@logout');
Route::post('logout', 'LoginController@logout');

Route::get('/', 'IndexController@index');


Route::get('index', ['as' => 'admin.index', 'uses' => function () {
    return redirect('/admin/log-viewer');
}]);


Route::group(['middleware' => ['auth:admin', 'menu', 'authAdmin']], function () {

    //权限管理路由
    Route::get('permission/{cid}/create', ['as' => 'admin.permission.create', 'uses' => 'PermissionController@create']);
    Route::get('permission/manage', ['as' => 'admin.permission.manage', 'uses' => 'PermissionController@index']);
    Route::get('permission/{cid?}', ['as' => 'admin.permission.index', 'uses' => 'PermissionController@index']);
    Route::post('permission/index', ['as' => 'admin.permission.index', 'uses' => 'PermissionController@index']); //查询
    Route::resource('permission', 'PermissionController', ['names' => ['update' => 'admin.permission.edit', 'store' => 'admin.permission.create']]);


    //角色管理路由
    Route::get('role/index', ['as' => 'admin.role.index', 'uses' => 'RoleController@index']);
    Route::post('role/index', ['as' => 'admin.role.index', 'uses' => 'RoleController@index']);
    Route::resource('role', 'RoleController', ['names' => ['update' => 'admin.role.edit', 'store' => 'admin.role.create']]);


    //用户管理路由
    Route::get('user/index', ['as' => 'admin.user.index', 'uses' => 'UserController@index']);  //用户管理
    Route::post('user/index', ['as' => 'admin.user.index', 'uses' => 'UserController@index']);
    Route::resource('user', 'UserController', ['names' => ['update' => 'admin.role.edit', 'store' => 'admin.role.create']]);

    //ISV管理路由
    Route::get('isv/index', ['as' => 'admin.isv.index', 'uses' => 'IsvController@index']);  //Isv管理
    Route::post('isv/index', ['as' => 'admin.isv.index', 'uses' => 'IsvController@index']);
    Route::resource('user', 'UserController', ['names' => ['update' => 'admin.role.edit', 'store' => 'admin.role.create']]);

//微信服务商设置路由
    Route::get('wechat/index', ['as' => 'admin.wechat.index', 'uses' => 'WechatController@index']);  //微信服务商管理
    Route::post('wechat/index', ['as' => 'admin.wechat.index', 'uses' => 'WechatController@index']);
    Route::resource('user', 'UserController', ['names' => ['update' => 'admin.role.edit', 'store' => 'admin.role.create']]);

//微信公众号管理路由
    Route::get('wechatmp/index', ['as' => 'admin.wechatmp.index', 'uses' => 'WechatmpController@index']);  //微信公众号管理
    Route::post('wechatmp/index', ['as' => 'admin.wechatmp.index', 'uses' => 'WechatmpController@index']);
    Route::resource('user', 'UserController', ['names' => ['update' => 'admin.role.edit', 'store' => 'admin.role.create']]);
//微众银行通道设置路由
    Route::get('webank/index', ['as' => 'admin.webank.index', 'uses' => 'WebankController@index']);  //微众银行通道设置管理
    Route::post('webank/index', ['as' => 'admin.webank.index', 'uses' => 'WebankController@index']);
    Route::resource('user', 'UserController', ['names' => ['update' => 'admin.role.edit', 'store' => 'admin.role.create']]);
//平安银行通道设置路由
    Route::get('pingan/index', ['as' => 'admin.pingan.index', 'uses' => 'PinganController@index']);  //平安银行通道设置管理
    Route::post('pingan/index', ['as' => 'admin.pingan.index', 'uses' => 'PinganController@index']);
    Route::resource('user', 'UserController', ['names' => ['update' => 'admin.role.edit', 'store' => 'admin.role.create']]);


//客户信息管理路由
    Route::get('customer/index', ['as' => 'admin.customer.index', 'uses' => 'CustomerController@index']);  //客户信息管理
    Route::post('customer/index', ['as' => 'admin.customer.index', 'uses' => 'CustomerController@index']);
    Route::resource('user', 'UserController', ['names' => ['update' => 'admin.role.edit', 'store' => 'admin.role.create']]);
//客户门店管理路由
    Route::get('shop/index', ['as' => 'admin.shop.index', 'uses' => 'ShopController@index']);  //客户门店管理
    Route::post('shop/index', ['as' => 'admin.shop.index', 'uses' => 'ShopController@index']);
    Route::resource('user', 'UserController', ['names' => ['update' => 'admin.role.edit', 'store' => 'admin.role.create']]);
//客户收银员管理路由
    Route::get('casher/index', ['as' => 'admin.casher.index', 'uses' => 'CasherController@index']);  //客户收银员管理
    Route::post('casher/index', ['as' => 'admin.casher.index', 'uses' => 'CasherController@index']);
    Route::resource('user', 'UserController', ['names' => ['update' => 'admin.role.edit', 'store' => 'admin.role.create']]);
//商户门店交易管理路由
    Route::get('reportmerchant/index', ['as' => 'admin.reportmerchant.index', 'uses' => 'ReportmerchantController@index']);  //商户门店交易管理
    Route::post('reportmerchant/index', ['as' => 'admin.reportmerchant.index', 'uses' => 'ReportmerchantController@index']);
    Route::resource('user', 'UserController', ['names' => ['update' => 'admin.role.edit', 'store' => 'admin.role.create']]);


//交易明细报表路由
    Route::get('ordersdetail/index', ['as' => 'admin.ordersdetail.index', 'uses' => 'OrdersdetailController@index']);  //交易明细报表
    Route::post('ordersdetail/index', ['as' => 'admin.ordersdetail.index', 'uses' => 'OrdersdetailController@index']);
    Route::resource('user', 'UserController', ['names' => ['update' => 'admin.role.edit', 'store' => 'admin.role.create']]);
//商户交易汇总表
    Route::get('etpssummary/index', ['as' => 'admin.etpssummary.index', 'uses' => 'EtpssummaryController@index']);  //商户交易汇总表
    Route::post('etpssummary/index', ['as' => 'admin.etpssummary.index', 'uses' => 'EtpssummaryController@index']);
    Route::resource('user', 'UserController', ['names' => ['update' => 'admin.role.edit', 'store' => 'admin.role.create']]);

//代理商交易汇总表路由
    Route::get('agentsummary/index', ['as' => 'admin.agentsummary.index', 'uses' => 'AgentsummaryController@index']);  //代理商交易汇总表
    Route::post('agentsummary/index', ['as' => 'admin.agentsummary.index', 'uses' => 'AgentssummaryController@index']);
    Route::resource('user', 'UserController', ['names' => ['update' => 'admin.role.edit', 'store' => 'admin.role.create']]);

//渠道商信息配置路由
    Route::get('agentinfo/index', ['as' => 'admin.agentinfo.index', 'uses' => 'AgentinfoController@index']);  //渠道商信息配置
    Route::post('agentinfo/index', ['as' => 'admin.agentinfo.index', 'uses' => 'AgentinfoController@index']);
    Route::resource('user', 'UserController', ['names' => ['update' => 'admin.role.edit', 'store' => 'admin.role.create']]);

//地推人员管理路由
    Route::get('business/index', ['as' => 'admin.business.index', 'uses' => 'BusinessController@index']);  //地推人员管理
    Route::post('business/index', ['as' => 'admin.business.index', 'uses' => 'BusinessController@index']);
    Route::resource('user', 'UserController', ['names' => ['update' => 'admin.role.edit', 'store' => 'admin.role.create']]);



});

Route::get('/', function () {
    return redirect('/admin/index');
});

