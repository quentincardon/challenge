<?php
function actionGererm($twig, $db){
 $form = array();
 $gererm = new Gererm($db);
 $liste = $gererm->select();
 if (isset($_POST['btGererm'])){

      $nomMat = $_POST['materiel'];
      $comMat= $_POST['contenu'];
      $Quantite = $_POST['quantite'];
      
      $Ngererm = $gererm->insert($nomMat, $comMat, $Quantite);
      $gererm = new Gererm ($db);
      $liste = $gererm->select();

  }
  echo $twig->render('gererm.html.twig', array('form'=>$form,'liste'=>$liste));
}

?>