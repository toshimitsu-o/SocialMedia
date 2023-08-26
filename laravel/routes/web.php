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
    $uname = session('uname');
    return view('post.post_details')->with('post', $post)->with('comments', $comments)->with('uname', $uname);
});

Route::post('add_post_action', function() {
    $author = request('author');
    $title = request('title');
    $message = request('message');

    $errors = validate_post($title, $author, $message);
    if ($errors) {
        return back()->with('errors', $errors);
    }

    $uid = handle_user($author);
    
    $id = add_post($title, $uid, $message);
    if ($id) {
        return redirect(url("/"));
    } else {
        die("Error while adding post.");
    }
});

Route::post('edit_post_action', function() {
    $title = request('title');
    $message = request('message');
    $id = request('id');

    edit_post($id, $title, $message);
    return redirect(url("post/$id"));
});

Route::get('delete_post/{id}', function($id) {
    delete_post($id);
    return redirect(url("/"));
});

Route::post('add_comment_action', function() {
    $postId = request('postId');
    $author = request('author');
    $message = request('message');

    $uid = handle_user($author);
    add_comment($postId, $uid, $message);
    return redirect(url("post/$postId"));
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
*/

/* Input Validation */

function validate_post($title, $author, $message) {
    $errors = array();

    if (strlen($title) < 3) {
        $errors[] = "Title must have at least 3 characters.";
    }
    if (strlen($author) < 1) {
        $errors[] = "Author must not be empty.";
    }
    if (preg_match('~[0-9]+~', $author)) {
        $errors[] = "Author must not have numeric characters.";
    }
    if (str_word_count($message, 0) < 5) {
        $errors[] = "Message must have at least 5 words.";
    }

    return $errors;
}

/* User */

function handle_user($name) {
    $uid = session('uid');
    if (!$uid) {
        $uid = add_user($name);
    }
    return $uid;
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

/* Post */

function get_posts() {
    $sql = "
    select Post.id, Post.title, User.name as author, Post.message, Post.date, count(Comment.id) as commentsCount
    from Post
    left join User on Post.id = User.id
    left join Comment on Post.id = Comment.postId
    group by Post.id
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

function add_post($title, $author, $message) {
    $date = date('Y-m-d h:i:s', time());
    $sql = "insert into Post (title, author, message, date) values (?, ?, ?, ?)";
    DB::insert($sql, [$title, $author, $message, $date]);
    $id = DB::getPdo()->lastInsertId();
    return $id;
}

function edit_post($id, $title, $message) {
    $date = date('Y-m-d h:i:s', time());
    $sql = "update Post set title = ?, message = ?, date = ? where id = ?";
    DB::update($sql, [$title, $message, $date, $id]);
}

function delete_post($id) {
    $sql = "delete from Like where postId = ?";
    DB::delete($sql, [$id]);
    $sql = "delete from Comment where postId = ?";
    DB::delete($sql, [$id]);
    $sql = "delete from Post where id = ?";
    DB::delete($sql, [$id]);
}

/* Comment */

function get_comments($id) {
    $sql = "
    select Comment.id, Comment.postId, User.name as author, Comment.message, Comment.date, Comment.replyTo
    from Comment, User
    where postId = ? and Comment.author = User.id";
    $comments = DB::select($sql, [$id]);
    return $comments;
}

function add_comment($postId, $author, $message) {
    $date = date('Y-m-d h:i:s', time());
    $sql = "insert into Comment (postId, author, message, date) values (?, ?, ?, ?)";
    DB::insert($sql, [$postId, $author, $message, $date]);
    $id = DB::getPdo()->lastInsertId();
    return $id;
}

