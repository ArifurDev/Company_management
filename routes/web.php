<?php

use App\Http\Controllers\AdminriportsController;
use App\Http\Controllers\adminwebreportController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\EmpolyeeController;
use App\Http\Controllers\EmpolyeereportController;
use App\Models\siteriports;
use Illuminate\Support\Facades\Route;

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
    return view('homepage');
});



Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    // Route::get('/dashboard', function () { return view('dashbord.dashbordtem');});
    Route::controller(DashbordController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/check', 'check')->name('check');
    });

    /**
     * Empolyee
     */

     Route::get('create/empolyee',[EmpolyeeController::class, 'create'])->name('cerate.empolyee')->middleware('RoleChecker');
     Route::post('create/empolyee',[EmpolyeeController::class, 'store'])->name('store.empolyee')->middleware('RoleChecker');
     Route::get('edit/empolyee/{id}',[EmpolyeeController::class, 'edit'])->name('edit.empolyee')->middleware('RoleChecker');
     Route::post('update/empolyee/{id}',[EmpolyeeController::class, 'update'])->name('update.empolyee')->middleware('RoleChecker');
     Route::post('delete/empolyee/{id}',[EmpolyeeController::class, 'destroy'])->name('delete.empolyee')->middleware('RoleChecker');
     Route::get('delete/empolyee/{id}',[EmpolyeeController::class, 'destroy'])->middleware('RoleChecker');
     /**
      * live search
      */
      Route::get('/search',[EmpolyeeController::class, 'search'])->middleware('RoleChecker');
      /**
      *  end live search route
      */

      /**
       * Admin daily reports
       */
        Route::controller(AdminriportsController::class)->middleware('RoleChecker')->group(function () {
            Route::get('create/admin/daily/report', 'create')->name('admindailyraport.create');
            Route::post('create/admin/daily/report', 'store')->name('admindailyraport.store');
            Route::get('show/admin/daily/report', 'index')->name('admindailyraport.show');
            Route::get('edit/admin/daily/report/{id}', 'edit')->name('admindailyraport.edit');
            Route::post('edit/admin/daily/report/{id}', 'update')->name('admindailyraport.update');
            Route::get('destroy/admin/daily/report/{id}', 'destroy')->name('admindailyraport.destroy');
            Route::get('restor/admin/daily/report/{id}', 'restor')->name('admindailyraport.restor');
            Route::get('delete/admin/daily/report/{id}','delete')->name('admindailyraport.delete');
            /**
             * date search
             */
            Route::post('/admin/dailyreport/datasearch','getdate')->name('admindailyraport.datasearch');//get data search date
            /**
             *  end date search route
             */

        });
          /**
       * Empolyee daily reports
       */
      Route::get('create/empolyee/report',[EmpolyeereportController::class, 'create'])->name('cerate.empolyeereport');
      Route::post('create/empolyee/report',[EmpolyeereportController::class, 'store'])->name('store.empolyeereport');
      Route::get('show/empolyee/report',[EmpolyeereportController::class, 'index'])->name('show.empolyeereport');
      Route::get('show/empolyee/report/details/{id}',[EmpolyeereportController::class, 'details'])->name('details.empolyeereport')->middleware('RoleChecker');
      Route::get('empolyee/report/edit/{id}',[EmpolyeereportController::class, 'edit'])->name('edit.empolyeereport')->middleware('RoleChecker');
      Route::post('empolyee/report/edit/{id}',[EmpolyeereportController::class, 'update'])->name('update.empolyeereport')->middleware('RoleChecker');
      Route::post('empolyee/report/destroy/{id}',[EmpolyeereportController::class, 'destroy'])->name('destroy.empolyeereport')->middleware('RoleChecker');
      Route::get('empolyee/report/destroy/{id}',[EmpolyeereportController::class, 'destroy'])->middleware('RoleChecker');
      Route::get('empolyee/report/restor/{id}',[EmpolyeereportController::class, 'restor'])->name('restor.empolyeereport')->middleware('RoleChecker');
      Route::get('empolyee/report/delete/{id}',[EmpolyeereportController::class, 'delete'])->name('delete.empolyeereport')->middleware('RoleChecker');
      /**
      * live search
      */
      Route::get('/empolyeereportsearch',[EmpolyeereportController::class, 'search'])->middleware('RoleChecker');
     /**
     *  end live search route
     */
     /**
      * date search
      */
      Route::post('/datesearch',[EmpolyeereportController::class, 'getdate'])->name('datesearch.empolyeereport')->middleware('RoleChecker');//get data
      /**
      *  end date search route
      */


       /**
       * Admin daily reports end
       */

         Route::controller(adminwebreportController::class)->middleware('RoleChecker')->group(function () {
            Route::get('adminwebreport', 'create')->name('adminwebreport.create');
            Route::post('adminwebreport', 'store')->name('adminwebreport.store');
            Route::get('adminwebreport/show', 'index')->name('adminwebreport.show');
            Route::get('adminwebreport/edit/{id}', 'edit')->name('adminwebreport.edit');
            Route::post('adminwebreport/edit/{id}', 'update')->name('adminwebreport.update');
            Route::get('adminwebreport/destroy/{id}', 'destroy')->name('adminwebreport.destroy');
            Route::get('adminwebreport/restor/{id}', 'restor')->name('restor.adminwebreport');
            Route::get('adminwebreport/delete/{id}','delete')->name('delete.adminwebreport');
       });
});

