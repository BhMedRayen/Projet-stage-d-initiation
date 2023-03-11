<?php
    include 'connexion.php';
    if(array_key_exists('id',$_GET)){
    $id=$_GET['id'];
    $query=$pdo->prepare('select * from produit_magasin where id_produit=:id');
    $query->execute(['id'=>$id]);
    $produits=$query->fetch();
    }
    if(isset($_POST['update'])){
        $id=$_POST['id'];
        $code_article=$_POST['code_article'];
        $code_mag=$_POST['code_mag'];
        $Emplacement=$_POST['Emplacement'];
        $designation=$_POST['Designation'];
        $prix=$_POST['prix'];
        $date_entree=$_POST['date_entree'];
        $quantite=$_POST['quantite'];
        $requete=$pdo->prepare("UPDATE produit_magasin SET `code_article`=:code_article ,`Emplacement`=:Emplacement,`designation`=:designation,`code_mag`=:code_mag,`prix`=:prix,`date_entree`=:date_entree,`quantité`=:quantite where id_produit=:id");
        $requete->execute([
             'id'=>$id,
             'code_article'=>$code_article,
             'Emplacement'=>$Emplacement,
             'designation'=>$designation,
             'code_mag'=>$code_mag,
             'prix'=>$prix,
             'date_entree'=>$date_entree,
             'quantite'=>$quantite
            ]);
            header("location:magasin.php?msg=edit succes");
            exit();
    
 }
    include 'update.phtml';

?>
