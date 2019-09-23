<?php

function actionMateriel($twig, $db) {
    $form = array();
    $materiel = new materiel($db);
    
    if (isset($_GET['id'])) {
        $exec = $materiel->delete($_GET['id']);
        if (!$exec) {
            $form['valide'] = false;
            $form['message'] = 'Erreur de suppression.';
        } else {
            $form['valide'] = true;
            $form['message'] = 'Materiel supprimé avec succès';
        }
    }
    $liste = $materiel->select();
    echo $twig->render('materiel.html.twig', array('form' => $form, 'liste' => $liste));
}
