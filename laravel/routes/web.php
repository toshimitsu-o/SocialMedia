<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
    $sql = "select * from Post";
    $posts = get_posts();
    return view('app')->with('posts', $posts);
});

function get_posts() {
    $sql = "
    select Post.id, Post.title, User.name as author, Post.message, Post.date
    from Post, User
    where Post.author = User.id";
    $posts = DB::select($sql);
    return $posts;
}