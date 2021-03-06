<div class="row">    
    <h2>Valider la fiche de frais</h2>
    <h3>Eléments forfaitisés</h3>
    <div class="col-md-4">
        <form method="post" 
              action="index.php?uc=validerFrais&action=corrigerFraisForfais&leVisiteur=<?php echo $leVisiteur; ?>&leMois=<?php echo $leMois; ?>"
              role="form">
            <fieldset>       
                <?php
                foreach ($lesFraisForfait as $unFrais) {
                    $idFrais = $unFrais['idfrais'];
                    $libelle = htmlspecialchars($unFrais['libelle']);
                    $quantite = $unFrais['quantite'];
                    ?>
                    <div class="form-group">
                        <label for="idFrais"><?php echo $libelle ?></label>
                        <input type="text" id="idFrais" 
                               name="lesFrais[<?php echo $idFrais ?>]"
                               size="10" maxlength="5" 
                               value="<?php echo $quantite ?>" 
                               class="form-control">
                    </div>
                    <?php
                }
                ?>
                <button class="btn btn-success" type="submit">Corriger</button>
                <button class="btn btn-danger" type="reset">Réinitialiser</button>
            </fieldset>
        </form>
    </div>

</div>
<hr>
<div class="row">
    <div class="panel panel-info">
        <div class="panel-heading">Descriptif des éléments hors forfait</div>
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th class="date">Date</th>
                    <th class="libelle">Libellé</th>  
                    <th class="montant">Montant</th>  
                    <th class="action">&nbsp;</th> 
                </tr>
            </thead>  
            <tbody>
            <?php
            foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
                $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
                $date = $unFraisHorsForfait['date'];
                $montant = $unFraisHorsForfait['montant'];
                $id = $unFraisHorsForfait['id']; ?>           
                <tr>
                    <td> <?php echo $date ?></td>
                    <td> <?php echo $libelle ?></td>
                    <td><?php echo $montant ?></td>
                    <td><a href="index.php?uc=validerFrais&action=supprimerFrais&idFrais=<?php echo $id; ?>&leVisiteur=<?php echo $leVisiteur; ?>&leMois=<?php echo $leMois; ?>"
                           class="btn btn-danger"
                           onclick="return confirm('Voulez-vous vraiment supprimer ce frais?');">
                            <span class="glyphicon glyphicon-remove"></span>
                            Supprimer 
                        </a>
                        <a href="index.php?uc=validerFrais&action=reporterFrais&idFrais=<?php echo $id ?>
                           &leVisiteur=<?php echo $leVisiteur; ?>&leMois=<?php echo $leMois; ?>"
                           class="btn btn-warning"
                           onclick="return confirm('Voulez-vous vraiment reporter  ce frais?');">
                            <span class="glyphicon glyphicon-repeat"></span>
                            Reporter 
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>  
        </table>
    </div>
</div>