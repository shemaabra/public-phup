<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

    // Raw Queries in laravel10
    // $user = DB::select("select * from users");
    // $users = DB::insert("insert into users(name, email, password) values(?,?,?)", ['example', 'example@gmail.com', 'examplePassword']);
    // $update  = DB::update("update users set email='exa@gmail.com' where id=6");
    // $users = DB::delete("delete from users where id=6");
    // dd($user); // dump and die

    //Query Builder
    // $users = DB::table('users')->first(); // list all users
    // $user = DB::table('users')->insert([
    //     'name'=>'am',
    //     'email'=> 'am@gmail.com',
    //     'password'=> 'password',
    // ]); // creating new users
    // $user = DB::table('users')->where('id', 8)->update(['email'=>'abc@gmail.com']); // update details
    // $user = DB::table('users')->where('id', 8)->delete(); // delete detail

    //Model
    // $users = User::get();
    // $user = User::create(
    //     [
    //             'name'=>'azhaaaa',
    //             'email'=> 'azhaaaa@gmail.com',
    //             'password' => 'password',
    //         ]
    // );
    // $user = User::where('id', 10)->update(['name'=> 'cdf']);
    $user = User::find(18);
    // $user->update(['name'=> 'kisengo']);
    // $user->delete();
    dd($user->name);

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
