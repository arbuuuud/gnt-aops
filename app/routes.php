<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('loginapi/{token}', array('uses' => 'UsersController@loginByToken', 'as' => 'user.loginbytoken'));
// Route::get('loginapi', array('uses' => 'UsersController@loginapi', 'as' => 'user.loginapi'));
Route::get('logoutapi', array('uses' => 'UsersController@logoutapi', 'as' => 'user.logoutapi'));

// Member routes
Route::group(array('prefix' => 'memberapi','before' => 'memberauthapi'), function(){
    Route::get('testapinext', function()
    {
        return 'works';
    });

});
Route::get('sendmail', function()
{
    $email = new EmailSchedullerPool;
    $email->sendmail();
});
Route::get('/', array('uses' => 'PagesController@showHome'));
Route::get('/peluang', array('uses' => 'PagesController@peluang'));
Route::get('/unsubscribe/{id}', array('uses' => 'ContactsController@unsubscribe'));
Route::get('/unsubscribeconfirm/{id}', array('uses' => 'ContactsController@unsubscribeconfirm'));

// Auth routes
Route::get('login', array('uses' => 'UsersController@showLogin'));
Route::post('login', array('uses' => 'UsersController@doLogin'));
Route::get('logout', array('uses' => 'UsersController@doLogout'));
Route::get('runscheduller', array('uses' => 'EmailSchedullerPoolsController@runscheduller'));

// Media routes
Route::get('foto', array('uses' => 'GalleryCategoriesController@showPublicIndex'));
Route::get('kategori-galeri/{category}', array('uses' => 'GalleryCategoriesController@showArchive'));
Route::get('galeri/{slug}', array('uses' => 'GalleriesController@show'));
Route::get('video', array('uses' => 'VideocategoriesController@showPublicIndex'));
Route::get('kategori-video/{category}', array('uses' => 'VideocategoriesController@showArchive'));
Route::get('video/{slug}', array('uses' => 'VideosController@show'));

// Route::get('/', array('uses' => 'PagesController@showHome'));
Route::get('pages/{page}', array('uses' => 'PagesController@show'));
Route::get('posts/{post}', array('uses' => 'PostsController@show'));
Route::get('kategori/{category}/{filter?}', array('uses' => 'PostCategoriesController@showArchive', 'as' => 'kategori.archive'));

// Members specific routes
Route::get('search', array('uses' => 'PagesController@search'));
Route::get('sitemap', array('uses' => 'PagesController@showSitemap'));

// Member routes
Route::group(array('prefix' => 'member','before' => 'memberauth'), function()
{
    Route::get('dashboard', array('uses' => 'MembersController@showDashboard', 'as' => 'member.dashboard'));
    Route::resource('contacts', 'ContactsController');
    Route::get('configuration', array('uses' => 'MemberConfigurationsController@config', 'as' => 'member.configuration'));
    Route::post('configuration', array('uses'=>'MemberConfigurationsController@storeconfig', 'as' => 'member.storeconfig'));
});
// Admin routes
Route::group(array('prefix' => 'admin','before' => 'auth'), function()
{
    Route::get('/', array('uses' => 'AdminController@showDashboard', 'as' => 'admin.dashboard'));
    Route::get('dashboard', array('uses' => 'AdminController@showDashboard', 'as' => 'admin.dashboard'));
    
    // Resources
    Route::resource('contacts', 'ContactsController');
    Route::resource('users', 'UsersController');
    Route::resource('roles', 'RolesController');
    Route::resource('pages', 'PagesController');
    Route::resource('posts', 'PostsController');
    Route::resource('categories', 'PostCategoriesController');
    Route::resource('members', 'MembersController');
    Route::resource('member_posts', 'MemberPostsController');

    Route::resource('gallerycategories', 'GalleryCategoriesController');
    Route::resource('galleries', 'GalleriesController');
    Route::resource('photos', 'PhotosController');
    Route::any('galleries/uploadfoto/{gallery}', array('uses' => 'GalleriesController@uploadfoto', 'as' => 'admin.galleries.uploadfoto'));
    Route::any('photos/upload/{gallery}', array('uses' => 'PhotosController@upload', 'as' => 'admin.photos.upload'));
    Route::any('photos/bulkprocess/{gallery}', array('uses' => 'PhotosController@bulkprocess', 'as' => 'admin.photos.bulkprocess'));
    Route::resource('videocategories', 'VideocategoriesController');
    Route::resource('videos', 'VideosController');
    Route::get('search', array('uses' => 'PagesController@searchAdmin'));
    Route::resource('sysparams', 'SysparamsController');
    Route::resource('documents', 'DocumentsController');
    Route::resource('menus', 'MenusController');
    Route::resource('menu_items', 'MenuItemsController');

    Route::get('profile', array('uses' => 'UsersController@showProfile', 'as' => 'user.profile'));
    Route::any('updateProfile', array('uses' => 'UsersController@updateProfile', 'as' => 'user.updateProfile'));
    Route::get('phpinfo', array('uses' => 'PagesController@showPHPInfo'));
    Route::resource('member_configurations', 'MemberConfigurationsController');
});

// Ajax routes
Route::group(array('prefix' => 'ajax'), function()
{
    Route::any('saveimage', array('uses' => 'AjaxController@saveimage'));
});

Route::any('ViewerJS/{all?}', function(){

    return View::make('ViewerJS.index');
});
