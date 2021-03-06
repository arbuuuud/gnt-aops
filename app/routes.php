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

Route::any('/api', array('uses' => 'ApiController@execute'));
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

Route::get('/', function(){
    return Redirect::to('https://www.gntclub.com/');
});
Route::get('/@{username}', array('uses' => 'PagesController@showHome'));
Route::any('/peluang', array('uses' => 'PagesController@peluang'));
Route::get('/unsubscribe/{id}', array('uses' => 'ContactsController@unsubscribe'));
Route::get('/unsubscribeconfirm/{id}', array('uses' => 'ContactsController@unsubscribeconfirm'));

// Auth routes
Route::get('login', array('uses' => 'UsersController@showLogin'));
Route::post('login', array('uses' => 'UsersController@doLogin'));
Route::get('logout', array('uses' => 'UsersController@doLogout'));
Route::get('runscheduller', array('uses' => 'EmailSchedullerPoolsController@runscheduller'));

Route::get('pages/{page}', array('uses' => 'PagesController@show'));
Route::get('posts/{post}', array('uses' => 'PostsController@show'));
Route::get('kategori/{category}/{filter?}', array('uses' => 'PostCategoriesController@showArchive', 'as' => 'kategori.archive'));

// Members specific routes
Route::get('search', array('uses' => 'PagesController@search'));
Route::post('registercontact', array('uses' => 'ContactsController@registercontact'));
Route::get('showemail/{id}', array('uses' => 'EmailTemplatesController@show'));

// Member routes
Route::group(array('prefix' => 'member','before' => 'memberauth'), function()
{
    Route::post('send', array('as'=>'member.sendemailmanual','uses' => 'UsersController@sendEmailpost'));
    Route::get('send', array('as'=>'member.send','uses' => 'UsersController@sendEmail'));
    Route::get('outbox', array('as'=>'member.outbox','uses' => 'UsersController@showOutbox'));
    Route::get('showemail/{template}/{contact}', array('as'=>'member.showemail','uses' => 'UsersController@showEmail'));
    Route::get('/', array('uses' => 'UsersController@showDashboard'));
    Route::get('dashboard', array('uses' => 'UsersController@showDashboard', 'as' => 'member.dashboard'));
    Route::post('dashboard', array('uses'=>'UsersController@updateWelcomeMessage', 'as' => 'member.updateWelcomeMessage'));
    Route::resource('contacts', 'ContactsController');
    Route::get('contacts', array('uses' => 'ContactsController@showMemberContacts', 'as' => 'member.contacts.index'));
});
// Admin routes
Route::group(array('prefix' => 'admin','before' => 'auth'), function()
{
    Route::resource('templates', 'EmailTemplatesController');
    Route::get('showtemplate/{html}', array('uses' => 'EmailTemplatesController@showtemplate'));
    Route::get('/', array('uses' => 'AdminController@showDashboard', 'as' => 'admin.dashboard'));
    Route::get('dashboard', array('uses' => 'AdminController@showDashboard', 'as' => 'admin.dashboard'));

    // Resources
    Route::resource('contacts', 'ContactsController');
    Route::resource('users', 'UsersController', array('except' => array('create', 'store', 'destroy')));
    Route::resource('roles', 'RolesController');
    Route::resource('pages', 'PagesController');
    Route::resource('posts', 'PostsController');
    Route::resource('categories', 'PostCategoriesController');
    Route::resource('member_posts', 'MemberPostsController');
    Route::resource('emails', 'EmailHistoriesController', array('only' => array('index')));

    Route::get('search', array('uses' => 'PagesController@searchAdmin'));
    Route::resource('sysparams', 'SysparamsController');
    Route::resource('documents', 'DocumentsController');
    Route::resource('menus', 'MenusController');
    Route::resource('menu_items', 'MenuItemsController');

    Route::get('profile', array('uses' => 'UsersController@showProfile', 'as' => 'user.profile'));
    Route::any('updateProfile', array('uses' => 'UsersController@updateProfile', 'as' => 'user.updateProfile'));
});

// Ajax routes
Route::group(array('prefix' => 'ajax'), function()
{
    Route::any('saveimage', array('uses' => 'AjaxController@saveimage'));
});

Route::any('ViewerJS/{all?}', function(){

    return View::make('ViewerJS.index');
});