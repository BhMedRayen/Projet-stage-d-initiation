<?php
include 'connexion.php';
session_start();
if(isset($_POST['login']))
{
    $mail=$_POST['mail'];
    $requete = $pdo->prepare("SELECT * FROM `admin` where mail=:mail");
    $requete->execute(['mail'=>$mail]);
    $admin=$requete->fetch();
    if($mail==$admin['mail'])
    {
        if($admin['password']==$_POST['password']){
           $_SESSION['id']=$admin['id_admin'];
           header("location:magasin.php");
         
           exit;
        }
        else{
            header("location:login.php?msg=password ou mail est incorrect");
        }
    }else{
        header("location:login.php?msg=mail est incorrect");
    }
}
include 'login.phtml';
?>