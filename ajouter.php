<?php
include 'connexion.php';
if(!empty($_POST))
{
    $code_article=$_POST['code_article'];
    $Emplacement=$_POST['Emplacement'];
    $code_magasin=$_POST['code_mag'];
    $Designation=$_POST['Designation'];
    $prix=$_POST['prix'];
    $date=$_POST['date_entree'];
    $quantite=$_POST['quantite'];
    $sql="INSERT into produit_magasin (code_article,Emplacement,designation,code_mag,prix,date_entree,quantité) values(?,?,?,?,?,?,?)";
    $query=$pdo->prepare($sql);
    $query->execute([$code_article,$Emplacement,$Designation,$code_magasin,$prix,$date,$quantite]);
    if($query)
    {
        header("location:ajouter.php?msg=Ajout effectue");
        exit();
    }
}
include 'ajouter.phtml';
?>
