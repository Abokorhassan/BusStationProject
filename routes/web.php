<?php
include_once 'web_builder.php';
use App\Events\FormSubmitted;
use Illuminate\Http\Request;
use App\Queue;
use App\Bus;
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

Route::pattern('slug', '[a-z0-9- _]+');

Route::get('onlineDrivers', function(Request $request){
    $queues_drivers = Queue::select('id', 'bus_number', 'driver_number', 'route_name', 'schedule_number', 'station_name')
                    ->where('driver_number',$request->get('driver_number'))
                    ->whereNotNull('full')
                    ->whereNull('finish')
                    ->get(); 

    return response()->json($queues_drivers);
});

Route::get('routes', function(Request $request){
    $routes = App\Route::select('*')
                    ->where('name',$request->get('name'))
                    ->get(); 

    return response()->json($routes);
});

#admin auth
Route::group(['prefix' => 'admin', 'namespace'=>'Admin'], function () {

    # Error pages should be shown without requiring login
    Route::get('404', function () {
        return view('admin/404');
    });
    Route::get('500', function () {
        return view('admin/500');
    });
    # Lock screen
    Route::get('{id}/lockscreen', 'UsersController@lockscreen')->name('lockscreen');
    Route::post('{id}/lockscreen', 'UsersController@postLockscreen')->name('lockscreen');
    # All basic routes defined here
    Route::get('login', 'AuthController@getSignin')->name('login');
    Route::get('signin', 'AuthController@getSignin')->name('signin');
    Route::post('signin', 'AuthController@postSignin')->name('postSignin');
    Route::post('signup', 'AuthController@postSignup')->name('admin.signup');
    Route::post('forgot-password', 'AuthController@postForgotPassword')->name('forgot-password');
    Route::get('login2', function () {
        return view('admin/login2');
    });


    # Register2
    Route::get('register2', function () {
        return view('admin/register2');
    });
    Route::post('register2', 'AuthController@postRegister2')->name('register2');

    # Forgot Password Confirmation
    Route::get('forgot-password/{userId}/{passwordResetCode}', 'AuthController@getForgotPasswordConfirm')->name('forgot-password-confirm');
    Route::post('forgot-password/{userId}/{passwordResetCode}', 'AuthController@getForgotPasswordConfirm');

    # Logout
    Route::get('logout', 'AuthController@getLogout')->name('logout');

    # Account Activation
    Route::get('activate/{userId}/{activationCode}', 'AuthController@getActivate')->name('activate');
});

    # GUI Crud Generator
Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'as' => 'admin.'], function () {
    # GUI Crud Generator
    Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('generator_builder');
    Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');
    Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');
    // Model checking
    Route::post('modelCheck', 'ModelcheckController@modelCheck');

    # Dashboard / Index
    Route::get('/', 'JoshController@showHome')->name('dashboard');

     Route::get('/markAsRead', function(){
        $user_id = Sentinel::getUser()->id;
        $user = App\User::find($user_id);
        $user->unreadnotifications->markAsRead();

    })->name('markAsRead');

    Route::get('getRoute', 'JoshController@getRoute')->name('getRoute');
    Route::get('routeQueue/{routeQueue}', 'JoshController@getrouteQueue')->name('getrouteQueue');
    Route::get('getSeats', 'JoshController@getSeats')->name('getSeats');
    Route::get('mapTest', 'JoshController@getMap')->name('getMap');

    



    # crop demo
    Route::post('crop_demo', 'JoshController@crop_demo')->name('crop_demo');
    //Log viewer routes
    Route::get('log_viewers', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@index')->name('log-viewers');
    Route::get('log_viewers/logs', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@listLogs')->name('log_viewers.logs');
    Route::delete('log_viewers/logs/delete', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@delete')->name('log_viewers.logs.delete');
    Route::get('log_viewers/logs/{date}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@show')->name('log_viewers.logs.show');
    Route::get('log_viewers/logs/{date}/download', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@download')->name('log_viewers.logs.download');
    Route::get('log_viewers/logs/{date}/{level}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@showByLevel')->name('log_viewers.logs.filter');
    Route::get('log_viewers/logs/{date}/{level}/search', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@search')->name('log_viewers.logs.search');
    Route::get('log_viewers/logcheck', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@logCheck')->name('log-viewers.logcheck');
    //end Log viewer
    # Activity log
    Route::get('activity_log/data', 'JoshController@activityLogData')->name('activity_log.data');
    //    Route::get('/', 'JoshController@index')->name('index');
});


   #admin Pages Created
Route::group(['prefix' => 'admin','namespace'=>'Admin', 'middleware' => 'admin', 'as' => 'admin.'], function () {

    // Route::group([ 'prefix' => 'realtimers'], function () {
    //     Route::get('create', 'RealTimerTestController@create')->name('create.realtime');
    //     Route::post('post', 'RealTimerTestController@store')->name('post.realtime');
    // });

    Route::resource('realtimers', 'RealTimerTestController');

   
 

    # User Management
    Route::group([ 'prefix' => 'users'], function () {
        Route::get('data', 'UsersController@data')->name('users.data');
        Route::get('{user}/delete', 'UsersController@destroy')->name('users.delete');
        Route::get('{user}/confirm-delete', 'UsersController@getModalDelete')->name('users.confirm-delete');
        Route::get('{user}/restore', 'UsersController@getRestore')->name('restore.user');
        //  Route::post('{user}/passwordreset', 'UsersController@passwordreset')->name('passwordreset');
        Route::post('passwordreset', 'UsersController@passwordreset')->name('passwordreset');

    });

    Route::resource('users', 'UsersController');

    Route::get('deleted_users',['before' => 'Sentinel', 'uses' => 'UsersController@getDeletedUsers'])->name('deleted_users');

    // Report Generating
    Route::group([ 'prefix' => 'Report-Generating'], function () {
        Route::get('filter', 'ReportController@data')->name('filter.data');;

    });
    Route::resource('Report-Generating', 'ReportController');


    // Test Management
    Route::group([ 'prefix' => 'tests'], function () {
        Route::get('data', 'TestController@data')->name('tests.data');
        Route::get('{tests}/confirm-delete', 'TestController@getModelDelete')->name('tests.confirm-delete');
        
    });
    Route::resource('tests', 'TestController');

    // Stations Management
    Route::group(['prefix' => 'station'], function () {
        Route::get('data', 'StationController@data')->name('station.data');
        Route::get('{station}/delete', 'StationController@destroy')->name('station.delete');
        Route::get('{station}/confirm-delete', 'StationController@getModalDelete')->name('station.confirm-delete');
    });

    Route::resource('station', 'StationController');

    // Route Management
    Route::group(['prefix' => 'route'], function () {
        Route::get('data', 'RouteController@data')->name('route.data');
        Route::get('{route}/delete', 'RouteController@destroy')->name('route.delete');
        Route::get('{route}/confirm-delete', 'RouteController@getModalDelete')->name('route.confirm-delete');
    });

    Route::resource('route', 'RouteController');

    // Buses Management
    Route::group(['prefix' => 'bus'], function () {
        Route::get('data', 'BusController@data')->name('bus.data');
        Route::get('{bus}/delete', 'BusController@destroy')->name('bus.delete');
        Route::get('{bus}/confirm-delete', 'BusController@getModalDelete')->name('bus.confirm-delete');
        Route::get('getDriverStation', 'BusController@getDriverStation')->name('bus.getDriverStation');
        Route::get('getDriverStationE', 'BusController@getDriverStationE')->name('bus.getDriverStationE');

    });

    Route::resource('bus', 'BusController');

    // Drivers Management
    Route::group(['prefix' => 'driver'], function () {
        Route::get('data', 'DriverController@data')->name('driver.data');
        Route::get('{driver}/delete', 'DriverController@destroy')->name('driver.delete');
        Route::get('{driver}/confirm-delete', 'DriverController@getModalDelete')->name('driver.confirm-delete');
    });

    Route::resource('driver', 'DriverController');

    // Rdiers Management
    Route::group(['prefix' => 'rider'], function () {
        Route::get('data', 'RiderController@data')->name('rider.data');
        Route::get('{rider}/delete', 'RiderController@destroy')->name('rider.delete');
        Route::get('{rider}/confirm-delete', 'RiderController@getModalDelete')->name('rider.confirm-delete');
    });

    Route::resource('rider', 'RiderController');

    // Reserve Management
    Route::group(['prefix' => 'reserve'], function () {
        Route::get('data', 'ReserveController@data')->name('reserve.data');
        Route::get('{reserve}/delete', 'ReserveController@destroy')->name('reserve.delete');
        Route::get('{reserve}/confirm-delete', 'ReserveController@getModalDelete')->name('reserve.confirm-delete');      
        Route::get('getBusStation', 'ReserveController@getBusStation')->name('reserve.getBusStation');
        Route::get('getSeatNumber', 'ReserveController@getSeatNumber')->name('reserve.getSeatNumber');
    });

    Route::resource('reserve', 'ReserveController');

    // Busstop Management
    Route::group(['prefix' => 'busstop'], function () {
        Route::get('data', 'BusstopController@data')->name('busstop.data');
        Route::get('{busstop}/delete', 'BusstopController@destroy')->name('busstop.delete');
        Route::get('{busstop}/confirm-delete', 'BusstopController@getModalDelete')->name('busstop.confirm-delete');
    });

    Route::resource('busstop', 'BusstopController');

    // Accident Management
    Route::group(['prefix' => 'accident'], function () {
        Route::get('data', 'AccidentController@data')->name('accident.data');
        Route::get('{accident}/delete', 'AccidentController@destroy')->name('accident.delete');
        Route::get('{accident}/confirm-delete', 'AccidentController@getModalDelete')->name('accident.confirm-delete');
        Route::get('getBusesStation', 'AccidentController@getBusesStation')->name('accident.getBusesStation');
        Route::get('getBusesStationE', 'AccidentController@getBusesStationE')->name('accident.getBusesStationE');
    });

    Route::resource('accident', 'AccidentController');

    // Schedule Management
    Route::group(['prefix' => 'schedule'], function () {
        Route::get('data', 'ScheduleController@data')->name('schedule.data');
        Route::get('{schedule}/delete', 'ScheduleController@destroy')->name('schedule.delete');
        Route::get('{schedule}/confirm-delete', 'ScheduleController@getModalDelete')->name('schedule.confirm-delete');
        
    });

    Route::resource('schedule', 'ScheduleController');

    // Bus Queue Management
    Route::group(['prefix' => 'queue'], function () {
        Route::get('data', 'QueueController@data')->name('queue.data');
        Route::get('{queue}/delete', 'QueueController@destroy')->name('queue.delete');
        Route::get('{queue}/confirm-delete', 'QueueController@getModalDelete')->name('queue.confirm-delete');
    });

    Route::resource('queue', 'QueueController');

    // Seat Management
    Route::group(['prefix' => 'seat'], function () {
        Route::get('data', 'SeatController@data')->name('seat.data');
        Route::get('{seat}/delete', 'SeatController@destroy')->name('seat.delete');
        Route::get('{seat}/confirm-delete', 'SeatController@getModalDelete')->name('seat.confirm-delete');
    });

    Route::resource('seat', 'SeatController');


    // news Managment
    Route::group(['prefix' => 'news'], function () {
        Route::get('data', 'NewsController@data')->name('news.data');
        Route::get('{news}/delete', 'NewsController@destroy')->name('news.delete');
        Route::get('{news}/confirm-delete', 'NewsController@getModalDelete')->name('news.confirm-delete');
    });

    Route::resource('news', 'NewsController');


    # Group Management
    Route::group(['prefix' => 'groups'], function () {
        Route::get('{group}/delete', 'GroupsController@destroy')->name('groups.delete');
        Route::get('{group}/confirm-delete', 'GroupsController@getModalDelete')->name('groups.confirm-delete');
        Route::get('{group}/restore', 'GroupsController@getRestore')->name('groups.restore');
    });
    Route::resource('groups', 'GroupsController');

    /*routes for blog*/
    Route::group(['prefix' => 'blog'], function () {
        Route::get('{blog}/delete', 'BlogController@destroy')->name('blog.delete');
        Route::get('{blog}/confirm-delete', 'BlogController@getModalDelete')->name('blog.confirm-delete');
        Route::get('{blog}/restore', 'BlogController@restore')->name('blog.restore');
        Route::post('{blog}/storecomment', 'BlogController@storeComment')->name('storeComment');
    });
    Route::resource('blog', 'BlogController');

    /*routes for blog category*/
    Route::group(['prefix' => 'blogcategory'], function () {
        Route::get('{blogCategory}/delete', 'BlogCategoryController@destroy')->name('blogcategory.delete');
        Route::get('{blogCategory}/confirm-delete', 'BlogCategoryController@getModalDelete')->name('blogcategory.confirm-delete');
        Route::get('{blogCategory}/restore', 'BlogCategoryController@getRestore')->name('blogcategory.restore');
    });

    Route::resource('blogcategory', 'BlogCategoryController');
    /*routes for file*/
    Route::group(['prefix' => 'file'], function () {
        Route::post('create', 'FileController@store')->name('store');
        Route::post('createmulti', 'FileController@postFilesCreate')->name('postFilesCreate');
        Route::delete('delete', 'FileController@delete')->name('delete');
    });

    /*routes for News*/

    Route::group(['prefix' => 'news'], function () {
        Route::get('data', 'NewsController@data')->name('news.data');
        Route::get('{news}/delete', 'NewsController@destroy')->name('news.delete');
        Route::get('{news}/confirm-delete', 'NewsController@getModalDelete')->name('news.confirm-delete');
    });
    Route::resource('news', 'NewsController');

    Route::get('crop_demo', function () {
        return redirect('admin/imagecropping');
    });


    /* laravel example routes */
    #Charts
    Route::get('laravel_chart', 'ChartsController@index')->name('laravel_chart');
    Route::get('database_chart', 'ChartsController@databaseCharts')->name('database_chart');

    # datatables
    Route::get('datatables', 'DataTablesController@index')->name('index');
    Route::get('datatables/data', 'DataTablesController@data')->name('datatables.data');

    # SelectFilter
    Route::get('selectfilter', 'SelectFilterController@index')->name('selectfilter');
    Route::get('selectfilter/find', 'SelectFilterController@filter')->name('selectfilter.find');
    Route::post('selectfilter/store', 'SelectFilterController@store')->name('selectfilter.store');

    # editable datatables
    Route::get('editable_datatables', 'EditableDataTablesController@index')->name('index');
    Route::get('editable_datatables/data', 'EditableDataTablesController@data')->name('editable_datatables.data');
    Route::post('editable_datatables/create', 'EditableDataTablesController@store')->name('store');
    Route::post('editable_datatables/{id}/update', 'EditableDataTablesController@update')->name('update');
    Route::get('editable_datatables/{id}/delete', 'EditableDataTablesController@destroy')->name('editable_datatables.delete');

    //    # custom datatables
    Route::get('custom_datatables', 'CustomDataTablesController@index')->name('index');
    Route::get('custom_datatables/sliderData', 'CustomDataTablesController@sliderData')->name('custom_datatables.sliderData');
    Route::get('custom_datatables/radioData', 'CustomDataTablesController@radioData')->name('custom_datatables.radioData');
    Route::get('custom_datatables/selectData', 'CustomDataTablesController@selectData')->name('custom_datatables.selectData');
    Route::get('custom_datatables/buttonData', 'CustomDataTablesController@buttonData')->name('custom_datatables.buttonData');
    Route::get('custom_datatables/totalData', 'CustomDataTablesController@totalData')->name('custom_datatables.totalData');

    //tasks section
    Route::post('task/create', 'TaskController@store')->name('store');
    Route::get('task/data', 'TaskController@data')->name('data');
    Route::post('task/{task}/edit', 'TaskController@update')->name('update');
    Route::post('task/{task}/delete', 'TaskController@delete')->name('delete');

    
    // Route::resource('photos', 'PhotoController');

});


# Remaining pages will be called from below controller method
# in real world scenario, you may be required to define all routes manually

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('{name?}', 'JoshController@showView');
});

#FrontEndController
Route::get('login', 'FrontEndController@getLogin')->name('login');
Route::post('login', 'FrontEndController@postLogin')->name('login');
Route::get('register', 'FrontEndController@getRegister')->name('register');
Route::post('register','FrontEndController@postRegister')->name('register');
Route::get('activate/{userId}/{activationCode}','FrontEndController@getActivate')->name('activate');
Route::get('forgot-password','FrontEndController@getForgotPassword')->name('forgot-password');
Route::post('forgot-password', 'FrontEndController@postForgotPassword');

# Forgot Password Confirmation
Route::post('forgot-password/{userId}/{passwordResetCode}', 'FrontEndController@postForgotPasswordConfirm');
Route::get('forgot-password/{userId}/{passwordResetCode}', 'FrontEndController@getForgotPasswordConfirm')->name('forgot-password-confirm');

Route::group(['namespace'=>'User', 'middleware' => 'user', 'as' => 'user.'], function () {
    Route::resource('test', 'TestController');
    Route::resource('Ubus', 'UBusController');

    // User  Buses Management
    //  Route::resource('bus', 'BusController');

    // Bus
    Route::group(['prefix' => 'bus'], function () {
        Route::get('data', 'BusController@data')->name('bus.data');
        Route::get('{bus}/delete', 'BusController@destroy')->name('bus.delete');
        Route::get('liveSearch', 'BusController@liveSearch')->name('bus.liveSearch');
    });
    Route::resource('bus', 'BusController');

    //Driver
    Route::group(['prefix' => 'driver'], function () {
        Route::get('data', 'DriverController@data')->name('driver.data');
        Route::get('{driver}/delete', 'DriverController@destroy')->name('driver.delete');
        Route::get('liveSearch', 'DriverController@liveSearch')->name('driver.liveSearch');
    });
    Route::resource('driver', 'DriverController');

    //Rider
    Route::group(['prefix' => 'rider'], function () {
        Route::get('data', 'RiderController@data')->name('rider.data');
        Route::get('{rider}/delete', 'RiderController@destroy')->name('rider.delete');
        Route::get('liveSearch', 'RiderController@liveSearch')->name('rider.liveSearch');
    });
    Route::resource('rider', 'RiderController');

    //Busstop
    Route::group(['prefix' => 'busstop'], function () {
        Route::get('data', 'BusstopController@data')->name('busstop.data');
        Route::get('{busstop}/delete', 'BusstopController@destroy')->name('busstop.delete');
    });
    Route::resource('busstop', 'BusstopController');

    //Accident
    Route::group(['prefix' => 'accident'], function () {
        Route::get('data', 'AccidentController@data')->name('accident.data');
        Route::get('{accident}/delete', 'AccidentController@destroy')->name('accident.delete');
        Route::get('getId', 'AccidentController@getId')->name('accident.getId');
        Route::get('liveSearch', 'AccidentController@liveSearch')->name('accident.liveSearch');
    });
    Route::resource('accident', 'AccidentController');

    //Seat
    Route::group(['prefix' => 'seat'], function () {
        Route::get('showBusSeats/{seat}', 'SeatController@showBusSeats')->name('seat.showBusSeats');
        Route::get('createBusSeats/{seat}', 'SeatController@createBusSeats')->name('seat.createBusSeats');
        Route::get('data', 'SeatController@data')->name('seat.data');
        Route::get('{seat}/delete', 'SeatController@destroy')->name('seat.delete');
    });
    Route::resource('seat', 'SeatController');

    //Schedule
    Route::group(['prefix' => 'schedule'], function () {
        Route::get('data', 'ScheduleController@data')->name('schedule.data');
        Route::get('{schedule}/delete', 'ScheduleController@destroy')->name('schedule.delete');
        Route::get('getId', 'ScheduleController@getId')->name('schedule.getId');
        Route::get('liveSearch', 'ScheduleController@liveSearch')->name('schedule.liveSearch');
    });
    Route::resource('schedule', 'ScheduleController');

    //Queue
    Route::group(['prefix' => 'queue'], function () {
        Route::get('data', 'QueueController@data')->name('queue.data');
        Route::get('{queue}/delete', 'QueueController@destroy')->name('queue.delete');
        Route::get('getBusQueue', 'QueueController@getBusQueue')->name('queue.getBusQueue');
        Route::get('getRouteSchedule', 'QueueController@getRouteSchedule')->name('queue.getRouteSchedule');
        Route::get('getId', 'QueueController@getId')->name('queue.getId');
        Route::get('liveSearch', 'QueueController@liveSearch')->name('queue.liveSearch');
    });
    Route::resource('queue', 'QueueController');

    //Reserve
    Route::group(['prefix' => 'reserve'], function () {
        Route::get('data', 'ReserveController@data')->name('reserve.data');
        Route::get('{reserve}/delete', 'ReserveController@destroy')->name('reserve.delete');
        Route::get('getBusSeat', 'ReserveController@getBusSeat')->name('reserve.getBusSeat');
        Route::get('getRouteSchedule', 'ReserveController@getRouteSchedule')->name('reserve.getRouteSchedule');
        Route::get('liveSearch', 'ReserveController@liveSearch')->name('reserve.liveSearch');
    });
    Route::resource('reserve', 'ReserveController');

});

# My account display and update details
Route::group(['middleware' => 'user'], function () {
    Route::put('my-account', 'FrontEndController@update');
    Route::get('my-account', 'FrontEndController@myAccount')->name('my-account');
    
    Route::get('test', function () {
        return view('test');       
    });

    #home
    
    // Route::get('/', '');
    Route::get('/', 'HomeController@showHome')->name('home');
    Route::get('getId', 'HomeController@getId')->name('getId');
    Route::get('getSchedule', 'HomeController@getSchedule')->name('getSchedule');
    Route::get('busSeat/{busSeat}', 'HomeController@getBusSeat')->name('getBusSeat');

    Route::get('fromStationQueues', 'HomeController@fromStationQueues')->name('fromStationQueues');
    Route::get('toStationQueues', 'HomeController@toStationQueues')->name('toStationQueues');
    Route::get('fromStationOnGoingBus', 'HomeController@fromStationOnGoingBus')->name('fromStationOnGoingBus');
    Route::get('toStationOnGoingBus', 'HomeController@toStationOnGoingBus')->name('toStationOnGoingBus');

    Route::get('finish/{finish}', 'HomeController@finishturn')->name('finishturn');

    
    Route::resource('home', 'HomeController');

    // Route::get('/', ['as' => 'home', function () {
    //     return view('index');
    // }]);
    
    Route::post('contact', 'FrontEndController@postContact')->name('contact');
    
    Route::get('logout', 'FrontEndController@getLogout')->name('logout'); #logout should not be below name route
    
    Route::get('blog','BlogController@index')->name('blog');
    Route::get('blog/{slug}/tag', 'BlogController@getBlogTag');
    Route::get('blogitem/{slug?}', 'BlogController@getBlog');
    Route::post('blogitem/{blog}/comment', 'BlogController@storeComment');
    
    
    //news
    Route::get('news', 'NewsController@index')->name('news');
    
    Route::get('news/{news}', 'NewsController@show')->name('news.show');
    

    Route::get('{name?}', 'FrontEndController@showFrontEndView');

});








