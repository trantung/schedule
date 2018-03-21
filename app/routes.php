<?php
Route::get('/', 'AdminController@dashboard');
Route::group(['prefix' => 'admin'], function () {
	Route::get('/', 'AdminController@index');
    Route::get('/login', array('uses' => 'AdminController@login', 'as' => 'admin.login'));
    Route::post('/login', array('uses' => 'AdminController@doLogin'));
    Route::get('/logout', 'AdminController@logout');
    Route::get('administrator/{id}/reset', 'AdminController@getResetPass');
    Route::post('/administrator/{id}/reset', 'AdminController@postResetPass');

    Route::get('teacher/{id}/reset', 'ManagerTeacherController@getResetPass');
    Route::post('/teacher/{id}/reset', 'ManagerTeacherController@postResetPass');
    Route::post('/teacher/{id}/comment', 'TeacherController@commentTeacher');
    Route::resource('/teacher', 'ManagerTeacherController');

    Route::get('/gmo', 'AdminController@gmoIndex');

    Route::get('/student_publish', 'ManagerStudentController@publish');
    Route::get('student_publish/{id}', 'ManagerStudentController@getPublishShow');
    Route::post('student_publish/{id}', 'ManagerStudentController@postPublishShow');
    Route::resource('/student', 'ManagerStudentController');
    Route::resource('/student_schedule', 'ScheduleController');
    
    Route::resource('/administrator', 'AdminController');

    Route::resource('/role', 'RoleController');
    Route::get('/permission/{role}', 'PermissionController@editRole');
    Route::put('/permission/{role}', 'PermissionController@updateRole');
	Route::resource('/permission', 'PermissionController');

    Route::controller('/export', 'ExportController');
});
Route::group(['prefix' => 'publish'], function () {
    Route::get('/teacher/student', 'PublishController@privateStudent');
    Route::get('/teacher/schedule_student/{id}/show/{teacher_id}', 'PublishController@showScheduleStudent');
    Route::get('/teacher/schedule_detail/{id}/show/{teacher_id}', 'PublishController@showScheduleDetail');
    Route::post('/teacher/schedule_detail/{id}/show/{teacher_id}', 'PublishController@updateScheduleDetail');
    Route::get('/confirm_student/{token}/{id}', 'PublishController@confirmEmail');
    Route::get('/teacher/schedule_time/', 'TeacherController@showScheduleTime');
    Route::resource('/teacher', 'PublishController');
});

App::error( function(Exception $exception, $code){
	$pathInfo = Request::getPathInfo();
    $message = $exception->getMessage() ?: 'Exception';
    Log::error("$code - $message @ $pathInfo\r\n$exception");
    switch ($code)
    {
        case 403:
            return View::make('403', array('code' => 403, 'message' => 'Quyền truy cập bị từ chối!'));

        case 404:
            return 'Trang không tìm thấy!';

        default:
		    if (Config::get('app.debug')) {
		        return;
		    }
    }
});

// Route::controller('/ajax', 'AjaxController');


// App::error( function(Exception $exception, $code){
//     $pathInfo = Request::getPathInfo();
//     $message = $exception->getMessage() ?: 'Exception';
//     Log::error("$code - $message @ $pathInfo\r\n$exception");
//     switch ($code)
//     {
//         case 403:
//             return View::make('errors.404', array('code' => 403, 'message' => 'Quyền truy cập bị từ chối!'));

//         case 404:
//             return View::make('errors.404', array('code' => 404, 'message' => 'Trang không tìm thấy!'));

//         default:
//             if (Config::get('app.debug')) {
//                 return;
//             }
//     }
// });