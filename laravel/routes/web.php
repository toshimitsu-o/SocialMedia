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

Route::get('/', function() {
    $posts = get_posts();
    return view('app')->with('posts', $posts);
});

Route::get('post/{id}', function($id) {
    $post = get_post($id);
    $comments = get_comments($id);
    return view('post.post_details')->with('post', $post)->with('comments', $comments);
});

function get_posts() {
    $sql = "
    select Post.id, Post.title, User.name as author, Post.message, Post.date
    from Post, User
    where Post.author = User.id";
    $posts = DB::select($sql);
    return $posts;
}

function get_post($id) {
    $sql = "
    select Post.id, Post.title, User.name as author, Post.message, Post.date
    from Post, User
    where Post.id = ? and Post.author = User.id";
    $posts = DB::select($sql, [$id]);
    if (count($posts) != 1) {
        die("Something has gone wrong, invalid query or result: $sql");
    }
    return $posts[0];
}

function get_comments($id) {
    $sql = "
    select *
    from Comment
    where postId = ?";
    $comments = DB::select($sql, [$id]);
    return $comments;
}