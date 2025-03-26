<?php

require_once 'include/header.php';

// check if slug is set 
if(!isset($_GET['slug'])) {
    header ('location:' . BASE_URL);
    exit;
}

$slug = $_GET['slug'];

// Insatantiate past and comment
$postObj = new Post ();
$commentObj = new Comment();

// get post 
$post = $postObj->getPostBySlug();

// check if post exists
if (!$post) {
    header('location:' . BASE_URL);
}

// Set page title
$pageTitle = $post->title;

// get comment
$comments - $commentObj->getCommentByPost($post->id);

// process comment form submission 
if ($_SERVER['REQUEST_METHOD']== 'POST'&& isset($_SESSION['user_id'])) {
    // validate comment
    if (empty($_POST['content'])) {
        $error= 'comment cannot be empty';
    }else{
        // prepare comment data
        $commentData = [
            'content'=> htmlspecialchars($_POST['content']),
            'post_id'=> $post->id,
            'user-id'=>$_SESSION['user_id']
        ];

        // add comment
        if ($commentObj->addcomment($commentData)) {
            // redirect to refresh the page and updated comments
            header('location:' . BASE_URL . 'post.php?slug='.$slug);
            exit;
        }else{
            $error ='something went wrong';
        }
    }
}

?>