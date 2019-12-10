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

//middleware khusus guest
Route::group(['middleware' => 'guest'], function(){
	//landing page
	Route::get('/', function () {
	    return view('homepage');
	});
	//route untuk cek register
	Route::post('/checkRegister', 'UserController@doRegistration');
	//route untuk autentikasi login
	Route::post('/login','UserController@doLogin');
	//route untuk halaman login
	Route::get('/login', function () {
	    return view('login');
	});
	//route untuk halaman register
	Route::get('/register', function () {
	    return view('register');
	});
});

//route untuk logout
Route::get('/logout','UserController@doLogout');
//route untuk cek dashboard admin/member setelah login
Route::get('/dashboard','UserController@dashboard');

//middleware khusus member
Route::group(['middleware' => 'member'], function(){
	//route untuk halaman awal update profile
	Route::get('/updateProfile', function(){
		$user = App\User::find(Auth::id());
		return view('member.updateProfile',['user' => $user]); 
	});
	Route::post('/checkUpdate', 'UserController@doUpdate');
	//route memunculkan list phone pertama kali
	Route::get('/phoneList', function(){
		$phones = App\Phone::simplePaginate(8);
		$search = '';
		$selection = 'name';
		return view('member.phoneList', ['phones' => $phones, 'search' => $search, 'selection' => $selection]);
	});
	//route memunculkan list phone yang sudah terfilter oleh search
	Route::post('/phoneList', 'PhoneController@show');
	//route untuk halaman awal cart
	Route::get('/addToCart', 'AddToCartController@index');
	//route untuk memasukan data kedalam cart
	Route::post('/addToCart', 'AddToCartController@insert');
	//route untuk memunculkan tampilan awal pada cart
	Route::get('/cart', 'CartController@index');
	//route untuk cek apakah user mengklik tombol payment/delete
	Route::post('/checkCart', 'CartController@checkCart');
	//route untuk menghapus cart
	Route::post('/deleteCart', 'CartController@deleteCart');
	Route::get('/getCurrentUserId', 'UserController@getCurrUserId');
	//route untuk view transactionHistory
	Route::get('/transactionHistory/{id}', function($id){
  	$header_transactions = App\HeaderTransaction::where('user_id', $id)->simplePaginate(8);
	return view('member.transactionHistory', ['header_transactions' => $header_transactions]);
	})->name('transactionHistory');
	//route untuk post pada form di view transactionHistory yang menghubungkan ke transactionDetail
	Route::post('transactionDetail', 'UserController@viewTransactionList');
});


//khusus buat admin
Route::group(['middleware' => 'admin'], function(){

//route untuk view insertPhone
Route::get('/insertPhone', function() {
	$brands = App\Brand::all();
	return view('admin.insertPhone', ['brands' => $brands]);
});

//route untuk validasi form pada insert phone
Route::post('/checkInsertPhone', 'AdminController@insertphone');

//route untuk view managePhone
Route::get('/managePhone', function(){
	$phones = App\Phone::simplePaginate(8);
	$search = '';
	$selection = 'name';
	return view('admin.managePhone', ['phones' => $phones, 'search' => $search, 'selection' => $selection]);
});

//route untuk validasi manage phone, yakni button mana yang dipencet update/delete
Route::post('/managePhone', 'AdminController@managePhone');

//route untuk view updatePhone
Route::get('/updatePhone/{id}', function($id){
	$brands = App\Brand::all();
	$targetPhone = App\Phone::find($id);
	return view('admin.updatePhone', ['brands' => $brands, 'targetPhone' => $targetPhone]);
})->name('updatePhone');

//route untuk deletephone
Route::post('/checkUpdatePhone', 'AdminController@updatephone');

//route untuk view insertBrand
Route::get('/insertBrand', function () {
	return view('admin.insertBrand');
});

//route untuk validasi form insert brand
Route::post('/checkInsertBrand', 'AdminController@insertbrand');

//route untuk view manageBrand
Route::get('/manageBrand', function(){
	$brands = App\Brand::all();
	return view('admin.manageBrand', ['brands' => $brands]);
});

//route ke manage brand
Route::post('/checkManageBrand', 'AdminController@manageBrand');

//route untuk view updateBrand
Route::get('/updateBrand/{targetId}', function($targetId){
	$targetBrand = App\Brand::find($targetId);
	return view('admin.updateBrand', ['targetBrand' => $targetBrand]);
})->name('updateBrand');

//route untuk validasi form update brand
Route::post('/checkUpdateBrand', 'AdminController@updateBrand');

//route untuk view manageBrand
Route::get('/manageBrand', function(){
	$brands = App\Brand::all();
	return view('admin.manageBrand', ['brands' => $brands]);
});

//route untuk manageBrand
Route::post('/checkManageBrand', 'AdminController@manageBrand');

//route untuk view insertMember
Route::post('/checkInsertMember', 'UserController@insertMember');

Route::get('/insertMember', function(){
	return view('admin.insertMember');
});

//route untuk view updateMember
Route::get('/updateMember/{targetId}', function($targetId){
	$targetMember = App\User::find($targetId);
	return view('admin.updateMember', ['targetMember' => $targetMember]);
})->name('updateMember');

//route untuk update member
Route::post('/checkUpdateMember', 'UserController@updateMember');

//route untuk view manageMember
Route::post('/checkManageMember', 'UserController@manageMember');

//route untuk manageMember
Route::get('/manageMember', function(){
	$users = App\User::all();
	return view('admin.manageMember',['users' => $users]);
});

//route untuk view transactionList
Route::post('checkTransactionList', 'AdminController@transactionList');

//route untuk view transactionlist pada admin
Route::get('/transactionList', function(){
	$header_transactions = App\HeaderTransaction::all();
	return view('admin.transactionList', ['header_transactions' => $header_transactions]);
});

//route ke transactionlist dan dapat menghitung totalQty dan totalprice
Route::get('/viewTransactionList', 'AdminController@viewTransactionList');

//route untuk view transactionDetail
Route::post('checkTransactionDetail', 'AdminController@transactionList');

//route pada back button
Route::post('/return', 'AdminController@back');

});