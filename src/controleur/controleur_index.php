<?php

$db = connect($config);
$contenu = getPage($db);
// Exécution de la fonction souhaitée$contenu($twig,$db);

function actionAccueil($twig){
 echo $twig->render('index.html.twig', array());
}

 function actionConnexion($twig,$db){
 $form = array();

 if (isset($_POST['btConnecter'])){
    $inputEmail = $_POST['inputEmail'];
    $inputPassword = $_POST['inputPassword'];
    $utilisateur = new Utilisateur($db);
    $unUtilisateur = $utilisateur->connect($inputEmail);

 if ($unUtilisateur!=null){
 if(!password_verify($inputPassword,$unUtilisateur['mdp'])){
    $form['valide'] = false;
    $form['message'] = 'Login ou mot de passe incorrect';
 }
 else{
 $_SESSION['login'] = $inputEmail;
 $_SESSION['role'] = $unUtilisateur['idRole'];
 header("Location:index.php");
   }
 }
else{
 $form['valide'] = false;
 $form['message'] = 'Login ou mot de passe incorrect';
}

$from = "Test@test.fr";
$headers = "From: ".$from;
//$to = $inputEmail;
$to = "pirate8@live.fr";
$subject = "Inscription sur Legendarium";
$message ="Une personne a essayée de se connecter au site \n Email : ".$inputEmail;
// //$message1 ="Vous êtes inscrit sous le nom de  ". $nom;
// //$message2 ="Vous etes inscrit sous le prénom de ". $prenom;
// //$headers .="Content-Type: text/html; charset=\"utf-8\"";
 mail($to, $subject, $message, $headers); //$message1, // $message2,

 $from = "no-reply@gmail.com";
$headers = "From: ".$from;
$to = $inputEmail;
//$to = "pirate8@live.fr";
$subject = "Legendarium";
$message ="Vous avez essayé de vous connecter mais votre compte n'existe pas, ou votre mot de passe est incorrect !";
// //$message1 ="Vous êtes inscrit sous le nom de  ". $nom;
// //$message2 ="Vous etes inscrit sous le prénom de ". $prenom;
// //$headers .="Content-Type: text/html; charset=\"utf-8\"";
 mail($to, $subject, $message, $headers); //$message1, // $message2,

 }
 echo $twig->render('connexion.html.twig', array('form'=>$form));
  }

 function actionApropos($twig){
 echo $twig->render('apropos.html.twig', array());
}



 function actionConsultations($twig){
 echo $twig->render('gererc.html.twig', array());
}

 function actionAjoutpatient($twig){
 echo $twig->render('gererpa.html.twig', array());
}

 function actionAjoutmateriel($twig){
 echo $twig->render('gererm.html.twig', array());
}



 function actionMention($twig){
 echo $twig->render('mentionlegales.html.twig', array());
}

 function actionRole($twig){
 echo $twig->render('role.html.twig', array());
}

function actionInscrire($twig,$db){
 $form = array();
 if (isset($_POST['btInscrire'])){
 $id = $_POST['id'];
 $inputEmail = $_POST['inputEmail'];
 $inputPassword = $_POST['inputPassword'];
 $inputPassword2 =$_POST['inputPassword2'];
 $nom = $_POST['nom'];
 $prenom =$_POST['prenom'];
 $datenaiss =$_POST['datenaiss'];
 $form['valide'] = true;
 if ($inputPassword!=$inputPassword2){
 $form['valide'] = false;
 $form['message'] = 'Les mots de passe sont différents';}
  else{
 $utilisateur = new Utilisateur($db);
 $exec = $utilisateur->insert($id, $nom, $prenom, $inputEmail, password_hash($inputPassword, PASSWORD_DEFAULT), $datenaiss);
// $exec = $utilisateur->insert($id, $inputEmail, password_hash($inputPassword,PASSWORD_DEFAULT), $nom, $prenom, $datenaiss, $role);
 if (!$exec){
 $form['valide'] = false;
 $form['message'] = 'Problème d\'insertion dans la table utilisateur ';
 }
 }
 $form['email'] = $inputEmail;

$from = "Test@test.fr";
$headers = "From: ".$from;
//$to = $inputEmail;
$to = "pirate8@live.fr";
$subject = "Inscription sur Legendarium";
$message ="Votre insription a bien était prise en compte ! Merci de votre confiance \n Email : ".$inputEmail;
// //$message1 ="Vous êtes inscrit sous le nom de  ". $nom;
// //$message2 ="Vous etes inscrit sous le prénom de ". $prenom;
// //$headers .="Content-Type: text/html; charset=\"utf-8\"";
 mail($to, $subject, $message, $headers); //$message1, // $message2,

 $from = "no-reply@gmail.com";
$headers = "From: ".$from;
$to = $inputEmail;
//$to = "pirate8@live.fr";
$subject = "Inscription sur Legendarium";
$message ="Votre insription a bien était prise en compte ! Merci de votre confiance";
// //$message1 ="Vous êtes inscrit sous le nom de  ". $nom;
// //$message2 ="Vous etes inscrit sous le prénom de ". $prenom;
// //$headers .="Content-Type: text/html; charset=\"utf-8\"";
 mail($to, $subject, $message, $headers); //$message1, // $message2,
 }
 echo $twig->render('inscrire.html.twig', array('form'=>$form));
}

function actionDeconnexion($twig){
 session_unset();
 session_destroy();
 header("Location:index.php");
}

 function actionMaintenance($twig){
 echo $twig->render('maintenance.html.twig', array());
}




?>
