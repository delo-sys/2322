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

<article class="single-post">
    <header class="post-header">
        <h1><?php echo $post->title;?></h1>
        <div class="post-meta">
        <span>posted by <?php $post>username; ?></span>
                
                <span>on<?php date('F j,Y,strotime($post->create_at)'); ?></span>
                <span>In <a href="<?php echo BASE_URL;?>/category.php?slug=<?php echo strtolower(str_replace('','-', $post->category))?>"><?php echo $post->category;?> </a></span>
        </div>
    </header>
    <div class="post-content">
        <?php echo nl2br($post->content);?>
    </div>
</article>

<section class="comment-section">
    <h2>comments (<?php echo count ($comments);?>) </h2>

    <?php if(isset($_SESSION['user_id'])):?>
        <div class="comment-form">
            <h3>leave a comment<h3>
                <?php if (isset($error)):?>
                    <div class="alert alert-danger"><?php echo $error;?></div>
                    <?php endif; ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <textarea name="content" rows="4" placeholder="write your comment here.."required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn">submit comment</button>
                        </div>
                    </form>
        </div>
    <?php else:?>
            <p><a href="">login</a>leave a comment .</p>
    <?php endif;?>

    <div class="comment-list">
        <?php if (count($comments) > 0 ) : ?>
            <?php foreach ($comments as $comment):?>
                <div class="comment">
                    <div class="comment-header">
                        <span class="comment-author"><?php echo $comment->username;?></span>
                        <span class="comment-date"><?php echo date('Fj,Y/a/t g:I:a', strotime($comment->created_at));?></span>
                    </div>
                    <div class="comment-content">
                        <?php echo nl2br($comment->content);?>
                    </div>
                </div>
            <?php endforeach;?>
        <?php else: ?>
            <p>no comments yet . Be the first to comment!</p>
        <?php endif ?>
    </div>
</section>

<?php require_once 'include/footer.php';?>