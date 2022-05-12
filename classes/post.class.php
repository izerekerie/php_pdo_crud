<?php
include_once 'dbconnect.class.php';

class Posts extends DbConnect{

    public function getPosts(){
        $sql="SELECT * FROM posts";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute();

        while($result=$stmt->fetchAll()){
            return $result;
        }
    }

    public function addPost($title,$body,$author){
        $sql="INSERT INTO posts(title,body,author) VALUES (?,?,?)";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([$title,$body,$author]);// those values fill ??? above
        header('location:index.php');

    }

    public function deletePost($id){
        $sql="DELETE FROM posts WHERE id=?";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([$id]);
        header('location:index.php');
    }
    public function getPost($id){
        $sql="SELECT *FROM posts WHERE id=?";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result=$stmt->fetch();
        return  $result;
    }

    public function updatePost($id,$title,$body,$author){
        $sql="UPDATE posts SET title= ?,body= ?,author= ? WHERE id= ?";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([$title,$body,$author,$id]);
        header('location:index.php');

    }
}


?>