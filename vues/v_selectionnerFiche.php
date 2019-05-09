<?php
/**
 * Vue Pied de page
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    José GIL <jgil@ac-nice.fr>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 */
?>
<form action="index.php?uc=validerFrais&action=voirFicheSelect" 
      method="post" role="form">
    <div class="row">
        <div class="col-md-2">
            <label>Choisir le visiteur : </label>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <select id="lstVisiteurs" name="lstVisiteurs" class="form-control">
                    <?php
                    foreach ($lesVisiteurs as $unVisiteur) {
                        $nom = $unVisiteur['nom'];
                        $prenom = $unVisiteur['prenom'];
                        $visiteurId = $unVisiteur['id'];
                        if ($visiteurId == $leVisiteur) {
                            ?>
                            <option selected value="<?php echo $visiteurId ?>">
                                <?php echo $nom . ' ' . $prenom ?> </option>
                            <?php
                        } else {
                            ?>
                            <option value="<?php echo $visiteurId ?>">
                                <?php echo $nom . ' ' . $prenom ?> </option>
                            <?php
                        }
                    }
                    ?>    

                </select>
            </div>
        </div>
        <div class="col-md-1">
            <label>Mois : </label>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <select id="lstMois" name="lstMois" class="form-control">
                    <?php
                    foreach ($lesMois as $unMois) {
                        $annee = $unMois['annee'];
                        $mois = $unMois['mois'];
                        $date = $unMois['date'];
                        if ($date == $leMois) {
                            ?>
                            <option selected value="<?php echo $date ?>">
                                <?php echo $mois . '/' . $annee ?> </option>
                            <?php
                        } else {
                            ?>
                            <option value="<?php echo $date ?>">
                                <?php echo $mois . '/' . $annee ?> </option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <input id="ok" type="submit" value="Valider" class="btn btn-success" 
                   role="button">
    </div>
</form>
<hr>