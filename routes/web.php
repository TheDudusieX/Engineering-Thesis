<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JuryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MyReviewsController;
use App\Http\Controllers\OrchesterReviewController;

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
    return view('home');
});

//sciezka w przegladarce, nazwa funkcji w kontrolerze, nazwa routa
Route::get('/orchesterreview', [OrchesterReviewController::class, 'index'])->name('orchesterreview');
Route::get('/orchesterreviewended', [OrchesterReviewController::class, 'indexended'])->name('orchesterreviewended');
Route::get('/orchesterreviewcanceled', [OrchesterReviewController::class, 'indexcanceled'])->name('orchesterreviewcanceled');
Route::get('/orchesterPreview/{id}', [OrchesterReviewController::class, 'indexPreview'])->name('orchesterPreview');
Route::get('/schedule/{orchesterreview}', [OrchesterReviewController::class, 'schedule'])->name('schedule');
Route::get('/summary/{review}', [OrchesterReviewController::class, 'summary'])->name('summary');

Route::post('/dateFiltercurrent', [OrchesterReviewController::class, 'dateFiltercurrent'])->name('dateFiltercurrent');
Route::post('/dateFiltercanceled', [OrchesterReviewController::class, 'dateFiltercanceled'])->name('dateFiltercanceled');
Route::post('/dateFilterended', [OrchesterReviewController::class, 'dateFilterended'])->name('dateFilterended');

Auth::routes();

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('update');
    Route::patch('/profileJury', [ProfileController::class, 'updateJury'])->name('updateJury');
    Route::post('/profile/changepassword', [ProfileController::class, 'changepassword'])->name('changepassword');

    Route::get('/orchesterSignUp/{id}', [OrchesterReviewController::class, 'signUp'])->name('orchester.signUp');
    Route::get('/orchesterSignOut/{id}', [OrchesterReviewController::class, 'signOut'])->name('orchester.signOut');

    Route::get('/orchesterreviewAdd', [OrchesterReviewController::class, 'add'])->name('orchesterreviewAdd');
    Route::post('/orchesterreviewAdd', [OrchesterReviewController::class, 'store'])->name('orchesterreviewStore');
    Route::get('/orchesterreviewEdit/{id}', [OrchesterReviewController::class, 'edit'])->name('orchesterreviewEdit');
    Route::post('/orchesterreviewEdit/{id}', [OrchesterReviewController::class, 'update'])->name('orchesterreviewUpdate');

    Route::get('/myReviews', [MyReviewsController::class, 'index'])->name('myReviews');
    Route::delete('myReviews/{id}', [OrchesterReviewController::class, 'destroy'])->name('orchesterreviewDestroy');
    Route::get('/accept/{id}/{reviewId}', [MyReviewsController::class, 'accept'])->name('accept');
    Route::get('/deny/{id}/{reviewId}', [MyReviewsController::class, 'deny'])->name('deny');
    Route::get('/test', [MyReviewsController::class, 'test'])->name('test');

    Route::get('/acceptPerfomanceIndex/{orchesterreview}', [MyReviewsController::class, 'acceptPerfomanceIndex'])->name('acceptPerfomanceIndex');
    Route::post('/acceptPerformance', [MyReviewsController::class, 'acceptPerformance'])->name('acceptPerformance');

    Route::get('/timeTable/{orchesterreview}', [MyReviewsController::class, 'timeTable'])->name('timeTable');
    Route::get('/timeTableStore/{id}', [MyReviewsController::class, 'timeTableStore'])->name('timeTableStore');
    Route::post('/timeTablePivotStore', [MyReviewsController::class, 'timeTablePivotStore'])->name('timeTablePivotStore');
    Route::get('/timeTablePivotUpdate/{id}', [MyReviewsController::class, 'timeTablePivotEdit'])->name('timeTablePivotEdit'); 
    Route::post('/timeTablePivotUpdate', [MyReviewsController::class, 'timeTablePivotUpdate'])->name('timeTablePivotUpdate');
    
    Route::get('/resetOrchestra/{id}/{orchestraId}', [MyReviewsController::class, 'resetOrchestra'])->name('resetOrchestra');
    
    Route::get('/jury/{id}', [MyReviewsController::class, 'juryindex'])->name('juryindex');
    Route::post('/juryadd', [MyReviewsController::class, 'juryadd'])->name('juryadd');
    Route::post('/juryUserAdd', [MyReviewsController::class, 'juryUserAdd'])->name('juryUserAdd');

    Route::get('/juryEditIndex/{id}',[MyReviewsController::class, 'juryEditIndex'])->name('juryEditIndex');
    Route::post('/juryEdit', [MyReviewsController::class, 'juryEdit'])->name('juryEdit');

    Route::get('/finishReview/{review}', [MyReviewsController::class, 'finishReview'])->name('finishReview');

    Route::get('/juryInReviewsIndex', [JuryController::class, 'juryInReviewsIndex'])->name('juryInReviewsIndex');
    Route::get('/orchestrasInReviewsIndex/{review}', [JuryController::class, 'orchestrasInReviewsIndex'])->name('orchestrasInReviewsIndex');
    Route::get('/rateIndex/{orchestra}/{review}', [JuryController::class, 'rateIndex'])->name('rateIndex');
    Route::post('/rateAdd', [JuryController::class, 'rateAdd'])->name('rateAdd');
});