<?php
/**
 * Vue Erreurs
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Nathanaël PLOQUIN<nploquin@yahoo.fr>
 * @version   GIT: <0>
 */
?>
<div class="alert alert-success" role="alert">
    <?php
    foreach ($_REQUEST['operationEffectuee'] as $operationEffectuee) {
        echo '<p>' . htmlspecialchars($operationEffectuee) . '</p>';
    }
    ?>
</div>
