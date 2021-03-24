<?php

include("connexion.php");
include("fonction.php");

  if (isset($_POST['add'])) {
    $id = $_POST['id'];

    $sql = 'SELECT quantite FROM emplacement WHERE id_produit = '.$id.';';
    $sth = $bdd -> prepare($sql);
    $sth -> execute();
    $res = $sth -> fetch(PDO::FETCH_ASSOC);

    $qte = $res['quantite'] + $_POST['qte'];

    $sql = 'UPDATE emplacement SET quantite = '.$qte.' WHERE id_produit = '.$id.';';
    $sth = $bdd -> prepare($sql);
    $sth -> execute();
    header("Refresh:0 ;url=".$_SERVER["HTTP_REFERER"]);

  } elseif (isset($_POST['remove'])){
    $id = $_POST['id'];

    $sql = 'SELECT quantite FROM emplacement WHERE id_produit = '.$id.';';
    $sth = $bdd -> prepare($sql);
    $sth -> execute();
    $res = $sth -> fetch(PDO::FETCH_ASSOC);

    $qte = ($res['quantite'] - $_POST['qte']) < 0 ? 0 : ($res['quantite'] - $_POST['qte']) ;


    $sql = 'UPDATE emplacement SET quantite = '.$qte.' WHERE id_produit = '.$id.';';
    $sth = $bdd -> prepare($sql);
    $sth -> execute();
    header("Refresh:0 ;url=".$_SERVER["HTTP_REFERER"]);
  }

?>
