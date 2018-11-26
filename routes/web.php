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


Route::get('/add', 'CaseController@addVictim');

Route::get('/add-incident', 'CaseController@addIncident');

Route::get('/add-perp', 'CaseController@addPerp');

Route::get('/update', 'CaseController@updateVictim');

Route::get('/profile/{title}', 'CaseController@show');

Route::get('/cases', 'CaseController@display');

Route::get('/', 'CaseController@index');

