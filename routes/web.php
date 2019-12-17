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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
	Route::match(['get', 'post'], '/adminOnlyPage/', 'HomeController@admin');	
});
Route::group(['middleware' => 'App\Http\Middleware\MemberMiddleware'], function()
{
	Route::match(['get', 'post'], '/memberOnlyPage/', 'HomeController@member');
});
Route::group(['middleware' => 'App\Http\Middleware\SuperAdminMiddleware'], function()
{
	Route::match(['get', 'post'], '/superAdminOnlyPage/', 'HomeController@super_admin');	
});
/*Rotue::get('/admin_update','AdminController@admin_update')->name('admin_update');*/
Route::get('/admin','AdminController@index')->name('admin');
Route::get('/terms','AdminController@terms')->name('terms');
Route::post('/add_term','AdminController@add_term')->name('add_term');
Route::post('/term_update','AdminController@term_update')->name('term_update');
Route::get('/get_Term_data','AdminController@get_Term_data')->name('get_Term_data');
Route::get('/term_list','AdminController@term_list')->name('term_list');
Route::get('/exam_term_delete','AdminController@exam_term_delete')->name('exam_term_delete');
Route::get('/exam_type','AdminController@exam_type')->name('exam_type');
Route::post('/exam_type_add','AdminController@exam_type_add')->name('exam_type_add');
Route::post('/type_update','AdminController@type_update')->name('type_update');
Route::get('/get_type_data','AdminController@get_type_data')->name('get_type_data');
Route::get('/exam_type_list','AdminController@exam_type_list')->name('exam_type_list');
Route::get('/exam_type_delete','AdminController@exam_type_delete')->name('exam_type_delete');
Route::get('/exam','AdminController@exam')->name('exam');
Route::post('/add_exam','AdminController@add_exam')->name('add_exam');
Route::get('/exam_list','AdminController@exam_list')->name('exam_list');
Route::get('/exam_delete','AdminController@exam_delete')->name('exam_delete');
Route::get('/get_exam_data','AdminController@get_exam_data')->name('get_exam_data');
Route::post('/exam_update','AdminController@exam_update')->name('exam_update');
Route::get('/project_assessment_type','AdminController@project_assessment_type')->name('project_assessment_type');
Route::post('/add_project_assessment_type','AdminController@add_project_assessment_type')->name('add_project_assessment_type');
Route::get('/project_assessment_type_list','AdminController@project_assessment_type_list')->name('project_assessment_type_list');
Route::get('/get_project_assessment_type','AdminController@get_project_assessment_type')->name('get_project_assessment_type');
Route::post('/project_assessment_type_update','AdminController@project_assessment_type_update')->name('project_assessment_type_update');
Route::get('/project_assessment_type_delete','AdminController@project_assessment_type_delete')->name('project_assessment_type_delete');
Route::get('/project_assessment','AdminController@project_assessment')->name('project_assessment');
Route::post('/add_project_assessment','AdminController@add_project_assessment')->name('add_project_assessment');
Route::get('/project_assessment_list','AdminController@project_assessment_list')->name('project_assessment_list');
Route::get('/get_project_assessment','AdminController@get_project_assessment')->name('get_project_assessment');
Route::post('/project_assessment_update','AdminController@project_assessment_update')->name('project_assessment_update');
Route::get('/project_assessment_delete','AdminController@project_assessment_delete')->name('project_assessment_delete');


