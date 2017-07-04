<?php

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
    return view('welcome');
});

Route::name('faq')->get('support/FAQs', function(){
	return view('faq');
});

Route::name('subscribe')->post('user/subscribe', 'HomeController@subscribe');

Route::name('contact')->post('contact/message', 'HomeController@postContact');


Auth::routes();

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('/redirect/{provider}', 'Auth\LoginController@handleProviderCallback');
Route::get('auth/user', function(){
	return Auth::user();
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/next-step', 'ProfileController@next')->name('next')->middleware('hasCompleted');
Route::post('next-step', 'ProfileController@postNext')->middleware('hasCompleted');
Route::get('profile/edit', 'ProfileController@editProfile')->name('profile.edit');
Route::post('profile/update', 'ProfileController@updateProfile')->name('profile.update');
Route::get('/user/notifications', 'ProfileController@notifications')->name('notifications');

Route::get('/trading/bank', 'ProfileController@getBankDetails')->name('trading.bank');
Route::post('/trading/bank', 'ProfileController@postBankDetails')->name('trading.bank.save');
Route::post('/trading/tbc', 'ProfileController@postTBCDetails')->name('trading.tbc.save');
Route::post('/trading/grc', 'ProfileController@postGRCDetails')->name('trading.grc.save');
Route::get('history/all', 'MarketController@getAllHistory')->name('history.all');
Route::get('history/purchase', 'MarketController@getBuyingHistory')->name('history.buy');
Route::get('history/sold', 'MarketController@getSellingHistory')->name('history.sell');
Route::name('transaction.single')->get('transaction/{t}/view', 'MarketController@viewSingleTransaction');

Route::get('market/{market}/buy', 'MarketController@buy')->name('market.buy');
Route::get('market/{market}/sell', 'MarketController@sell')->name('market.sell');
Route::post('market/{market}/join', 'MarketController@join')->name('market.join');
Route::get('markets/all', 'MarketController@jsonMarkets');
Route::get('markets/interest', 'MarketController@marketInterest');
Route::name('crypto.buy')->post('package/{market}/{package}/purchase', 'MarketController@buyCrypto');
Route::name('crypto.sell')->post('package/{market}/sell', 'MarketController@sellCrypto');
Route::name('payment.confirm')->post('crypto/market/{t}/comfirm', 'MarketController@confirmPayment');
Route::name('upload.proof')->post('transaction/upload/proof/{t}', 'MarketController@uploadProof');

####ADMIN ROUTES#####
Route::name('admin.login.show')->get('admin/show/login-form', 'Admin\AuthController@showLoginForm');
Route::name('admin.login')->post('admin/show/login-form', 'Admin\AuthController@login');
Route::name('admin.dashboard')->get('admin/crypto2naira/dashboard', 'Admin\AdminController@dashboard');
Route::name('admin.transactions.all')->get('admin/crypto2naira/transactions/{type?}', 'Admin\TransactionController@all');
Route::name('admin.transactions.status')->get('admin/crypto2naira/transaction/{type}/{status}', 'Admin\TransactionController@status');
Route::name('matcher')->get('admin/crypto2naira/matcher/create', 'Admin\TransactionController@matcher');
Route::name('matcher.multi')->get('admin/crypto2naira/multi_matcher/create', 'Admin\TransactionController@multiMatcher');
Route::name('match')->post('admin/crypto2naira/match', 'Admin\TransactionController@match');

Route::name('users.all')->get('admin/crypto2naira/users/all/{type?}', 'Admin\AdminController@allUsers');
Route::name('user.block')->get('admin/crypto2naira/user/block/{user}', 'Admin\AdminController@blockUser');
Route::get('u/u/u', 'Admin\AdminController@clear');

Route::name('inactive.mail.all')->get('admin/crypto2naira/users/inactive/mailall', 'Admin\AdminController@mailInactiveUsers');
Route::name('inactive.mail.send')->post('admin/crypto2naira/users/inactive/mailall', 'Admin\AdminController@mailInactiveUsersSend');
