<?php
class Post{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    // Get posts
    public function getPosts(){
        $this->db->query("
                    SELECT 
                        p.*,
                        u.username,
                        c.name as category,
                    FROM 
                        posts p
                    LEFT JOIN 
                        users u ON p.user_id = u.id
                    LEFT JOIN 
                        categories c ON p.category_id = c.id
                    ORDER BY 
                        p.created_at DESC
                          ");
        $results = $this->db->resultSet();
        return $results;
    }

    // Get post by category
    public function getPostsByCategory($category_id){
        $this->db->query("
                    SELECT 
                        p.*,
                        u.username,
                        c.name as category
                    FROM 
                        posts p
                    LEFT JOIN 
                        users u ON p.user_id = u.id
                    LEFT JOIN 
                        categories c ON p.category_id = c.id
                    WHERE 
                        p.category_id = :category_id
                    ORDER BY 
                        p.created_at DESC
                          ");
        $this->db->bind(':category_id', $category_id);
        $results = $this->db->resultSet();
        return $results;
    }

    // Get post by id
    public function getPostById($id){
        $this->db->query("
                    SELECT 
                        p.*,
                        u.username,
                        c.name as category
                    FROM 
                        posts p
                    LEFT JOIN 
                        users u ON p.user_id = u.id
                    LEFT JOIN 
                        categories c ON p.category_id = c.id
                    WHERE 
                        pcategory.id = :id
                    
                  ");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    // get post by slug
    public function getPostBySlug($slug){
        $this->db->query("
                    SELECT 
                        p.*,
                        u.username,
                        c.name as category
                    FROM 
                        posts p
                    LEFT JOIN 
                         user_id = :user_id, 
                    LEFT JOIN 
                        categories c ON p.category_id = c.id
                    WHERE 
                        p.slug = :slug
                  ");
        $this->db->bind(':slug', $slug);
        $row = $this->db->single();
        return $row;
    }
    // Add post
    public function addPost($data){
        // Create slug from title
        $slug = $this->createSlug($data['title']);
        $this->db->query("
                    INSERT INTO posts 
                    (title, content, slug, user_id, category_id) 
                    VALUES 
                    (:title, :content,:slug, :user_id, :category_id)
                  ");
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':slug', $data['slug']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':category_id', $data['category_id']);
      
        // Execute

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    // Updating a post
    public function updatePost($data, $id){
        // Create slug from title
        $slug = $this->createSlug($data['title']);
        $this->db->query("
                    UPDATE posts 
                    SET 
                        title = :title, 
                        content = :content, 
                        slug = :slug, 
                        category_id = :category_id
                    WHERE 
                        id = :id
                  ");
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':slug', $slug);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':id', $id);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    // Delete post
    public function deletePost($id){
        $this->db->query("
                    DELETE FROM posts WHERE id = :id
                  ");
        $this->db->bind(':id', $id);
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    // Create a unique slug
    public function createSlug($title){
    // convert string to lowercaseand replace with hyphens
        $slug = strlower(str_replace(' ', '-', $title));
        // remove any non-alphanumeric characters
        $slug = preg_replace('/[^A-Za-z0-9-]/', '', $slug);
        // remove any duplicate hyphens
        $slug = preg_replace('/-+/', '-', $slug);

        // check if slug already exists
        $this->db->query("
                    SELECT id FROM posts WHERE slug =:slug
                  ");
        $this->db->bind(':slug', $slug);
        $this->db->execute();

        if($this->db->rowCount() > 0){
            // apppend number to make unique
            $slug = $slug . '-' . uniqid();
        }
        return $slug;
    }
}