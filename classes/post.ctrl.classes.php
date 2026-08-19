<?php

class PostCtrl extends Post{
    private $username;
    private $title;
    private $content;
    private $id;

    public function __construct($username, $title = null, $content = null, $id = null){
        $this->username = $username;
        $this->title = $title;
        $this->content = $content;
        $this->id = $id;
    }

    public function createPostUser(){
        if($this->emptInput() == false) {
            header("location: ../index.php?error=emptyInput")
            exit();
        }

        $this->createPost($this->username, $this->title, $this->content);
    }

    // Updating post
    public function updatePostUser(){
        if($this->emptInput() == false){
            header("location: ../index.php?error=emptyInput");
            exit();
        }

        $post = $this->getPost($this->id);
        if(!$post){
            header("location: ../index.php>error=postNotFound");
            exit();
        }

        if($post['username'] !== $this->username){
            header("location: ../index.php?error=unauthorized");
            exit();
        }

        $this->updatePost($this->title, $this->content, $this->id);
    }

    // Deleting post
    public function deletePostUser(){
        $post = $this->getPost($this->id);
        if(!$post){
            header("location: ..index.php?error=postNotFound");
            exit();
        }

        if($post['username'] !== $this->username){
            header("location: ../index.php?error=unauthorized");
            exit();
        }

        $this->deletePost($this->id, $this->username);
    }

    private function emptInput(){
        if(empty($this->title) || empty($this->content)){
            return false;
        }

        return true;
    }

    public function fetchPosts() {
        return $this->getAllPosts();
    }

    public function fetchSinglePost() {
        return $this->getPost($this->id);
    }
}