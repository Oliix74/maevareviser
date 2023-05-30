<?php
// Tableau associatif des mouvements littéraires et de leurs définitions
$mouvements = array(
    "L'Humanisme" => "Le mouvement littéraire de l'humanisme est une période de la Renaissance qui met l'accent sur la redécouverte des textes antiques, la valorisation de l'individu et la célébration de la raison et de l'humanité.",
    "mouvement2" => "définition2",
    // Ajoutez les autres mouvements et leurs définitions ici
);

// Vérifie si un mouvement est sélectionné
if (isset($_GET['mouvement'])) {
    $mouvementSelectionne = $_GET['mouvement'];
    if (array_key_exists($mouvementSelectionne, $mouvements)) {
        $definition = $mouvements[$mouvementSelectionne];
    } else {
        $definition = "Mouvement non trouvé.";
    }
} else {
    // Si aucun mouvement n'est sélectionné, affiche une valeur par défaut
    $definition = "...";
    $mouvementSelectionne = "Aucun Mouvement";
}

// Récupère les clés (noms des mouvements) du tableau des mouvements
$clesMouvements = array_keys($mouvements);

// Recherche la clé du mouvement sélectionné actuellement
$cleMouvementActuel = array_search($mouvementSelectionne, $clesMouvements);

// Détermine la clé du prochain mouvement
$cleMouvementSuivant = ($cleMouvementActuel === false || $cleMouvementActuel === count($clesMouvements) - 1) ? $clesMouvements[0] : $clesMouvements[$cleMouvementActuel + 1];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Exercices - Mouvements Littéraires</title>
    <style>
        .flash-card {
            width: 300px;
            height: 200px;
            perspective: 1000px;
        }

        .card {
            width: 100%;
            height: 100%;
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.6s;
        }

        .card:hover {
            transform: rotateY(180deg);
        }

        .front,
        .back {
            width: 100%;
            height: 100%;
            position: absolute;
            backface-visibility: hidden;
        }

        .front {
            background-color: lightgray;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .back {
            height: 100%;
            background-color: white;
            transform: rotateY(180deg);
            /* padding: 10px; */
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .backText {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <h1>Mouvements Littéraires</h1>
    <div class="flash-card">
        <div class="card">
            <div class="front"><?php echo $mouvementSelectionne; ?></div>
            <div class="back"><div class="backText"><?php echo $definition; ?></div></div>
        </div>
    </div>
    <form method="get" action="">
        <input type="hidden" name="mouvement" value="<?php echo $cleMouvementSuivant; ?>">
        <button type="submit">Mouvement Suivant</button>
    </form>
</body>
</html>
