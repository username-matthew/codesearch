<?php 
require_once("../functions/functions.php");  
include_once('../db/dbconnect.php');

require '../controllers/fetchall.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $q = $pdo->prepare('SELECT * FROM notes WHERE id=:id');
    $q->bindValue(':id', $id, PDO::PARAM_INT);
    $q->execute();
    
    while($row=$q->fetch(PDO::FETCH_ASSOC))
    {
        $image=$row['image'];
    }
    unlink($image);

    $stmt = $pdo->prepare('DELETE FROM notes WHERE id=:id');    
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $count = $stmt->rowCount();
        if($count>0)
        {   
            header('Location: ../');
        }else
        {
            echo "Error in delete";
        }
        $dbo = null;
}