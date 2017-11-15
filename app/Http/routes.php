<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Generic routes
Route::post('/api/saveEmail', 'NewsletterController@saveEmail');
Route::post('/api/login', 'LoginController@login');
Route::post('/api/addTeam', 'TeamController@addTeam');

// Logged in routes
Route::any('/api/logout', 'GenericController@logout');

// Admin routes
Route::get('/api/getRegisteredEmails', 'NewsletterController@getRegisteredEmails');
Route::get('/api/getSubscribersForGrid', 'NewsletterController@getSubscribersForGrid');

Route::get('/api/getUsersForGrid', 'UserController@getUsersForGrid');
Route::post('/api/addUser', 'UserController@addUser');
Route::post('/api/changeUserStatus', 'UserController@changeUserStatus');
Route::post('/api/changeAdminStatus', 'UserController@changeAdminStatus');
Route::post('/api/changeUserData', 'UserController@changeUserData');

Route::post('/api/addEditEvent', 'EventController@addEditEvent');
Route::get('/api/getEventsForGrid', 'EventController@getEventsForGrid');
Route::get('/api/getEventData', 'EventController@getEventData');
Route::get('/api/getEvents', 'EventController@getEvents');
Route::post('/api/editEventPicture', 'EventController@editEventPicture');

Route::post('/api/addEditArticle', 'ArticleController@addEditArticle');
Route::get('/api/getArticlesForGrid', 'ArticleController@getArticlesForGrid');
Route::get('/api/getArticleData', 'ArticleController@getArticleData');

Route::get('/api/getFacebookLoginsForGrid', 'FacebookController@getFacebookLoginsForGrid');

Route::get('/api/getTeamsForGrid', 'TeamController@getTeamsForGrid');
Route::get('/api/getTeamMembersForGrid', 'TeamController@getTeamMembersForGrid');
// Route::post('/api/postToFacebook', 'GenericController@postToFacebook');

// UI routes
// Admin
Route::get('/adm1n', 'GenericController@adminRoute');
Route::get('/adm1n/subscribers', 'GenericController@newsletterSubscribers');
Route::get('/adm1n/users', 'GenericController@users');
Route::get('/adm1n/accountSettings', 'GenericController@accountSettings');
Route::get('/adm1n/facebookLogins', 'GenericController@facebookLogins');
Route::get('/adm1n/events', 'GenericController@events');
Route::get('/adm1n/teams', 'GenericController@teams');

Route::get('/facebookLogin', "GenericController@facebookLogin");
Route::any('/oauth/facebook', "GenericController@facebookOauth");
Route::any('/facebookOverlay', "GenericController@facebookOverlay");

// Not logged routes

// ALL ROUTES SHOULD GO BEFORE THIS ONE!
Route::any('{all}', array('uses' => 'GenericController@defaultRoute'))->where('all', '.*');