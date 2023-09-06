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

/**
 * Home: list all posts
 */
Route::get('/', function() {
    $posts = get_posts();
    $uid = session('uid');
    $uname = session('uname');

    return view('app')->with('posts', $posts)->with('uname', $uname);
});

/**
 * Post Details: list a post with details
 */
Route::get('post/{id}', function($id) {
    $post = get_post($id);
    $comments = get_comments($id);
    $uname = session('uname');
    $uid = session('uid');
    $like = check_like($id, $uid);
    //dd($comments);
    return view('post.post_details')->with('post', $post)->with('comments', $comments)->with('uname', $uname)->with('uid', $uid)->with('like', $like);
});

/**
 * User List: list all users who have posts
 */
Route::get('users', function() {
    $users = get_users();
    return view('user_list')->with('users', $users);
});

/**
 * User's Posts: list all posts belong to the user
 */
Route::get('user/{id}', function($id) {
    $user = get_user($id);
    $posts = get_posts_by_user($id);
    return view('posts_by_user')->with('user', $user)->with('posts', $posts);
});

/**
 * User Profile: display user's details
 */
Route::get('userprofile', function() {
    $uid = session('uid');
    $uname = session('uname');
    return view('user_profile')->with('uname', $uname)->with('uid', $uid);
});

/**
 * Logout: flush session to logout
 */
Route::get('logout', function() {
    session()->flush();
    return back();
});

/**
 * Like: display user name form for a new user to submit a like
 */
Route::get('like/{id}', function($id) {
    $post = get_post($id);
    $uname = session('uname');
    return view('like.like_new_user')->with('post', $post)->with('uname', $uname);
});

/**
 * Add Post: process a new post request
 */
Route::post('add_post_action', function() {
    $author = request('author');
    $title = request('title');
    $message = request('message');

    $errors = validate_post($title, $message, $author);
    if ($errors) {
        return back()->with('errors',$errors)->withInput();
    }

    $uid = handle_user($author);
    
    $id = add_post($title, $uid, $message);
    if ($id) {
        return redirect(url("/"));
    } else {
        die("Error while adding post.");
    }
});

/**
 * Edit Post: process a post update request
 */
Route::post('edit_post_action', function() {
    $author = request('author');
    $title = request('title');
    $message = request('message');
    $id = request('id');

    $errors = validate_post($title, $message, "", true);
    if ($errors) {
        return back()->with('errors',$errors)->withInput();
    }

    edit_post($id, $title, $message);
    return redirect(url("post/$id"));
});

/**
 * Delete Post: process a post deletion request
 */
Route::get('delete_post/{id}', function($id) {
    delete_post($id);
    return redirect(url("/"));
});

/**
 * Add Comment: process a new comment request
 */
Route::post('add_comment_action', function() {
    $postId = request('postId');
    $author = request('author');
    $message = request('message');
    $replyTo = request('replyTo');

    $errors = validate_comment($message, $author);
    if ($errors) {
        return back();
    }

    $uid = handle_user($author);
    $id = add_comment($postId, $uid, $message, $replyTo);

    if ($id) {
        return redirect(url("post/$postId"));
    } else {
        die("Error while adding a like.");
    }
});

/**
 * Add Like: process a like request
 */
Route::post('like_action', function() {
    $postId = request('postId');
    $author = request('author');
    $uid = session('uid');
    if ($author) {
        $uid = handle_user($author);
    } else if (!$uid) {
        return redirect(url("like/$postId"));
    }

    set_like($postId, $uid);
    return redirect(url("post/$postId"));
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
*/

/**
 * Validate user input for a post.
 * 
 * @param string $title Post title
 * @param string $author Post author name
 * @param string $message Post message
 * 
 * @return array Array of error messages
 */
function validate_post($title, $message, $author = null, $isEdit = false) {
    $errors = array();

    if (strlen($title) < 3) {
        $errors[] = "Title must have at least 3 characters.";
    }
    if (!$isEdit && strlen($author) < 1) {
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

/**
 * Authenticate user and add them if they are new.
 * 
 * @param string $name User name
 * 
 * @return int UserID
 */
function handle_user($name) {
    $uid = session('uid');
    if (!$uid) {
        $uid = add_user($name);
    }
    return $uid;
}

/**
 * Retrieve all users from database.
 * 
 * @return array Array of user objects
 */
function get_users() {
    $sql = "
    select User.id, User.name, count(Post.author) as postCount
    from User
    inner join Post on User.id = Post.author
    group by User.id
    ";
    $users = DB::select($sql);
    return $users;
}

/**
 * Retrieve a username that matches with the id from database.
 * 
 * @param int $id User ID
 * 
 * @return object User object
 */
function get_user($id) {
    $sql = "select * from User where id = ?";
    $users = DB::select($sql, [$id]);
    return $users[0];
}

/**
 * Retrieve UserID that matches with the username from database.
 * 
 * @param string $name Username
 * 
 * @return int UserID
 */
function find_user($name) {
    $sql = "select id from User where name = ?";
    $ids = DB::select($sql, [$name]);
    if (empty($ids)) {
        return null;
    }
    return $ids[0]->id;
}

/**
 * Add a new user with a username to database and register it in a session.
 * 
 * @param string $name Username
 * 
 * @return int UserID
 */
function add_user($name) {
    $sql = "insert or ignore into User (name) values (?)";
    DB::insert($sql, [$name]);
    //$id = DB::getPdo()->lastInsertId();
    $id = find_user($name);
    session(['uid' => $id]);
    session(['uname' => $name]);
    return $id;
}

/* Post */

/**
 * Retrieve all posts from database.
 * 
 * @return array Array of post objects
 */
function get_posts() {
    $sql = "
    select Post.id, Post.title, Post.author as authorId, User.name as author, Post.message, Post.date,
    (select count(*) from Comment where Comment.postId = Post.id) as commentsCount,
    (select count(*) from Like where Like.postId = Post.id) as likesCount
    from Post
    inner join User on Post.author = User.id
    order by Post.date desc";
    $posts = DB::select($sql);
    return $posts;
}

/**
 * Retrieve posts that belong to the userid from database.
 * 
 * @param int $id User ID
 * 
 * @return object Post objects
 */
function get_posts_by_user($id) {
    $sql = "
    select Post.id, Post.title, Post.author as authorId, User.name as author, Post.message, Post.date,
    (select count(*) from Comment where Comment.postId = Post.id) as commentsCount,
    (select count(*) from Like where Like.postId = Post.id) as likesCount
    from Post
    inner join User on Post.author = User.id
    where Post.author = ?
    order by Post.date desc";
    $posts = DB::select($sql, [$id]);
    return $posts;
}

/**
 * Retrieve post with the id from database.
 * 
 * @param int $id Post ID
 * 
 * @return object Post object
 */
function get_post($id) {
    $sql = "
    select Post.id, Post.title, Post.author as authorId, User.name as author, Post.message, Post.date,
    (select count(*) from Comment where Comment.postId = Post.id) as commentsCount,
    (select count(*) from Like where Like.postId = Post.id) as likesCount
    from Post
    inner join User on Post.author = User.id
    where Post.id = ?";
    $posts = DB::select($sql, [$id]);
    if (count($posts) != 1) {
        die("Something has gone wrong, invalid query or result: $sql");
    }
    return $posts[0];
}

/**
 * Add a new post to database.
 * 
 * @param string $title Post title
 * @param string $author Post author
 * @param string $message Post massage body
 * 
 * @return int PostID
 */
function add_post($title, $author, $message) {
    $date = date('Y-m-d h:i:s', time());
    $sql = "insert into Post (title, author, message, date) values (?, ?, ?, ?)";
    DB::insert($sql, [$title, $author, $message, $date]);
    $id = DB::getPdo()->lastInsertId();
    return $id;
}

/**
 * Update the post in database.
 * 
 * @param string $title Post title
 * @param string $author Post author
 * @param string $message Post massage body
 */
function edit_post($id, $title, $message) {
    $date = date('Y-m-d h:i:s', time());
    $sql = "update Post set title = ?, message = ?, date = ? where id = ?";
    DB::update($sql, [$title, $message, $date, $id]);
}

/**
 * Delete the post from database.
 * 
 * @param int $id PostID
 */
function delete_post($id) {
    $sql = "delete from Like where postId = ?";
    DB::delete($sql, [$id]);
    $sql = "delete from Comment where postId = ?";
    DB::delete($sql, [$id]);
    $sql = "delete from Post where id = ?";
    DB::delete($sql, [$id]);
}

/* Comment */

/**
 * Retrieve comments of the post from database.
 * 
 * @param int $id PostID
 * 
 * @return array Array of comments
 */
function get_comments($id) {
    $sql = "
    select Comment.id, Comment.postId, Comment.author as authorId, User.name as author, Comment.message, Comment.date, Comment.replyTo
    from Comment, User
    where postId = ? and Comment.author = User.id
    order by Comment.date";
    $comments = DB::select($sql, [$id]);
    return handle_comments($comments);
}

/**
 * Convert flat comments array to nested arrays to form a reply-tocomment structure.
 * 
 * @param array $comments Array of comment objects
 * 
 * @return array Array of comments
 */
function handle_comments($comments) {
    $newComments = array();
    $handledComments = array();
    foreach ($comments as $c) {
        
            $c->replies = array();

            foreach ($comments as $d) {
                if ($d->replyTo == $c->id and !in_array($d, $handledComments)) {
                    array_push($c->replies, $d);
                    array_push($handledComments, $d);
                }
            }
        if (!$c->replyTo) {
            array_push($newComments, $c);
            array_push($handledComments, $c);
        } 
    }
    return $newComments;
}

/**
 * Add a comment to database.
 * 
 * @param int $postId PostID
 * @param int $author Post author userID
 * @param string $message Post massage body
 * @param int $replyTo CommentID replying to
 * 
 * @return int CommentID of the newly added comment
 */
function add_comment($postId, $author, $message, $replyTo) {
    $date = date('Y-m-d h:i:s', time());
    $sql = "insert into Comment (postId, author, message, date, replyTo) values (?, ?, ?, ?, ?)";
    DB::insert($sql, [$postId, $author, $message, $date, $replyTo]);
    $id = DB::getPdo()->lastInsertId();
    return $id;
}

/**
 * Validate user input comment.
 * 
 * @param string $message Comment message
 * @param string $author Username
 * 
 * @return array Array of error messages
 */
function validate_comment($message, $author) {
    $errors = array();

    if (strlen($author) < 1) {
        $errors[] = "Author must not be empty.";
    }
    if (preg_match('~[0-9]+~', $author)) {
        $errors[] = "Author must not have numeric characters.";
    }
    if (strlen($message) < 1) {
        $errors[] = "Message must not be empty.";
    }

    return $errors;
}

/* Like */

/**
 * Add a like if it's new, remove if it exists in database.
 * 
 * @param int $postId PostID
 * @param int $user UserID
 */
function set_like($postId, $user) {
    $sql = "select * from Like where postId = ? and user = ?";
    $likes = DB::select($sql, [$postId, $user]);
    if (count($likes) > 1) {
        die("Something has gone wrong, invalid query or result: $sql");
    } else if (count($likes) == 1) {
        $sql = "delete from Like where postId = ? and user = ?";
        DB::delete($sql, [$postId, $user]);
    } else {
        $sql = "insert into Like (postId, user) values (?, ?)";
        DB::insert($sql, [$postId, $user]);
    }
}

/**
 * Check if the user liked the post or not.
 * 
 * @param int $postId PostID
 * @param int $user UserID
 * 
 * @return bool
 */
function check_like($postId, $user) {
    if ($user == null) {
        return false;
    }
    $sql = "select * from Like where postId = ? and user = ?";
    $likes = DB::select($sql, [$postId, $user]);
    if (count($likes) > 1) {
        die("Something has gone wrong, invalid query or result: $sql");
    } else if (count($likes) == 1) {
        return true;
    } else {
        return false;
    }
}