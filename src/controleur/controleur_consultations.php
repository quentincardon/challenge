<?php
function actionConsultation($twig, $db){
 $form = array();
 $consultation = new Consultation($db);
 if(isset($_POST['btSupprimer'])){
 $cocher = $_POST['cocher'];
 $form['valide'] = true;
 foreach ( $cocher as $id){
 $exec=$consultation->delete($id);
 if (!$exec){
 $form['valide'] = false;
 $form['message'] = 'Problème de suppression dans la table planning';
 }
 }
 }

 if(isset($_GET['id'])){
 $exec=$consultation->delete($_GET['id']);
 if (!$exec){
 $form['valide'] = false;
  $form['message'] = 'Problème de suppression dans la table planning';
 }
 else{
 $form['valide'] = true;
 $form['message'] = 'Planning supprimé avec succès';
 }
 }

 $liste = $consultation->select();
 echo $twig->render('consultation.html.twig', array('form'=>$form,'liste'=>$liste));
}

//function actionModifcatalogue($twig, $db){
// $form = array();
// if(isset($_GET['id'])){
// $livre = new Catalogue($db);
// $unLivre = $livre->selectById($_GET['id']);
// if ($unLivre!=null){
// $form['livre'] = $unLivre;
//
// }
// else{
// $form['message'] = 'Livre incorrect';
//    }
// }
//
//  else{
// if(isset($_POST['btModifc'])){
// $livre = new Catalogue($db);
// $id = $_POST['id'];
// $nom = $_POST['nom'];
// $DateRealisation = $_POST['DateRealisation'];
// $resume = $_POST['resume'];
// $PageCouverture = $_POST['PageCouverture'];
//$idCollection = $_POST['idCollection'];
//$idDisponible = $_POST['idDisponible'];
//$idPublication = $_POST['idPublication'];
//$prix = $_POST['prix'];
//$isbn = $_POST['isbn'];
//
//
//
// $exec=$livre->update($id, $nom, $DateRealisation, $resume, $PageCouverture, $idCollection, $idDisponible, $idPublication, $prix, $isbn);
// if(!$exec){
// $form['valide'] = false;
// $form['message'] = 'Échec de la modification';
// }
//
// else{
// $form['valide'] = true;
// $form['message'] = 'Modification réussie';
// }
// }
//
//
//}
//echo $twig->render('modif_catalogue.html.twig', array('form'=>$form));
//}
?>

