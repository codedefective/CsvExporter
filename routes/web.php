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
    
    use Illuminate\Support\Facades\Route;
    
    Route::get('', 'ExportController@welcome')->name('home');
    Route::get('index', 'ExportController@index')->name('index');
    
    Route::get('students', 'ExportController@viewStudents')->name('students');
    Route::get('students/detail/{id}', 'ExportController@viewStudentDetail')->name('studentDetail');
    Route::get('students/order/{order}', 'ExportController@viewStudents')->name('studentOrder');
    Route::get('export-students', static function(){
        return redirect()->route('students');
    });
    Route::post('export-students', 'ExportController@exportStudentsToCSV')->name('exportStudents');
    
    Route::get('courses', 'ExportController@viewCourses')->name('courses');
    Route::get('courses/detail/{id}', 'ExportController@viewCourseDetail')->name('courseDetail');
    Route::get('courses/order/{order}', 'ExportController@viewCourses')->name('courseOrder');
    Route::get('export-courses', static function(){
        return redirect()->route('courses');
    });
    Route::post('export-courses', 'ExportController@exportCourseAttendanceToCSV')->name('exportCourses');
    
    