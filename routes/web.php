<?php


Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();
Route::get('reg/{agent_name}', 'Auth\RegisterController@showRegistrationFormAgent');

Route::get('home', 'DashboardController@index');
Route::group(['prefix' => 'profile'], function () {
    Route::get('index', 'ProfileController@index');
    Route::post('index', 'ProfileController@addProfile');
    Route::put('index', 'ProfileController@editProfile');
    //password
    Route::get('chang-pass', 'ProfileController@changePass');
    Route::post('chang-pass', 'ProfileController@changeNewPass');
    //bank
    Route::get('bank-detail', 'BankController@index');
    Route::post('bank-detail', 'BankController@simpanBank');
    Route::delete('bank-detail/{id}', 'BankController@buangBank');
});
Route::group(['prefix' => 'view'], function () {
    //start invest
    Route::get('deposit', 'ShareController@deposit');
    Route::post('deposit', 'ShareController@depositSaved');

    //monthly profit
    Route::get('/profit-list', 'ShareController@profitList');

    //agreement
    Route::get('agreement/{id}', 'AgreementController@pdfAgreement');

    //history
    Route::get('fund-history', 'ShareController@history');

    //payBack send to wallet
    Route::post('send-to-wallet/{uuid}', 'ShareController@clearPayback');
    Route::post('monthly-profit/{id}', 'ShareController@SendProfitMonthly');

    //request withdrawal
    Route::get('withdrawal-all', 'WithdrawController@senaraiKeluar');
    Route::get('withdrawal-all/{id}', 'WithdrawController@sendToWallet');
    Route::get('withdrawal', 'WithdrawController@create');
    Route::post('withdrawal', 'WithdrawController@store');
    Route::get('request-withdrawal', 'WithdrawController@viewAllHistory');
});
// referrals link was here
Route::get('referrals', 'InviteController@index')->middleware('auth'); // remember hard code at upper line first.
Route::get('ref/{invitecode}', 'InviteController@registerRef')->middleware('guest');;

//Admin Pages
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index');

    //share per lot
    Route::get('share-per-lot', 'AdminController@shareIndex');
    Route::post('share-per-lot', 'AdminController@shareUpdate');

    //Withdrawal
    Route::get('withdrawal-list', 'Admin\UserSetController@withdrawalList');
    Route::get('withdrawal-list/{id}', 'Admin\UserSetController@withdrawalView');
    Route::put('withdrawal-list-edit/{id}', 'Admin\UserSetController@withdrawalPatch');
    //deposit
    Route::get('deposit', 'AdminController@depositIndex');
    //UserList
    Route::get('user_list', 'Admin\UserSetController@userList');
    // Tambah agent dan list agent
    Route::get('/list-agent', 'Admin\AgentsetController@index');
    Route::get('/add-agent', 'Admin\AgentsetController@create');
    Route::post('/add-agent', 'Admin\AgentsetController@store');
});
//Agent Pages
Route::group(['prefix' => 'agent'], function () {
    Route::get('/', 'AgentController@index');
    Route::get('add_signature', 'AgentController@siggyAgent') ;
    Route::put('add_new_signature', 'AgentController@siggyAgentUpdate') ;
    Route::get('user_list', 'AgentController@userList');

    //get withdrawal
    Route::get('withdrawal-list', 'AgentProfitController@withdrawalList');

    //get deposit
    Route::get('depositlist', 'AgentProfitController@depositList');
    Route::get('deposit-edit/{id}', 'AgentProfitController@depositEdit');
    Route::post('deposit-update/{id}', 'AgentProfitController@depositUpdate');

    //bank add account
    Route::get('add-bank-info', 'AgentController@addBank');
    Route::post('add-bank-info', 'AgentController@postBank');
    Route::delete('add-bank-info/{id}', 'AgentController@deleteBank');

    //Agent profile
    Route::get('profile-index', 'AgentController@profileIndex' );
    Route::put('profile-edit', 'AgentController@profileEdit' );
    Route::get('profile-password', 'AgentController@profilePassword' );
});
