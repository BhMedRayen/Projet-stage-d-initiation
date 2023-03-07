<?php
include 'connexion.php';

require './fpdf/fpdf.php';


session_start();
if (!isset($_SESSION['id'])) {
    header("location:login.php");
    exit;
}
$requete = $pdo->prepare('SELECT * FROM produit_magasin');
$requete->execute();
$produits = $requete->fetchAll();

if (array_key_exists('id_delete', $_GET)) {
    $id = $_GET['id_delete'];
    $requete3 = $pdo->prepare('DELETE from produit_magasin where id_produit=:id');
    $requete3->execute(['id' => $id]);
}

if (isset($_GET['id_pdf'])) {
    ob_start();
    $id = $_GET['id_pdf'];
    $req = $pdo->prepare('select * from produit_magasin where id_produit=:id');
    $req->execute(['id' => $id]);
    $produit = $req->fetch();
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 16);
    $pdf->cell(0, 20, "Code Article" . $produit['code_article'], 1, 0, 'C');
    $pdf->Cell(59, 30, '', 0, 1);
    $pdf->Ln();
    $pdf->Cell(220, 10, '', 0, 1);
    $pdf->Cell(50, 10, '', 0, 1);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(15, 10, "#", 1, 0, 'C');
    $pdf->Cell(30, 7, "Code article", 1, 0, 'C');
    $pdf->Cell(30, 7, "Emplacement", 1, 0, 'C');
    $pdf->Cell(30, 7, "designation", 1, 0, 'C');
    $pdf->Cell(30, 7, "Code mag", 1, 0, 'C');
    $pdf->Cell(30, 7, "Prix", 1, 0, 'C');
    $pdf->Cell(30, 7, "Date entree", 1, 1, 'C');
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(15, 7, $produit['id_produit'], 1, 0, 'C');
    $pdf->Cell(30, 7, $produit['code_article'], 1, 0, 'C');
    $pdf->Cell(30, 7, $produit['Emplacement'], 1, 0, 'C');
    $pdf->Cell(30, 7, substr($produit['designation'], 0, 10) . '...', 1, 0, 'C');
    $pdf->Cell(30, 7, $produit['code_mag'], 1, 0, 'C');
    $pdf->Cell(30, 7, $produit['prix'], 1, 0, 'C');
    $pdf->Cell(30, 7, $produit['date_entree'], 1, 1, 'C');
    $pdf->Cell(165, 6, "", 0, 0);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(30, 7, "Quantity", 1, 1, 'C');
    $pdf->Cell(165, 6, "", 0, 0);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(30, 7, $produit['quantité'], 1, 1, 'C');
    $file_name = $produit['code_article'] . rand(10, 9999) . ".pdf";
    $pdf->Output("./facture/" . $file_name, "F");
    ob_end_flush();
}

include 'magasin.phtml';
