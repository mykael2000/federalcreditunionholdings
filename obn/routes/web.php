<?php

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

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {

    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');

    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');

    Route::get('/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.users.create');

    Route::post('/users', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.users.store');

    Route::get('/users/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('admin.users.show');

    Route::post('/users/update', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.users.account-setting.update');

    Route::post('/users/update/password', [App\Http\Controllers\Admin\UserController::class, 'changePassword'])->name('admin.users.account-setting.change-password');

    Route::post('/users/task/notification', [App\Http\Controllers\Admin\UserController::class, 'sendNotification'])->name('admin.user.account-setting.send-notification');

    Route::get('/users/delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('admin.users.delete');

    Route::get('/users/login-as/{id}', [App\Http\Controllers\Admin\UserController::class, 'loginAs'])->name('admin.users.login-as');

    Route::get('/cards', [App\Http\Controllers\Admin\CardController::class, 'index'])->name('admin.cards.index');

    Route::get('/cards/show/{id}', [App\Http\Controllers\Admin\CardController::class, 'show'])->name('admin.cards.show');

    Route::post('/cards', [App\Http\Controllers\Admin\CardController::class, 'store'])->name('admin.cards.store');

    Route::get('/loans', [App\Http\Controllers\Admin\LoanController::class, 'index'])->name('admin.loans.index');

    Route::get('/loans/update/{id}', [App\Http\Controllers\Admin\LoanController::class, 'update'])->name('admin.loans.update');

    Route::get('/transactions/deposit', [App\Http\Controllers\Admin\TransactionController::class, 'deposit'])->name('admin.transactions.deposit');

    Route::get('/all/transactions', [App\Http\Controllers\Admin\TransactionController::class, 'show'])->name('admin.transactions.show');

    Route::get('/transactions/withdrawals', [App\Http\Controllers\Admin\TransactionController::class, 'withdrawals'])->name('admin.transactions.withdrawals');

    Route::get('/transactions/transfers', [App\Http\Controllers\Admin\TransactionController::class, 'transfers'])->name('admin.transactions.transfers');

    Route::get('/transactions/withdrawals/{id}', [App\Http\Controllers\Admin\TransactionController::class, 'editWithdrawal'])->name('admin.transactions.edit-withdrawal');

    Route::post('/transactions/withdrawals', [App\Http\Controllers\Admin\TransactionController::class, 'storeWithdrawal'])->name('admin.transactions.store-withdrawal');

    Route::get('/transactions/withdrawals/delete/{id}', [App\Http\Controllers\Admin\TransactionController::class, 'deleteWithdrawal'])->name('admin.transactions.delete-withdrawal');

    Route::get('/all/transactions/delete/{id}', [App\Http\Controllers\Admin\TransactionController::class, 'deleteTrans'])->name('admin.transactions.deleteTrans');

    Route::get('/transactions/transfers/{id}', [App\Http\Controllers\Admin\TransactionController::class, 'editTransfer'])->name('admin.transactions.edit-transfer');

    Route::post('/transactions/transfers', [App\Http\Controllers\Admin\TransactionController::class, 'storeTransfers'])->name('admin.transactions.store-transfer');

    Route::get('/transactions/transfers/delete/{id}', [App\Http\Controllers\Admin\TransactionController::class, 'deleteTransfer'])->name('admin.transactions.delete-transfer');

    Route::get('/messages', [App\Http\Controllers\Admin\MessageController::class, 'index'])->name('admin.messages.index');

    Route::get('/contact-page/messages', [App\Http\Controllers\Admin\MessageController::class, 'contactPageMessages'])->name('admin.messages.contacts');

    Route::get('/messages/show/{id}', [App\Http\Controllers\Admin\MessageController::class, 'show'])->name('admin.messages.show');

    Route::post('/messages/reply/{id}', [App\Http\Controllers\Admin\MessageController::class, 'reply'])->name('admin.messages.reply');

    Route::get('/web/settings', [App\Http\Controllers\Admin\WebSettingController::class, 'index'])->name('admin.web-settings.index');

    Route::post('/web/settings', [App\Http\Controllers\Admin\WebSettingController::class, 'store'])->name('admin.web-settings.store');

    Route::post('/transactions/store', [App\Http\Controllers\Admin\TransactionController::class, 'store'])->name('admin.transactions.store');

});

Route::group(['prefix' => 'user', 'middleware' => 'auth:user'], function () {

    Route::get('/', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');
    Route::get('/account/status', [App\Http\Controllers\User\AccountController::class, 'status'])->name('user.account-status');

    Route::get('/transfers', [App\Http\Controllers\User\TransferController::class, 'index'])->name('user.transfer.index');

    Route::get('/transfers/create', [App\Http\Controllers\User\TransferController::class, 'create'])->name('user.transfer.create');

    Route::post('/transfers', [App\Http\Controllers\User\TransferController::class, 'store'])->name('user.transfer.store');

    Route::get('/transfers/verification', [App\Http\Controllers\User\TransferController::class, 'verification'])->name('user.transfer.verification');

    Route::get('/deposits', [App\Http\Controllers\User\DepositController::class, 'create'])->name('user.deposit.create');

    Route::post('/deposits/via-check', [App\Http\Controllers\User\DepositController::class, 'viaCheckStore'])->name('user.deposit.via-check');

    Route::post('/deposits/via-btc', [App\Http\Controllers\User\DepositController::class, 'viaBTC'])->name('user.deposit.via-btc');

    Route::get('/withdrawals/create', [App\Http\Controllers\User\WithdrawalController::class, 'create'])->name('user.withdrawal.create');

    Route::post('/withdrawals', [App\Http\Controllers\User\WithdrawalController::class, 'store'])->name('user.withdrawal.store');

    Route::get('/withdrawals/verification', [App\Http\Controllers\User\WithdrawalController::class, 'verification'])->name('user.withdrawal.verification');

    Route::post('/withdrawals/verify', [App\Http\Controllers\User\WithdrawalController::class, 'verify'])->name('user.withdrawal.verify');

    Route::get('/transactions', [App\Http\Controllers\User\TransactionController::class, 'transactions'])->name('user.transactions.show');

    Route::get('/loans', [App\Http\Controllers\User\LoanController::class, 'index'])->name('user.loan.index');
    Route::get('/loans/request', [App\Http\Controllers\User\LoanController::class, 'create'])->name('user.loan.create');

    Route::post('/loans', [App\Http\Controllers\User\LoanController::class, 'store'])->name('user.loan.store');

    Route::get('/loans/verification', [App\Http\Controllers\User\LoanController::class, 'verification'])->name('user.loan.verification');

    Route::post('/loans/verify', [App\Http\Controllers\User\LoanController::class, 'verify'])->name('user.loan.verify');

    Route::get('/cards', [App\Http\Controllers\User\CardController::class, 'index'])->name('user.card.index');

    Route::post('/cards', [App\Http\Controllers\User\CardController::class, 'store'])->name('user.card.store');

    Route::get('/account-security', [App\Http\Controllers\User\AccountController::class, 'index'])->name('user.account-security');

    Route::get('/profile', [App\Http\Controllers\User\AccountController::class, 'profile'])->name('user.profile');

    Route::post('/account-setting', [App\Http\Controllers\User\AccountController::class, 'store'])->name('user.account-setting.store');
    Route::post('/account-setting/change-password', [App\Http\Controllers\User\AccountController::class, 'changePassword'])->name('user.account-setting.change-password');

    Route::get('/accounts/create', [App\Http\Controllers\User\AccountController::class, 'create'])->name('user.accounts.create');

    Route::post('/accounts', [App\Http\Controllers\User\AccountController::class, 'storeAccount'])->name('user.accounts.store');

    Route::get('/accounts', [App\Http\Controllers\User\AccountController::class, 'accounts'])->name('user.accounts.index');

    Route::get('/messages/inbox', [App\Http\Controllers\User\MessageController::class, 'index'])->name('user.message.index');

    Route::get('/messages/create', [App\Http\Controllers\User\MessageController::class, 'create'])->name('user.message.create');

    Route::post('/messages/store', [App\Http\Controllers\User\MessageController::class, 'store'])->name('user.message.store');

    Route::get('/messages/sent', [App\Http\Controllers\User\MessageController::class, 'sent'])->name('user.message.sent');

    Route::get('/messages/view/{id}', [App\Http\Controllers\User\MessageController::class, 'view'])->name('user.messages.view');

    Route::post('/messages/reply/{id}', [App\Http\Controllers\User\MessageController::class, 'reply'])->name('user.messages.reply');

    Route::get('/login-as/{id}', [App\Http\Controllers\User\AccountController::class, 'loginAs'])->name('user.login-as');

    Route::group(['middleware' => 'acc_verified'], function () {

        Route::post('/transfers/verify', [App\Http\Controllers\User\TransferController::class, 'verify'])->name('user.transfer.verify');

        Route::get('/transfers/progress', [App\Http\Controllers\User\TransferController::class, 'progress'])->name('user.transfer.progress');

        Route::get('/transfers/complete', [App\Http\Controllers\User\TransferController::class, 'complete'])->name('user.transfer.complete');

    });

});

require __DIR__ . '/auth.php';

// Route::get('/about-us', function(){

//     return view('about');

// });

// Route::get('/services', function(){

//     return view('services');

// });

// Route::get('/contact-us', function(){

//     return view('contact');

// });

// Route::get('/coming-soon', function(){

//     return view('coming-soon');

// });

// Route::post('/contact-us', [App\Http\Controllers\ContactController::class, 'store'])->name('user.contact.store');

Route::get('/test', function () {
    Artisan::call('storage:link');
    echo 'Symlink process successfully completed';
});
