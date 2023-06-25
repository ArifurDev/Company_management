<?php

use App\Http\Controllers\AdminifoController;
use App\Http\Controllers\AdminriportsController;
use App\Http\Controllers\adminwebreportController;
use App\Http\Controllers\BilldateController;
use App\Http\Controllers\ComopanyController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\EmpolyeeController;
use App\Http\Controllers\EmpolyeeinfoController;
use App\Http\Controllers\EmpolyeereportController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoandetaileController;
use App\Http\Controllers\LoanrecivesiduleController;
use App\Http\Controllers\LoansendshiduleController;
use App\Http\Controllers\MainloanController;
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
        Route::get('destroy/company/{id}', 'destroy')->name('company.destroy');
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
    Route::get('compoany/empolyeereport/{id}', [EmpolyeeController::class, 'info'])->name('compoany.info')->middleware('RoleChecker');

    /**
     * live search
     */
    Route::get('/search', [EmpolyeeController::class, 'search'])->middleware('RoleChecker');
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
        Route::get('delete/admin/daily/report/{id}', 'delete')->name('admindailyraport.delete');

        //download this month report excel file
        Route::get('admin/report/export', 'export')->name('export.adminreport')->middleware('RoleChecker');

        //download all report excel file
        Route::get('admin/report/all/export', 'all_export')->name('all.export.adminreport')->middleware('RoleChecker');

        /**
         * date search
         */
        Route::post('/admin/dailyreport/datasearch', 'getdate')->name('admindailyraport.datasearch'); //get data search date
        /**
         *  end date search route
         */
    });

    Route::resource('admininfo', AdminifoController::class)->middleware('RoleChecker');
    Route::controller(AdminifoController::class)->middleware('RoleChecker')->group(function () {
        Route::get('admin/information/restore/{id}','restore')->name('admin.info.restore');
        Route::get('admin/information/destroy/{id}','destroy')->name('admin.info.distroy');
        Route::get('admin/information/edit/{id}','edit')->name('admin.info.edit');
        Route::post('admin/information/update/{id}','update')->name('admin.info.update');
        Route::get('admin/information/delete/{id}','delete')->name('admin.info.delete');
    });


    /**
     * Empolyee daily reports
     */
    Route::get('create/empolyee/report', [EmpolyeereportController::class, 'create'])->name('cerate.empolyeereport');
    Route::post('create/empolyee/report', [EmpolyeereportController::class, 'store'])->name('store.empolyeereport');
    Route::get('show/empolyee/report', [EmpolyeereportController::class, 'index'])->name('show.empolyeereport');
    Route::get('show/empolyee/report/details/{id}', [EmpolyeereportController::class, 'details'])->name('details.empolyeereport')->middleware('RoleChecker');
    Route::get('empolyee/report/edit/{id}', [EmpolyeereportController::class, 'edit'])->name('edit.empolyeereport')->middleware('RoleChecker');
    Route::post('empolyee/report/edit/{id}', [EmpolyeereportController::class, 'update'])->name('update.empolyeereport')->middleware('RoleChecker');
    Route::post('empolyee/report/destroy/{id}', [EmpolyeereportController::class, 'destroy'])->name('destroy.empolyeereport')->middleware('RoleChecker');
    Route::get('empolyee/report/destroy/{id}', [EmpolyeereportController::class, 'destroy'])->middleware('RoleChecker');
    Route::get('empolyee/report/restor/{id}', [EmpolyeereportController::class, 'restor'])->name('restor.empolyeereport')->middleware('RoleChecker');
    Route::get('empolyee/report/delete/{id}', [EmpolyeereportController::class, 'delete'])->name('delete.empolyeereport')->middleware('RoleChecker');

    //download this month report excel file
    Route::get('empolyee/report/export', [EmpolyeereportController::class, 'export'])->name('export.empolyeereport')->middleware('RoleChecker');

    //download all report excel file
    Route::get('empolyee/report/all/export', [EmpolyeereportController::class, 'all_export'])->name('all.export.empolyeereport')->middleware('RoleChecker');



    /**
     * live search
     */
    Route::get('/empolyeereportsearch', [EmpolyeereportController::class, 'search'])->middleware('RoleChecker');
    /**
     *  end live search route
     */
    /**
     * date search
     */
    Route::post('/datesearch', [EmpolyeereportController::class, 'getdate'])->name('datesearch.empolyeereport')->middleware('RoleChecker'); //get data
    /**
     *  end date search route
     */


     /**
     * Empolyee information
     */
     Route::resource('empolyeeinfo', EmpolyeeinfoController::class)->middleware('RoleChecker');
     Route::get('empolyee/info/restore/{id}', [EmpolyeeinfoController::class,'restore'])->name('empolyee.info.restore')->middleware('RoleChecker');
     Route::get('empolyee/info/delete/{id}', [EmpolyeeinfoController::class,'delete'])->name('empolyee.info.delete')->middleware('RoleChecker');

     /**
     * Empolyee information  end
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
        Route::get('adminwebreport/delete/{id}', 'delete')->name('delete.adminwebreport');
        //
        Route::get('adminwebreport/single/view/{id}', 'view')->name('view.adminwebreport');

        /**
         * live search
         */
        Route::get('/adminwebreportsearch', 'search');
    });
     /**
     * bill payment date
     */
        Route::controller(BilldateController::class)->middleware('RoleChecker')->group(function () {
            Route::get('date/create', 'create')->name('billdate.create');
            Route::post('date/create', 'store')->name('billdate.store');
            Route::get('payment/date/show', 'index')->name('billdate.show');

            Route::get('payment/date/{id}', 'edit')->name('payment.date.edit');
            Route::post('payment/date/{id}', 'update')->name('payment.date.update');
            Route::get('payment/date/distroy/{id}', 'distroy')->name('payment.date.distroy');



        });

    /**
     * Loan send Controller
     */
    Route::controller(LoanController::class)->middleware('RoleChecker')->group(function () {
        Route::get('admin/loan/send', 'create')->name('adminLoanReportSend.create');
        Route::post('admin/loan/send', 'store')->name('adminLoanReportSend.store');
        Route::get('admin/loan/send/show', 'index')->name('adminLoanReportSend.show');
        Route::get('admin/loan/send/edit/{id}', 'edit')->name('adminLoanReportSend.edit');
        Route::post('admin/loan/send/edit/{id}', 'update')->name('adminLoanReportSend.update');
        Route::get('admin/loan/send/destroy/{id}', 'destroy')->name('adminLoanReportSend.destroy');
        Route::get('admin/loan/send/restor/{id}', 'restor')->name('adminLoanReportSend.restor');
        Route::get('admin/loan/send/delete/{id}', 'delete')->name('adminLoanReportSend.delete');
    });
    //loan send installment
    Route::controller(LoansendshiduleController::class)->middleware('RoleChecker')->group(function () {
        Route::post('admin/loan/send/installment', 'store')->name('loanSendInstallment.store');
        Route::get('admin/loan/send/installment/{number}', 'show')->name('loanSendInstallment.show');
        Route::get('send/installment/edit/{id}', 'edit')->name('loanSendInstallment.edit');
        Route::post('send/installment/edit/{id}', 'update')->name('loanSendInstallment.update');
        Route::get('send/installment/destroy/{id}', 'destroy')->name('loanSendInstallment.destroy');
        Route::get('send/installment/restor/{id}', 'restor')->name('loanSendInstallment.restor');
        Route::get('send/installment/delete/{id}', 'delete')->name('loanSendInstallment.delete');
    });


    /**
     * Loan recive Controller
     */
    Route::controller(ReciveloanController::class)->middleware('RoleChecker')->group(function () {
        Route::get('admin/loan/recive', 'create')->name('adminLoanReportRecive.create');
        Route::post('admin/loan/recive', 'store')->name('adminLoanReportRecive.store');
        // Route::get('admin/loan/recive/show', 'create')->name('adminLoanReportRecive.show');
        Route::get('admin/loan/recive/edit/{id}', 'edit')->name('adminLoanReportRecive.edit');
        Route::post('admin/loan/recive/edit/{id}', 'update')->name('adminLoanReportRecive.update');
        Route::get('admin/loan/recive/destroy/{id}', 'destroy')->name('adminLoanReportRecive.destroy');
        Route::get('admin/loan/recive/restor/{id}', 'restor')->name('adminLoanReportRecive.restor');
        Route::get('admin/loan/recive/delete/{id}', 'delete')->name('adminLoanReportRecive.delete');
    });

     //loan recive installment
     Route::controller(LoanrecivesiduleController::class)->middleware('RoleChecker')->group(function () {
        Route::post('admin/loan/recive/installment', 'store')->name('loanReciveInstallment.store');
        Route::get('admin/loan/recive/installment/{number}', 'show')->name('loanReciveInstallment.show');
        Route::get('recive/installment/edit/{id}', 'edit')->name('loanReciveInstallment.edit');
        Route::post('recive/installment/edit/{id}', 'update')->name('loanReciveInstallment.update');
        Route::get('recive/installment/destroy/{id}', 'destroy')->name('loanReciveInstallment.destroy');
        Route::get('recive/installment/restor/{id}', 'restor')->name('loanReciveInstallment.restor');
        Route::get('recive/installment/delete/{id}', 'delete')->name('loanReciveInstallment.delete');

    });


    // new loan controller
    Route::resource('mainloan',MainloanController::class);//CRUD
    Route::controller(MainloanController::class)->middleware('RoleChecker')->group(function () {
        Route::get('main/loan/restor/{id}', 'restor')->name('mainloan.restor');
        Route::get('main/loan/delete/{id}', 'delete')->name('mainloan.delete');
        //complete loan
        Route::get('main/loan/complete/', 'complete_loan')->name('mainloan.complete');
    });
    // new Loan detailes controller
    Route::controller(LoandetaileController::class)->middleware('RoleChecker')->group(function () {
        Route::get('loandetaile/create/{id}', 'create')->name('loandetaile.create');
        Route::post('loandetaile/store', 'store')->name('loandetaile.store');
        //selected mainloan installment show
        Route::get('loan/installment/show/{id}', 'show')->name('loaninstallment.show');
    });

});
