<?php

require_once 'include/header.php';

// check if slug is set
if (!isset($_GET['slug'])){
    header ('location:' . BASE_URL);
    exit;
}

$slug = $_GET['slug'];

// Instantiate Category nad Post
$categoryObj =new category();
$postObj = new post();

// Get category  by slug
$category = $categoryObj->getCategoryBySlug($slug);

// check if category exists
if (!$category) {
    header ('location:' . BASE_URL);
    exit;
}

// set page title
$pageTitle = $category->name;

// Get post in category
$post =$postObj->getPostByCategory($category->id);

?>

<h1><?php echo $category->name;?>posts</h1>

<div class="posts">
    <?php if (count($posts) > 0):?>
        <?php foreach($posts as $post):?>:
            <article class="post-card">
            <header class="post-header">
                <h2>
                    <a href="<?php echo BASE_URL?>/post.php?slug=<?php echo $post->slug;?>">
                        <?php echo $post->title;?>
                    </a>
                </h2>
                <div class="post-meta">
                    <span>posted by <?php echo $post->username;?></span>
                    <span>on <?php echo  date('Fj,Y',strtotime($post->create_at));?></span>
                </div>
            </header>
            <div class="post-exerpt">
                <?php echo substr(strip_tags($post->content),0,200). '...' ; ?>
            </div>
            <footer class="post-footer">
                <a href="<?php echo BASE_URL; ?>/post.php?slug=<?php echo $post->slug;?>"class="read-more">Read-more</a>
            </footer>
            </article>
        <?php endforeach ?>
    <?php else: ?>
        <p>No post found in  this category .</p>
        <?php endif; ?>
</div>

<?php require_once 'include/footer.php';?>