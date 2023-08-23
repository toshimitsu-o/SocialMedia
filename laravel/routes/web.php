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
    $uid = session('uid');
    $uname = session('uname');
    return view('app')->with('posts', $posts)->with('uname', $uname);
});

Route::get('post/{id}', function($id) {
    $post = get_post($id);
    $comments = get_comments($id);
    return view('post.post_details')->with('post', $post)->with('comments', $comments);
});

Route::post('add_post_action', function() {
    $author = request('author');
    $title = request('title');
    $message = request('message');

    $uid = session('uid');
    if (!$uid) {
        $uid = add_user($author);
    }
    
    $id = add_post($title, $uid, $message);
    if ($id) {
        return redirect(url("/"));
    } else {
        die("Error while adding post.");
    }
});

function get_posts() {
    $sql = "
    select Post.id, Post.title, User.name as author, Post.message, Post.date
    from Post, User
    where Post.author = User.id
    order by Post.date desc";
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
    select Comment.id, Comment.postId, User.name as author, Comment.message, Comment.date, Comment.replyTo
    from Comment, User
    where postId = ? and Comment.author = User.id";
    $comments = DB::select($sql, [$id]);
    return $comments;
}

function add_post($title, $author, $message) {
    $date = date('Y-m-d h:i:s', time());
    $sql = "insert into Post (title, author, message, date) values (?, ?, ?, ?)";
    DB::insert($sql, [$title, $author, $message, $date]);
    $id = DB::getPdo()->lastInsertId();
    return $id;
}

function get_user($id) {
    $sql = "select name from User where id = ?";
    $name = DB::select($sql, [$id]);
    return $name;
}

function add_user($name) {
    $sql = "insert into User (name) values (?)";
    DB::insert($sql, [$name]);
    $id = DB::getPdo()->lastInsertId();
    session(['uid' => $id]);
    session(['uname' => $name]);
    return $id;
}