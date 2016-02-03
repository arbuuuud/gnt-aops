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
Route::get('sendmail', function()
{
    // $a = EmailSchedullerPool::sendmail(2,56,1);
    // return $a;
    // $data['member'] = User::findOrFail(2);
    //     $contact = Contact::findOrFail(56);
    //     $data['contact'] = $contact;
    //     $data['idencrypted'] = $contact->encryptContact();
    //     /*ARBUD : Need correct if template has been finished*/ 
    //     $data['emailtemplate'] = EmailTemplate::find(2);
    //     $template = 'emails.templates.default'; 
    //     Mail::send($template, $data, function($message) use($data) {
    //         $message->to($data['contact']->email, $data['contact']->full_name)->subject($data['emailtemplate']->subject);
    //     });
    //     return 'true';
    // return 'asd';
});

// Route::get('/', array('uses' => 'PagesController@showHome'));
Route::get('/', function(){

    return Redirect::to('https://www.gntclub.com/');
});
Route::get('/ref/{username}', array('uses' => 'PagesController@showHome'));
Route::any('/peluang', array('uses' => 'PagesController@peluang'));
Route::get('/unsubscribe/{id}', array('uses' => 'ContactsController@unsubscribe'));
Route::get('/unsubscribeconfirm/{id}', array('uses' => 'ContactsController@unsubscribeconfirm'));

// Auth routes
Route::get('login', array('uses' => 'UsersController@showLogin'));
Route::post('login', array('uses' => 'UsersController@doLogin'));
Route::get('logout', array('uses' => 'UsersController@doLogout'));
Route::get('runscheduller', array('uses' => 'EmailSchedullerPoolsController@runscheduller'));

// Route::get('/', array('uses' => 'PagesController@showHome'));
Route::get('pages/{page}', array('uses' => 'PagesController@show'));
Route::get('posts/{post}', array('uses' => 'PostsController@show'));
Route::get('kategori/{category}/{filter?}', array('uses' => 'PostCategoriesController@showArchive', 'as' => 'kategori.archive'));

// Members specific routes
Route::get('search', array('uses' => 'PagesController@search'));
Route::get('sitemap', array('uses' => 'PagesController@showSitemap'));
Route::post('registercontact', array('uses' => 'ContactsController@registercontact'));

Route::get('showemail/{id}', array('uses' => 'EmailTemplatesController@show'));

// Member routes
Route::group(array('prefix' => 'member','before' => 'memberauth'), function()
{
    Route::post('send', array('as'=>'member.sendemailmanual','uses' => 'UsersController@sendEmailpost'));
    Route::get('send', array('as'=>'member.send','uses' => 'UsersController@sendEmail'));
    Route::get('outbox', array('as'=>'member.outbox','uses' => 'UsersController@showOutbox'));
    Route::get('showemail/{template}/{contact}', array('as'=>'member.showemail','uses' => 'UsersController@showEmail'));
    Route::get('/', array('uses' => 'MembersController@showDashboard'));
    Route::get('/tree/{id}', array('uses' => 'MembersController@showTree'));
    Route::get('dashboard', array('uses' => 'MembersController@showDashboard', 'as' => 'member.dashboard'));
    Route::resource('contacts', 'ContactsController');
    // Route::get('contacts/{id}', array('uses' => 'ContactsController@show', 'as' => 'member.contacts.show'));
    Route::get('contacts', array('uses' => 'ContactsController@showMemberContacts', 'as' => 'member.contacts.index'));
    Route::get('configuration', array('uses' => 'MemberConfigurationsController@config', 'as' => 'member.configuration'));
    Route::post('configuration', array('uses'=>'MemberConfigurationsController@storeconfig', 'as' => 'member.storeconfig'));
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
    Route::resource('pages', 'PagesController', array('except' => array('create', 'store', 'destroy')));
    Route::resource('posts', 'PostsController');
    Route::resource('categories', 'PostCategoriesController');
    // Route::resource('members', 'MembersController');
    Route::resource('member_posts', 'MemberPostsController');

    Route::get('search', array('uses' => 'PagesController@searchAdmin'));
    Route::resource('sysparams', 'SysparamsController');
    Route::resource('documents', 'DocumentsController');
    Route::resource('menus', 'MenusController');
    Route::resource('menu_items', 'MenuItemsController');

    Route::get('profile', array('uses' => 'UsersController@showProfile', 'as' => 'user.profile'));
    Route::any('updateProfile', array('uses' => 'UsersController@updateProfile', 'as' => 'user.updateProfile'));
    // Route::get('phpinfo', array('uses' => 'PagesController@showPHPInfo'));
    Route::resource('member_configurations', 'MemberConfigurationsController');
});

// Ajax routes
Route::group(array('prefix' => 'ajax'), function()
{
    Route::any('saveimage', array('uses' => 'AjaxController@saveimage'));
    Route::any('gettree/{id}', array('uses' => 'AjaxController@gettree'));
});

Route::any('ViewerJS/{all?}', function(){

    return View::make('ViewerJS.index');
});
Route::any('sample', function(){

    return View::make('emails.templates.sample')->with('member',Member::find(1))->with('contact',Contact::find(1));
});
