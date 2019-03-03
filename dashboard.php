<?php

// Ok... C tout bon, je te laisse poursuivre :-) ?
//

require 'header.php';
$annees           = (int) date('Y');
$annees_selection = empty($_GET['annee']) ? $annees : (int) $_GET['annee'];
$mois_selection   = empty($_GET['mois']) ? date('m') : (int) $_GET['mois'];

var_dump($annees_selection, $mois_selection); // Cette ligne nous montre ce qu'elles contiennent
// d'accord
// Là, cv ;-)... Et du coup, c'est la suite en local qu'il faut peaufiner :-)// Ok, je retourne dans c57, je change la Une...
//merci beaucoup

if ($annees_selection && $mois_selection) {
    echo '<h4>Calcul du total pour le mois '.$mois_selection.' de l\'année '.$annees_selection.'</h4>';
    $total = nombre_vue_mois($annees_selection, $mois_selection);
} else {
    $total = nombre_vue();
}

$mois = [
    '01' => 'Janvier',
    '02' => 'Février',
    '03' => 'Mars',
    '04' => 'Avril',
    '05' => 'Mai',
    '06' => 'Juin',
    '07' => 'Juillet',
    '08' => 'Août',
    '09' => 'Septembre',
    '10' => 'Octobre',
    '11' => 'Novembre',
    '12' => 'Décembre',
];
function nombre_vue_mois(int $annees, int $mois)
{
    $mois    = str_pad($mois, 2, '0');
    $fichier = dirname(__DIR__).DIRECTORY_SEPARATOR.'cli'.DIRECTORY_SEPARATOR.'compteur-'.$annees.'-'.$mois;
    var_dump($fichier);
    exit();
}
?>

<div class="row">

    <div class="col-md-4">
        <ul class="list-group">
                <?php for ($i = 0; $i < 5; ++$i) {
    ?>
                    <a class="list-group-item <?php echo $annees - $i === $annees_selection ? 'active' : ''; ?>" href="dashboard.php?annee=<?php echo $annees - $i; ?>">
                        <?php echo $annees - $i; ?>
                    </a>
                    <?php if ($annees - $i === $annees_selection) {
        ?>
                        <div class="list-group">
                            <?php foreach ($mois as $numero => $nom) {
            ?>
                                <a class="list-group-item" href="dashboard.php?annee=<?php $annees_selection; ?>&mois=<?php echo $numero; ?> " >
                                    <?php echo $nom; ?>
                                </a>
                                
                            <?php
        } ?>
                        </div>
                    <?php
    } ?>
                <?php
} ?>
        </ul>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <strong><?php echo $total; ?></strong><br> visite<?php if ($total > 1) {
        ?>s au total <?php
    } ?>
            </div>
        </div>
    </div>
</div>