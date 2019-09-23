<?php
function actionGererpa($twig, $db){
 $form = array();
 $gererpa = new Gererpa($db);
 $liste = $gererpa->select();
 if (isset($_POST['btGererpa'])){

      $nomCli = $_POST['nom'];
      $prenomCli = $_POST['prenom'];
      $datenaisCli = $_POST['datenaiss'];
      $adresseCli = $_POST['adresse'];
      $telCli = $_POST['numtel'];
      
      $form['valide'] = true;
      
      $gererpa->insert($nomCli, $prenomCli, $datenaisCli, $adresseCli, $telCli);
      $gererpa = new Gererpa ($db);
      $liste = $gererpa->select();

  }
  echo $twig->render('gererpa.html.twig', array('form'=>$form,'liste'=>$liste));
}

?>