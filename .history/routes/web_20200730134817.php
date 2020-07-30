<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@getIndex')->name('getIndex');

Route::get('system/login', 'Auth\LoginController@getLogin')->name('getLogin');
Route::post('system/login', 'Auth\LoginController@postLogin')->name('postLogin');
Route::get('logout', 'Auth\LoginController@getLogout')->name('getLogout');

Route::group(['prefix' => 'system', 'middleware' => 'AdminLoginMiddleware'], function () {

    Route::get('test', 'TestController@getTest');
    Route::get('testmenu', 'Admin\TestmenuController@index')->name('system.admin.testmenu');
    Route::get('testmenuajax', 'Admin\TestmenuController@ajax')->name('system.admin.testmenuajax');
    //
    Route::get('language/{language}', 'Admin\LanguageController@index')->name('system.admin.language.index');

    //
    Route::get('logout', 'Admin\AdminLoginController@getLogout')->name('system.admin.getLogout');
    //
    // Route::get('/', 'Admin\AdminController@master');
    Route::get('/', 'System\DashboardController@getIndex')->name('Dashbroad.getIndex');

    Route::group(['prefix' => 'langding'], function () {
        Route::get('list', 'Admin\LangdingController@getListLangding')->name('getListLangding');
        Route::get('add', 'Admin\LangdingController@getAddLangding')->name('getAddLangding');
        Route::post('add', 'Admin\LangdingController@postAddLangding')->name('postAddLangding');
        Route::get('delete/{id}', 'Admin\LangdingController@getDeleteLangding')->name('getDeleteLangding');
        Route::get('edit/{locale}/{id}', 'Admin\LangdingController@getEditLangding')->name('getEditLangding');
        Route::post('edit', 'Admin\LangdingController@postEditLangding')->name('postEditLangding');
    });
    //
    Route::group(['prefix' => 'category'], function () {
        Route::get('list', 'Admin\AdminController@getListCategory')->name('system.admin.category.getListCategory');
        Route::get('add', 'Admin\AdminController@getAddCategory')->name('system.admin.category.getAddCategory');
        Route::post('add', 'Admin\AdminController@postAddCategory')->name('system.admin.category.postAddCategory');
        Route::get('delete/{id}', 'Admin\AdminController@getDeleteCategory')->name('system.admin.category.getDeleteCategory');
        Route::get('edit/{locale}/{id}', 'Admin\AdminController@getEditCategory')->name('system.admin.category.getEditCategory');
        Route::post('edit', 'Admin\AdminController@postEditCategory')->name('system.admin.category.postEditCategory');
    });
    Route::group(['prefix' => 'news'], function () {
        Route::get('list', 'Admin\AdminController@getListNews')->name('system.admin.news.getListNews');
        Route::get('add', 'Admin\AdminController@getAddNews')->name('system.admin.news.getAddNews');
        Route::post('add', 'Admin\AdminController@postAddNews')->name('system.admin.news.postAddNews');
        Route::get('delete/{id}', 'Admin\AdminController@getDeleteNews')->name('system.admin.news.getDeleteNews');
        Route::post('edit', 'Admin\AdminController@postEditNews')->name('system.admin.news.postEditNews');
        Route::get('edit/{locale}/{id}', 'Admin\AdminController@getEditNews')->name('system.admin.news.getEditNews');
    });
    Route::group(['prefix' => 'slide'], function () {
        Route::get('/', 'Admin\BannerController@getSlide')->name('system.admin.slide.getSlide');
        Route::post('up-slide', 'Admin\BannerController@postSlide')->name('system.admin.slide.postSlide');
        Route::get('hidden-slide/{id}', 'Admin\BannerController@getHideSlide')->name('system.admin.slide.getHideSlide');
        Route::get('delete-slide/{id}', 'Admin\BannerController@getDeleteSlide')->name('system.admin.slide.getDeleteSlide');
        Route::post('edit-url', 'Admin\BannerController@getEditUrlSlide')->name('system.admin.slide.getEditUrlSlide');
    });
    Route::group(['prefix' => 'footer'], function () {
        Route::get('edit', 'Admin\AdminController@getEditFooter')->name('system.admin.footer.getEditFooter');
        Route::post('edit', 'Admin\AdminController@postEditFooter')->name('system.admin.footer.postEditFooter');
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('list', 'System\UserController@getListUser')->name('system.user.getListUser');
        Route::post('add', 'System\UserController@postAddUser')->name('system.user.postAddUser');
        Route::post('ajax', 'System\UserController@postAjax')->name('system.user.postAjaxUser');
        Route::get('ajax-edit', 'System\UserController@postAjaxEdit')->name('system.user.postAjaxEditUser');
        Route::get('delete', 'System\UserController@getDeleteUser')->name('system.user.getDeleteUser');
        // Route::get('edit/{locale}/{id}', 'Admin\AdminLoginController@getEditUser')->name('system.admin.user.getEditUser');
        // Route::post('edit', 'Admin\AdminLoginController@postEditUser')->name('system.admin.user.postEditUser');
        Route::post('change-password', 'System\UserController@postChangePassword')->name('system.user.postChangePassword');
    });
    Route::group(['prefix' => 'service'], function () {
        Route::get('list', 'System\ServiceController@getListService')->name('system.service.getListService');
        Route::post('add', 'System\ServiceController@postAddService')->name('system.service.postAddService');
        Route::get('edit', 'System\ServiceController@getEditService')->name('system.service.getEditService');
        Route::post('edit', 'System\ServiceController@postEditService')->name('system.service.postEditService');
        Route::post('ajax', 'System\ServiceController@postAjax')->name('system.service.postAjaxService');
        Route::get('ajax-edit', 'System\ServiceController@postAjaxEdit')->name('system.user.postAjaxEdit');
        Route::get('delete', 'System\ServiceController@getDeleteUser')->name('system.user.getDeleteUser');
        Route::post('change-password', 'System\ServiceController@postChangePassword')->name('system.user.postChangePassword');
    });
    Route::group(['prefix' => 'menu'], function () {
        Route::get('list', 'Admin\MenuController@getListMenu')->name('system.admin.menu.getListMenu');
        Route::get('add', 'Admin\MenuController@getAddMenu')->name('system.admin.menu.getAddMenu');
        Route::post('add', 'Admin\MenuController@postAddMenu')->name('system.admin.menu.postAddMenu');
        Route::get('delete/{id}', 'Admin\MenuController@getDeleteMenu')->name('system.admin.menu.getDeleteMenu');
        Route::get('edit/{locale}/{id}', 'Admin\MenuController@getEditMenu')->name('system.admin.menu.getEditMenu');
        Route::post('edit', 'Admin\MenuController@postEditMenu')->name('system.admin.menu.postEditMenu');
        Route::get('edit/menu-item', 'Admin\MenuController@getEditMenuItem')->name('system.admin.menu.getEditMenuItem');
        Route::post('edit/menu-item', 'Admin\MenuController@postEditMenuItem')->name('system.admin.menu.postEditMenuItem');
    });
    Route::get('meta', 'Admin\ContactController@getMeta')->name('getMeta');
    Route::post('meta', 'Admin\ContactController@postMeta')->name('postMeta');
    Route::get('contact', 'Admin\ContactController@getContact')->name('getContact');
    Route::get('contact-delete/{id}', 'Admin\ContactController@getDeleContact')->name('getDeleContact');
});
