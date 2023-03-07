<?php
try
{
    $pdo = new PDO('mysql:host=localhost;dbname=stage;charsetutf8' ,'root','');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch (Exception $e)
 {
    echo "DB Connection Error: ". $e->getMessage();
    die();
 } 
?>