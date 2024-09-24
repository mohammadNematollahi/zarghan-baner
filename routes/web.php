<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Auth\Admin\LoginController;
use App\Http\Livewire\Admin\CheckArticle\Market\Index;
use App\Http\Controllers\Auth\Admin\AdminAuthConroller;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Account\AccountController;
use App\Http\Controllers\Admin\Setting\SettingController;

use App\Http\Controllers\Auth\Admin\ResetPasswordController;
use App\Http\Controllers\Admin\CheckArticle\Job\JobController;
use App\Http\Controllers\Admin\Ticket\Normal\NormalController;
use App\Http\Controllers\Admin\CheckArticle\Market\MarketController;
use App\Http\Controllers\Admin\Ticket\Important\ImportantController;
use App\Http\Controllers\Admin\CheckArticle\Comment\CommentController;
use App\Http\Controllers\Dashboard\Job\JobController as DashboardJobController;
use App\Http\Controllers\Dashboard\Market\MarketController as DashboardMarketController;
use App\Http\Controllers\Dashboard\Ticket\TicketController as DashboardTicketController;
use App\Http\Controllers\Admin\CheckArticle\Unverified\Job\JobController as UnverifiedJobController;
use App\Http\Controllers\Admin\CheckArticle\Unverified\Market\MarketController as UnverifiedMarketController;
use App\Http\Controllers\Admin\CheckArticle\NotConfirmed\Comment\CommentController as NotConfirmedCommentController;
use App\Http\Controllers\Customer\Job\JobController as HomeJobController;
use App\Http\Controllers\Customer\Market\MarketController as HomeMarketController;
use App\Http\Controllers\Dashboard\MyADS\MarketController as MyADSMarketController;
use App\Http\Controllers\Dashboard\MyADS\JobController as MyADSJobController;

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


/*
|--------------------------------------------------------------------------
| PANLE ADMIM
|-----------------------------------------------routes/web.php---------------------------
*/


Route::prefix("admin")->namespace("Admin")->middleware("auth:admin")->group(function () {

    Route::get("/", [AdminController::class, "index"])->name("admin.home");

    Route::prefix("check-article")->namespace("CheckArticle")->group(function () {

        Route::prefix("comment")->namespace("Comment")->group(function () {

            Route::get("/", [CommentController::class, "index"])->name("admin.check.article.comment.index");
            Route::get("/show/{comment:id}", [CommentController::class, "show"])->name("admin.check.article.comment.show");

        });

        Route::prefix("market")->namespace("Market")->group(function () {

            Route::get("/", [MarketController::class, "index"])->name("admin.check.article.market.index");
            Route::get("/show/{market:slug}", [MarketController::class, "show"])->name("admin.check.article.market.show");
            Route::get("/create", [MarketController::class, "create"])->name("admin.check.article.market.create");
            Route::get("/edit/{market:slug}", [MarketController::class, "edit"])->name("admin.check.article.market.edit");

        });

        Route::prefix("job")->namespace("Job")->group(function () {

            Route::get("/", [JobController::class, "index"])->name("admin.check.article.job.index");
            Route::get("/show/{job:slug}", [JobController::class, "show"])->name("admin.check.article.job.show");
            Route::get("/create", [JobController::class, "create"])->name("admin.check.article.job.create");
            Route::get("/edit/{job:slug}", [JobController::class, "edit"])->name("admin.check.article.job.edit");
        });

        Route::prefix("unverified")->namespace("NotConfirmed")->group(function () {

            Route::prefix("comment")->namespace("Comment")->group(function () {

                Route::get("/", [NotConfirmedCommentController::class, "index"])->name("admin.check.article.not.confirmed.comment.index");
                Route::get("/show/{comment:id}", [NotConfirmedCommentController::class, "show"])->name("admin.check.article.not.confirmed.comment.show");
                Route::get("/destroy/{comment:id}", [NotConfirmedCommentController::class, "destroy"])->name("admin.check.article.not.confirmed.comment.destroy");

            });

            Route::prefix("market")->namespace("Market")->group(function () {

                Route::get("/", [UnverifiedMarketController::class, "index"])->name("admin.check.article.unverified.market.index");
                Route::get("/show/{market:slug}", [UnverifiedMarketController::class, "show"])->name("admin.check.article.unverified.market.show");

            });

            Route::prefix("job")->namespace("Job")->group(function () {

                Route::get("/", [UnverifiedJobController::class, "index"])->name("admin.check.article.unverified.job.index");
                Route::get("/show/{job:slug}", [UnverifiedJobController::class, "show"])->name("admin.check.article.unverified.job.show");

            });

        });

    });

    Route::prefix("ticket")->namespace("Ticket")->group(function () {

        Route::prefix("important")->namespace("Important")->group(function () {

            Route::get("/", [ImportantController::class, 'index'])->name('admin.ticket.important.index');
            Route::get("/show/{ticket:slug}", [ImportantController::class, 'show'])->name('admin.ticket.important.show');
            // Route::post("/store/{ticket:id}" , [ImportantController::class , 'response'])->name('admin.ticket.important.store');

        });

        Route::prefix("normal")->namespace("Normal")->group(function () {

            Route::get("/", [NormalController::class, 'index'])->name('admin.ticket.normal.index');
            Route::get("/show/{ticket:id}", [NormalController::class, 'show'])->name('admin.ticket.normal.show');
            Route::post("/store/{ticket:id}", [NormalController::class, 'response'])->name('admin.ticket.normal.store');

        });

    });


    Route::prefix("setting")->namespace("Setting")->group(function () {

        Route::get("/", [SettingController::class, "index"])->name("admin.setting.index");
        Route::get("/create", [SettingController::class, "create"])->name("admin.setting.create");
        Route::post("/store", [SettingController::class, "index"])->name("admin.setting.store");

    });

    Route::prefix("account")->namespace("Account")->group(function () {
        Route::get("/change-password", [AccountController::class, "changePassword"])->name("admin.account.change.password");
        Route::get("/edit", [AccountController::class, "edit"])->name("admin.account.edit");
    });

});


/*
|--------------------------------------------------------------------------
|  DASHBOARD User
|-----------------------------------------------routes/web.php---------------------------
*/

Route::prefix("Dashboard")->namespace("Dashboard")->group(function () {

    Route::get("/", [DashboardController::class, "index"])->name("dashboard.home");

    Route::prefix("Market")->namespace("Market")->group(function () {
        Route::get("/Craete", [DashboardMarketController::class, "create"])->name("dashboard.market.create");
        Route::get("/Edit/{market}", [DashboardMarketController::class, "edit"])->name("dashboard.market.edit");
    });

    Route::prefix("Job")->namespace("Job")->group(function () {
        Route::get("/Create", [DashboardJobController::class, "create"])->name("dashboard.job.create");
        Route::get("/Edit/{job}", [DashboardJobController::class, "edit"])->name("dashboard.job.edit");
    });

    Route::prefix("Ticket")->namespace("Ticket")->group(function () {
        Route::get("/Create", [DashboardTicketController::class, "create"])->name("dashboard.ticket.create");
        Route::post("/UploadImage", [DashboardTicketController::class, "UploadImage"])->name("ckeditor.upload");
    });

    Route::prefix("MyAds")->namespace("MyAds")->group(function () {
        Route::get("/Market", [MyADSMarketController::class, "showMarket"])->name("dashboard.my-ads.showMarket");
        Route::get("/Job", [MyADSJobController::class, "showJob"])->name("dashboard.my-ads.showJob");
    });

});


/*
|--------------------------------------------------------------------------
|  LOGIN
|-----------------------------------------------routes/web.php---------------------------
*/

Auth::routes();


/*
|--------------------------------------------------------------------------
|  ADMIN LOGIN
|-----------------------------------------------routes/web.php---------------------------
*/

Route::get("/login/admin", [LoginController::class, "showLoginForm"])->name("login.admin");
Route::post("/login/admin/store", [LoginController::class, "adminLogin"])->name('login.admin.store');
Route::get("/login/admin/reset-password", [ResetPasswordController::class, "index"])->name('login.admin.reset.password.index');
Route::post("/login/admin/reset-password/send-mail", [ResetPasswordController::class, "sendMail"])->name('login.admin.reset.password.send.mail');
Route::get("/login/admin/successful-email", [ResetPasswordController::class, "successfulEmail"])->name('login.admin.reset.password.successful.mail');
Route::get("/login/admin/reset-password/change-password", [ResetPasswordController::class, "changePassword"])->name('login.admin.reset.password.change.password');
Route::post("/login/admin/reset-password/change-password/{admin:id}/store", [ResetPasswordController::class, "store"])->name('login.admin.reset.password.change.password.store');


//HOME

Route::get('/', [HomeController::class, "index"])->name('home');

//JOB

Route::prefix("job")->group(function () {

    Route::get('/', [HomeJobController::class, "index"])->name('home.job.index');
    Route::get('/{job}', [HomeJobController::class, "show"])->name('home.job.show');
});


// MARKET


Route::prefix("market")->group(function () {

    Route::get('/', [HomeMarketController::class, "index"])->name('home.market.index');
    Route::get('/{market}', [HomeMarketController::class, "show"])->name('home.market.show');

});