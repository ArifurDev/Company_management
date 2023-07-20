<?php

use App\Http\Controllers\AdminifoController;
use App\Http\Controllers\AdminriportsController;
use App\Http\Controllers\adminwebreportController;
use App\Http\Controllers\AssistantController;
use App\Http\Controllers\BilldateController;
use App\Http\Controllers\ComopanyController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\EmpolyeeController;
use App\Http\Controllers\EmpolyeeinfoController;
use App\Http\Controllers\EmpolyeereportController;
use App\Http\Controllers\EmpolyeesalaryController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoandetaileController;
use App\Http\Controllers\LoanrecivesiduleController;
use App\Http\Controllers\LoansendshiduleController;
use App\Http\Controllers\MainloanController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\PersonalInfoController;
use App\Http\Controllers\ReciveloanController;

use App\Models\Loanrecivesidule;

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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    // Route::get('/dashboard', function () { return view('dashbord.dashbordtem');});
    Route::controller(DashbordController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/check', 'check')->name('check');
        Route::get('daily/comopany/report/', 'daily')->name('daily.comopany.reports');
        Route::post('daily/comopany/report/search/', 'filter')->name('daily.comopany.reports.search');
    });

    /**
     * companycontroller
     */
    Route::controller(ComopanyController::class)->group(function () {
        Route::get('create/company', 'create')->name('company.create');
        Route::post('create/company', 'store')->name('company.store');
        Route::get('destroy/company/{id}', 'destroy')->name('company.destroy')->middleware('AssistantChecker');
    })->middleware('RoleChecker');

    /**
     * companycontroller  END
     */

    /**
     * Empolyee
     */
    Route::get('create/empolyee', [EmpolyeeController::class, 'create'])->name('cerate.empolyee')->middleware('RoleChecker');
    Route::post('create/empolyee', [EmpolyeeController::class, 'store'])->name('store.empolyee')->middleware('RoleChecker');
    Route::get('edit/empolyee/{id}', [EmpolyeeController::class, 'edit'])->name('edit.empolyee')->middleware('RoleChecker');
    Route::post('update/empolyee/{id}', [EmpolyeeController::class, 'update'])->name('update.empolyee')->middleware('RoleChecker');
    Route::post('delete/empolyee/{id}', [EmpolyeeController::class, 'destroy'])->name('delete.empolyee')->middleware('RoleChecker');
    Route::get('delete/empolyee/{id}', [EmpolyeeController::class, 'destroy'])->middleware('RoleChecker');

    // selected company show information
    Route::get('compoany/empolyeereport/{id}', [EmpolyeeController::class, 'info'])->name('compoany.info')->middleware('RoleChecker')->middleware('AssistantChecker');

    /**
     * live search
     */
    Route::get('/search', [EmpolyeeController::class, 'search'])->middleware('RoleChecker');
    /**
     *  end live search route
     */

     /*payroll management system with empolyee start */
     Route::controller(EmpolyeeController::class)->group(function () {
        Route::get('empolyee/salary', 'salary_managment')->name('salary.managment');
        Route::get('empolyee/monthly/salary/{email}', 'monthly_payment')->name('monthly.payment');
        Route::post('salary/save','salary_save')->name('salary.save');
        Route::get('empolyee/salary/index', 'salary_index')->name('salary.managment.index');
        Route::post('salary/pdf/download','salary_pdf_download')->name('salary.pdf.download');
        Route::post('salary/selected/month/view','selected_month_view')->name('selected.month.view');

     });
     /*payroll management system with empolyee end */

    /**
     * Admin daily reports
     */
    Route::controller(AdminriportsController::class)->middleware('RoleChecker')->group(function () {
        Route::get('create/admin/daily/report', 'create')->name('admindailyraport.create');
        Route::post('create/admin/daily/report', 'store')->name('admindailyraport.store');
        Route::get('show/admin/daily/report', 'index')->name('admindailyraport.show')->middleware('AssistantChecker');
        Route::get('edit/admin/daily/report/{id}', 'edit')->name('admindailyraport.edit')->middleware('AssistantChecker');
        Route::post('edit/admin/daily/report/{id}', 'update')->name('admindailyraport.update')->middleware('AssistantChecker');
        Route::get('destroy/admin/daily/report/{id}', 'destroy')->name('admindailyraport.destroy')->middleware('AssistantChecker');
        Route::get('restor/admin/daily/report/{id}', 'restor')->name('admindailyraport.restor')->middleware('AssistantChecker');
        Route::get('delete/admin/daily/report/{id}', 'delete')->name('admindailyraport.delete')->middleware('AssistantChecker');

        //download this month report excel file
        Route::get('admin/report/export', 'export')->name('export.adminreport')->middleware('RoleChecker')->middleware('AssistantChecker');

        //download all report excel file
        Route::get('admin/report/all/export', 'all_export')->name('all.export.adminreport')->middleware('RoleChecker')->middleware('AssistantChecker');

        /**
         * date search
         */
        Route::post('/admin/dailyreport/datasearch', 'getdate')->name('admindailyraport.datasearch')->middleware('AssistantChecker'); //get data search date
        /**
         *  end date search route
         */
    });

    Route::resource('admininfo', AdminifoController::class)->middleware('RoleChecker');
    Route::controller(AdminifoController::class)->middleware('RoleChecker')->group(function () {
        Route::get('admin/information/restore/{id}','restore')->name('admin.info.restore')->middleware('AssistantChecker');
        Route::get('admin/information/destroy/{id}','destroy')->name('admin.info.distroy')->middleware('AssistantChecker');
        Route::get('admin/information/edit/{id}','edit')->name('admin.info.edit')->middleware('AssistantChecker');
        Route::post('admin/information/update/{id}','update')->name('admin.info.update')->middleware('AssistantChecker');
        Route::get('admin/information/delete/{id}','delete')->name('admin.info.delete')->middleware('AssistantChecker');
    });

    /**
     * admin personal information
     */


    //  Route::resource('personalinfo',PersonalInfoController::class);
     Route::controller(PersonalInfoController::class)->middleware('RoleChecker')->group(function () {
        Route::get('admin/personalinfo/show','index')->name('personalinfo.index');
        Route::get('admin/personalinfo','create')->name('personalinfo.create');
        Route::post('admin/personalinfo','store')->name('personalinfo.store');
        Route::get('admin/personalinfo/edit/{id}','edit')->name('personalinfo.edit');
        Route::post('admin/personalinfo/edit/{id}','update')->name('personalinfo.update');
        Route::get('admin/personalinfo/destroy/{id}','destroy')->name('personalinfo.destroy');
     });

      /**
     * admin personal information END
     */

    /**
     * Empolyee daily reports
     */
    Route::get('create/empolyee/report', [EmpolyeereportController::class, 'create'])->name('cerate.empolyeereport');
    Route::post('create/empolyee/report', [EmpolyeereportController::class, 'store'])->name('store.empolyeereport');
    Route::get('show/empolyee/report', [EmpolyeereportController::class, 'index'])->name('show.empolyeereport')->middleware('AssistantChecker');
    Route::get('show/empolyee/report/details/{id}', [EmpolyeereportController::class, 'details'])->name('details.empolyeereport')->middleware('RoleChecker')->middleware('AssistantChecker');
    Route::get('empolyee/report/edit/{id}', [EmpolyeereportController::class, 'edit'])->name('edit.empolyeereport')->middleware('RoleChecker')->middleware('AssistantChecker');
    Route::post('empolyee/report/edit/{id}', [EmpolyeereportController::class, 'update'])->name('update.empolyeereport')->middleware('RoleChecker')->middleware('AssistantChecker');
    Route::post('empolyee/report/destroy/{id}', [EmpolyeereportController::class, 'destroy'])->name('destroy.empolyeereport')->middleware('RoleChecker')->middleware('AssistantChecker');
    Route::get('empolyee/report/destroy/{id}', [EmpolyeereportController::class, 'destroy'])->middleware('RoleChecker')->middleware('AssistantChecker');
    Route::get('empolyee/report/restor/{id}', [EmpolyeereportController::class, 'restor'])->name('restor.empolyeereport')->middleware('RoleChecker')->middleware('AssistantChecker');
    Route::get('empolyee/report/delete/{id}', [EmpolyeereportController::class, 'delete'])->name('delete.empolyeereport')->middleware('RoleChecker')->middleware('AssistantChecker');

    //download this month report excel file
    Route::get('empolyee/report/export', [EmpolyeereportController::class, 'export'])->name('export.empolyeereport')->middleware('RoleChecker')->middleware('AssistantChecker');

    //download all report excel file
    Route::get('empolyee/report/all/export', [EmpolyeereportController::class, 'all_export'])->name('all.export.empolyeereport')->middleware('RoleChecker')->middleware('AssistantChecker');


    /**
     * date search
     */
    Route::post('/datesearch', [EmpolyeereportController::class, 'getdate'])->name('datesearch.empolyeereport')->middleware('RoleChecker')->middleware('AssistantChecker'); //get data
    /**
     *  end date search route
     */


     /**
     * Empolyee information
     */
     Route::resource('empolyeeinfo', EmpolyeeinfoController::class)->middleware('RoleChecker');
     Route::get('empolyee/info/restore/{id}', [EmpolyeeinfoController::class,'restore'])->name('empolyee.info.restore')->middleware('RoleChecker')->middleware('AssistantChecker');
     Route::get('empolyee/info/delete/{id}', [EmpolyeeinfoController::class,'delete'])->name('empolyee.info.delete')->middleware('RoleChecker')->middleware('AssistantChecker');

     /**
     * Empolyee information  end
     */






    /**
     * Admin daily reports end
     */
    Route::controller(adminwebreportController::class)->middleware('RoleChecker')->group(function () {
        Route::get('adminwebreport', 'create')->name('adminwebreport.create');
        Route::post('adminwebreport', 'store')->name('adminwebreport.store');
        Route::get('adminwebreport/show', 'index')->name('adminwebreport.show')->middleware('AssistantChecker');
        Route::get('adminwebreport/edit/{id}', 'edit')->name('adminwebreport.edit')->middleware('AssistantChecker');
        Route::post('adminwebreport/edit/{id}', 'update')->name('adminwebreport.update')->middleware('AssistantChecker');
        Route::get('adminwebreport/destroy/{id}', 'destroy')->name('adminwebreport.destroy')->middleware('AssistantChecker');
        Route::get('adminwebreport/restor/{id}', 'restor')->name('restor.adminwebreport')->middleware('AssistantChecker');
        Route::get('adminwebreport/delete/{id}', 'delete')->name('delete.adminwebreport')->middleware('AssistantChecker');
        //
        Route::get('adminwebreport/single/view/{id}', 'view')->name('view.adminwebreport')->middleware('AssistantChecker');

       
    });
     /**
     * bill payment date
     */
        Route::controller(BilldateController::class)->middleware('RoleChecker')->group(function () {
            Route::get('date/create', 'create')->name('billdate.create');
            Route::post('date/create', 'store')->name('billdate.store');
            Route::get('payment/date/show', 'index')->name('billdate.show')->middleware('AssistantChecker');

            Route::get('payment/date/{id}', 'edit')->name('payment.date.edit')->middleware('AssistantChecker');
            Route::post('payment/date/{id}', 'update')->name('payment.date.update')->middleware('AssistantChecker');
            Route::get('payment/date/distroy/{id}', 'distroy')->name('payment.date.distroy')->middleware('AssistantChecker');



        });


    // new loan controller
    Route::resource('mainloan',MainloanController::class);//CRUD
    Route::controller(MainloanController::class)->middleware('RoleChecker')->group(function () {
        Route::get('main/loan/restor/{id}', 'restor')->name('mainloan.restor')->middleware('AssistantChecker');
        Route::get('main/loan/delete/{id}', 'delete')->name('mainloan.delete')->middleware('AssistantChecker');
        //complete loan
        Route::get('main/loan/complete/', 'complete_loan')->name('mainloan.complete')->middleware('AssistantChecker');
        //loan status change
        Route::post('status/change/{id}', 'status_change')->name('status.change')->middleware('AssistantChecker');
         //download complete loan pdf pag
         Route::get('complete/loan/pdf/{id}', 'download_pdf')->name('download.pdf')->middleware('AssistantChecker');
    });
    // new Loan detailes controller
    Route::controller(LoandetaileController::class)->middleware('RoleChecker')->group(function () {
        Route::get('loandetaile/create/{id}', 'create')->name('loandetaile.create');
        Route::post('loandetaile/store', 'store')->name('loandetaile.store');
        Route::get('loandetaile/destroy/{id}', 'destroy')->name('loandetaile.destroy');
        Route::get('loandetaile/delete/forever/{id}', 'delete')->name('loandetaile.delete');
        Route::get('loandetaile/restore/{id}', 'restore')->name('loandetaile.restore');
        //selected mainloan installment show
        Route::get('loan/installment/show/{id}', 'show')->name('loaninstallment.show')->middleware('AssistantChecker');
    });




});
