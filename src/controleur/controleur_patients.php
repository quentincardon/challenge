<?php

function actionPatients($twig, $db) {
    $form = array();
    $patients = new patients($db);
    if (isset($_GET['id'])) {
        $exec = $patients->delete($_GET['id']);
        if (!$exec) {
            $form['valide'] = false;
            $form['message'] = 'Erreur de suppression.';
        } else {
            $form['valide'] = true;
            $form['message'] = 'Patient supprimé avec succès';
        }
    }
    $liste = $patients->select();

    echo $twig->render('patients.html.twig', array('form' => $form, 'liste' => $liste));
}

//function actionModifPatients($twig, $db){
// $form = array();
// if(isset($_GET['email'])){
// $patients = new patients($db);
// $unPatient = $patients->selectByEmail($_GET['email']);
// if ($unPatient!=null){
// $form['patient'] = $unPatient;
//
//
// }
// else{
// $form['message'] = 'Patients incorrect';
//    }
// }
//
// if(isset($_POST['btModifp'])){
// $patients = new patients($db);
//
//// $email = $_POST['email'];
//// $mdp = $_POST['password'];
//// $mdp2 = $_POST['password2'];
//
//// if($mdp!=$mdp2){
////     $form['valide'] = false;
////     $form['message'] = 'mots de passe différent';
//// }
//// else{
////
//// $exec=$utilisateur->update(password_hash($mdp,PASSWORD_DEFAULT),$email);
//// if(!$exec){
//// $form['valide'] = false;
//// $form['message'] = 'Échec de la modification';
//// }
//// else{
//// $form['valide'] = true;
//// $form['message'] = 'Modification réussie';
//// }
//// }
//// }
//// else{
//// $form['valide'] = false;
//// $form['message'] = 'Utilisateur non précisé';
////}
//
//
//echo $twig->render('modif_utilisateur.html.twig', array('form'=>$form));
//}
//
?>

