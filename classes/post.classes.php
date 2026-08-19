<?php

class Post extends Dbh{
    protected function createPost($username, $title, $content){
        $stmt = $this->connect()->prepare("INSERT INTO posts (username, title, content) VALUES (?, ?, ?);");
        if(!$stmt->execute(array($username, $title, $content))){
            $stmt = null;
            header("location: ../index.php?error=stmtFailed");
            exit();
        }
        $stmt = null;
    }

    // Get all posts

    protected function getAllPosts(){
        $stmt = $this->connect()->prepare("SELECT * FROM posts ORDER BY created_num DESC;");
        if(!$stmt->execute()){
            $stmt = null;
            header("location: ../index.php?error=stmtFailed");
            exit();
        }
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

        // Get single Post
    protected function getPost($id){
        $stmt = $this->connect()->prepare("SELECT * FROM posts WHERE id = ?");
        if(!$stmt->execute($id)){
            $stmt = null;
            header("location: ../index.php?error=stmtFailed");
            exit();
        }

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //Update Post
    protected function updatePost($title, $content, $id){
        $stmt = $this->connect()->prepare("UPDATE posts SET title = ?, content = ?, WHERE id = ?;");
        if(!$stmt->execute(array($title, $content, $id))){
            $stmt = null;
            header("location: ../index.php?error=stmtFailed");
            exit();
        }
        $stmt = null;
    }

    // Delete post
    protected function deletePost($id, $username){
        $stmt = $this->connect()->prepare("DELETE FROM posts WHERE id = ? AND username = ?;");
        if(!$stmt->execute(array($id, $username))){
            $stmt = null;
            header("location: ../index.php?error=stmtFailed");
            exit();
        }

        $stmt = null;
    }
}
