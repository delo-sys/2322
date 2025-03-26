<?php

class Comment{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    // Get comments from a post
    public function getCommentsByPost($postId) {
        $this->db->query("SELECT
                            c.*,
                            u.username
                        FROM
                            comments c
                        JOIN
                            users u ON c.user_id = u.id
                        WHERE
                            c.post_id = :post_id
                        ORDER BY
                            c.created_at DESC
                        ");
        $this->db->bind(':post_id', $postId);
        return $this->db->resultSet();
    }

    // Add comment  
    public function addComment($data){
        $this->db->query("INSERT INTO comments (content, post_id, user_id) VALUES(:content, :post_id, :user_id, )");
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':post_id', $data['post_id']);
        $this->db->bind(':user_id', $data['user_id']);
     
        
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    // delete comment   
    public function deleteComment($id){
        $this->db->query("DELETE FROM comments WHERE id = :id");
        $this->db->bind(':id', $id);
        
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}