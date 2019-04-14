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

Route::get('/profile/{title}', 'CaseController@show');

Route::get('/cases', 'CaseController@display');

Route::get('/home', 'CaseController@index');

# CREATE comment
Route::get('/messages/create', 'MessageController@create');
Route::post('/messages', 'MessageController@store');

Route::redirect('/', '/home');

Route::group(['middleware' => 'auth'], function() {


    # Display admin dashboard
    Route::get('/admin', 'CaseController@adminDash');

    # CREATE new Case record
    Route::get('/case/new', 'CaseController@newCase');
    Route::post('/create', 'CaseController@create');

    # UPDATE Case record
    Route::get('/case/{id}/edit', 'CaseController@edit');
    Route::put('/case/{id}', 'CaseController@update');

    # DELETE case
    Route::get('/case/{id}/delete', 'CaseController@deleteCase');
    Route::delete('/case/{id}', 'CaseController@destroyCase');

    # CREATE new Source
    Route::get('/source/{id}/new', 'CaseController@newSource');
    Route::post('/source/{id}', 'CaseController@processSource');

    # CREATE new Victim
    Route::get('/victim/{id}/new', 'VictimController@newVictim');
    Route::post('/{id}/create', 'VictimController@storeVictim');

    # UPDATE Victim
    Route::get('/victim/{id}/edit', 'VictimController@editVictim');
    Route::put('/victim/{id}', 'VictimController@updateVictim');

    # DELETE Victim
    Route::get('/victim/{id}/delete', 'VictimController@deleteVictim');
    Route::delete('/victim/{id}', 'VictimController@destroyVictim');

    # CREATE new Image
    Route::get('/image/{id}/new', 'CaseController@newImage');
    Route::post('/image/{id}', 'CaseController@processImage');

    # Display case dashboard
    Route::get('/case-dashboard/{id}', 'CaseController@displayDash')->name('caseDash');

    # Display message inbox
    Route::get('/messages/inbox', 'MessageController@inbox');

    # Display message
    Route::get('/messages/{id}', 'MessageController@displayMessage');
});

Auth::routes();


