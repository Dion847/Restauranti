<?php 

require_once '../models/article.php';

class ArticleController {
    
    private $conn;

    function __construct(){
        $this->conn = new DatabaseConnection();
        $this->conn = $this->conn->startConnection();
    }

    public function store($title, $description, $image)
    {
        
        $targetDir = "../uploads/";
        $targetFile = $targetDir . basename($image["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        move_uploaded_file($image["tmp_name"], $targetFile);

        $imagePath = "uploads/". basename($image["name"]);

        $sql = "INSERT INTO articles (title,description,image) VALUES (?,?,?)";

        $statement = $this->conn->prepare($sql);

        $statement->execute([$title,$description,$imagePath]);

        header("Location: ../view/dashboard/articles.php");
    }

    
    public function update($id, $title, $description, $image)
    {
        if($image)
        {
            $targetDir = "../uploads/";
            $targetFile = $targetDir . basename($image["name"]);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            move_uploaded_file($image["tmp_name"], $targetFile);
            $imagePath = "uploads/". basename($image["name"]);
        }else{
            $sql = "SELECT * FROM articles WHERE id='$id'";
            $statement = $this->conn->query($sql);
            $article = $statement->fetch();
            $imagePath = $article["image"];
        }

        $sql = "UPDATE articles SET title=?, description=?, image=? WHERE id=?";

        $statement = $this->conn->prepare($sql);

        $statement->execute([$title,$description,$imagePath, $id]);

        header("Location: ../view/dashboard/articles.php");
    }


    
    function delete($id, $path){


        unlink("../" . $path);
        $sql = "DELETE FROM articles WHERE id=?";

        $statement = $this->conn->prepare($sql);

        $statement->execute([$id]);

        header("Location: ../view/dashboard/articles.php");
   } 

}
