<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
global $DBH;
require 'dbConnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['title']) && isset($_POST['description']) && $_FILES['file'] != null) {
        $filename = $_FILES['file']['name'];
        $filetype = $_FILES['file']['type'];
        $filesize = $_FILES['file']['size'];
        $filetmp = $_FILES['file']['tmp_name'];
        $destination = __DIR__ . '/uploads/' . $filename;
        if (!move_uploaded_file($filetmp, $destination)) {
            header('Location: index.php?success=File upload failed');
        }

        $data = [
            'user_id' => 1,
            'filename' => $filename,
            'media_type' => $filetype,
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'filesize' => $filesize,
        ];

        $sql = 'INSERT INTO MediaItems (user_id, filename, filesize, media_type, title, description) 
                VALUES (:user_id, :filename, :filesize, :media_type, :title, :description)';

        try {
            $STH = $DBH->prepare($sql);
            $STH->execute($data);
            header('Location: index.php?success=Item added');
        } catch (PDOException $e){
            echo "Could not insert data into the database.";
            file_put_contents('PDOErrors.txt', 'insertData.php - ' . $e->getMessage(), FILE_APPEND);
        }
    }
}