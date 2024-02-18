<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\DB;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');

    // select all users
    // $users = DB::select("select * from users");

    // $users = DB::table('users')->get();
    // $users = DB::table('users')->first();
    // $users = DB::table('users')->find(2);
    
    $users = User::all();

    // create new user
    // $user = DB::insert("insert into users (name, email, password) values (?,?,?)", ['Ungku', 'ungku@gmail.com', 'ungkuzainab']);
    
    // $user = DB::table('users')->insert([
    //     'name' => 'Ungku',
    //     'email' => 'ungku@gmail.com',
    //     'password' => 'ungku10'
    // ]);

    // $user = User::create([
    //     'name' => 'Ungku',
    //     'email' => 'ungku@gmail.com',
    //     'password' => 'ungku10'
    // ]);
    
    // update a user
    // $user = DB::update("update users set name = ? where id = ?", ['zainab', 2]);

    // $user = DB::table('users')->where('id', 3)->update(['name'=>'ungku']);
    
        // $user = User::where('name', 'zainab')->update([
        //     'email' => 'zainab@gmail.com'
        // ]);

    // delete a user
    // $user = DB::delete("delete from users where id = ?", [2]);
    
    // $user = DB::table('users')->where('id', 3)->delete();

    // $user = User::where('id', 4)
    // $user = User->delete();

    dd($users);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
