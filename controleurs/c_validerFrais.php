<?php

/**
 * Gestion de l'affichage des frais pour validation
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    PLOQUIN Nathanaël
 * @version   GIT: <0>
 */
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$lesVisiteurs = $pdo->getLesVisiteurs();
$lesMois = getLesMois();
//gestion de la vue de sélection d'une fiche
switch ($action) {
    case 'selectionnerFiche':
        $leVisiteur = $lesVisiteurs[0]['id'];
        $leMois = $lesMois[0]['date'];
        break;
    case 'voirFicheSelect':
        $leVisiteur = filter_input(INPUT_POST, 'lstVisiteurs', FILTER_SANITIZE_STRING);
        $leMois = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_STRING);
        break;
    default :
        $leVisiteur = filter_input(INPUT_GET, 'leVisiteur', FILTER_SANITIZE_STRING);
        $leMois = filter_input(INPUT_GET, 'leMois', FILTER_SANITIZE_STRING);
        break;
}
include 'vues/v_selectionnerFiche.php';
//gestion des corrections de fiches
switch ($action) {
    case 'corrigerFraisForfais' :
        $lesFrais = filter_input(INPUT_POST, 'lesFrais', FILTER_DEFAULT, FILTER_FORCE_ARRAY);
        if (lesQteFraisValides($lesFrais)) {
            $pdo->majFraisForfait($leVisiteur, $leMois, $lesFrais);
            ajouterOperationEffectuee('Les éléments forfaitisés ont été mis à jour.');
            include 'vues/v_operationEffectuee.php';
            
        } else {
            ajouterErreur('Les valeurs des frais doivent être numériques');
            include 'vues/v_erreurs.php';
        }
        break;
    case 'supprimerFrais' : 
        $leFraisHorsForfait = filter_input(INPUT_GET, 'idFrais',FILTER_SANITIZE_STRING);
        $pdo->rejeterFraisHorsForfait($leFraisHorsForfait);
        break;
    case 'reporterFrais' :
        $leFraisHorsForfait = filter_input(INPUT_GET, 'idFrais',FILTER_SANITIZE_STRING);
        $pdo->reporterFraisHorsForfait($leFraisHorsForfait);
}
//gestion de la vue des fiches
if ($action != 'selectionnerFiche') {
    $existeFiche = $pdo->existeFicheFrais($leVisiteur, $leMois);
    if (!$existeFiche) {
        ajouterErreur('Pas de fiche de frais pour ce visiteur ce mois');
        include 'vues/v_erreurs.php';
    } else {
        $lesFraisForfait = $pdo->getLesFraisForfait($leVisiteur, $leMois);
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($leVisiteur, $leMois);
        include 'vues/v_validerFrais.php';
    }
}
    
