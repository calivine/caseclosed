<?php
Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});

Route::view('/about', 'about');

// Route::view('/admin', 'admin');



Route::get('/profile/{title}', 'CaseController@show');

Route::get('/cases', 'CaseController@display');

Route::get('/home', 'CaseController@index');

Route::redirect('/', '/home');



Route::group(['middleware' => 'auth'], function() {

    Route::get('/admin', 'CaseController@adminDash');

    Route::get('/new', 'CaseController@newCase');
    Route::post('/create', 'CaseController@create');

    Route::get('/add-source/{id}', 'CaseController@addSource');
    Route::post('/process-source/{id}', 'CaseController@processSource');

    Route::get('/add-victim/{id}', 'CaseController@addVictim');
    Route::post('/process-victim/{id}', 'CaseController@processVictim');

    Route::get('/add-images/{id}', 'CaseController@addImages');
    Route::post('/images/{id}', 'CaseController@processImages');

    Route::get('/update-victim/{id}', 'CaseController@updateVictim');
    Route::post('/process-update-victim/{id}', 'CaseController@processUpdateVictim');


    Route::get('/case-dashboard/{id}', 'CaseController@displayDash')->name('caseDash');
});

Auth::routes();

