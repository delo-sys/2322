<?php

$pageTitle= 'Home';

require_once 'include/header.php';

// Instantiate post
$post = new post();

// Get Posts
$posts=$post->getPost();

?>

<h1>Lastest Blog Posts</h1>

<div class="posts">
    <?php foreach ($posts as $post): ?>
        <article class="post-card">
            <header class="post-header">
            <h2>
                <a href="<?php echo BASE_URL;?>/post.php/slug<?php $post->slug;?>">
                    <php echo $post->title; ?>
                </a>
            </h2>
            <div class="post-meta">
                <span>posted by <?php $post>username; ?></span>
                
                <span>on<?php date('F j,Y,strotime($post->create_at)'); ?></span>
                <span>In <a href="<?php echo BASE_URL;?>/category.php?slug=<?php echo strtolower(str_replace('','-', $post->category))?>"><?php echo $post->category;?> </a></span>
            </div>
            </header>
            <div class="post-excerpt">
                <?php
                // show excerpt (first 200 character of content)
                echo substr(strip_tags($post->content),0,200).'...';
                ?>
            </div>
            <footer class="post-footer">
            <a href="<?php echo BASE_URL;?>/post.php?slug=<?php echo $post->slug;?>"class="read more">Read More</a>
            </footer>
        </article>
        <?php endforeach; ?>
</div>

