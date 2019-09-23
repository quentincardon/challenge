<?php
function actionGererc($twig, $db){
 $form = array();
 $gererc = new Gererc($db);
 if (isset($_POST['btGererc'])){

      $heureCons = $_POST['heure'];
      $nomCli = $_POST['nom'];
      $prenomCli = $_POST['prenom'];
      $dateCons = $_POST['datenaiss'];
      $adresseCLi = $_POST['adresse'];
      $telCli= $_POST['numtel'];
      $montantCons = $_POST['montant'];
      
      $Ngererc = $gererc->insert($heureCons, $nomCli, $prenomCli, $dateCons , $adresseCli, $telCli, $montantCons);
      $gererc = new Gererc ($db);
      $liste = $gererc->select();

  }
  $liste = $gererc->select();
  echo $twig->render('gererc.html.twig', array('form'=>$form,'liste'=>$liste));
}

?>