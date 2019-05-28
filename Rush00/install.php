<?php

$root = $_SERVER['DOCUMENT_ROOT']."/Rush0";
include $root.'/users/my_hash.php';

/* Create admin user */
if (!is_dir($root."/private"))
    mkdir($root."/private");
$admin = array(
    "email" => "admin@admin.fr",
    "fname" => "admin",
    "passwd" => my_hash("administrator"), // [TO DO] Mettre un vrai mot de passe
    "admin" => true,
    "id" => my_hash("admin@admin.fr")
);
if (!file_exists($root."/private/users")) {
    file_put_contents($root."/private/users", serialize(array($admin)));
    echo "created: admin user\n";
}
else {
    fopen($root."/private/users", "r");
    if (flock($file, LOCK_EX)) {
        $usr_list = unserialize(file_get_contents($root."/private/users"));
        $usr_list[] = $admin;
        file_put_contents($root."/private/users", serialize($usr_list));
        echo "created: admin user\n";
    }
    else
        echo "error: could not add admin user\n";
    fclose($file);
}

/* Create catalog csv file */
$catalog[] = array(
    "reference",
    "name",
    "description",
    "image",
    "price",
    "color",
    "categories"
);
$catalog[] = array(
    "0001",
    "CQBC",
    "Ce lit vous permet d'avoir un grand espace de rangement sans occuper davantage de place dans la pièce. Il suffit de soulever la base et d'y glisser vos affaires. Le lit peut être placé au milieu de la pièce ou avec la tête de lit contre le mur.",
    "cqbc.png",
    "369",
    "blanc",
    "chambre,literie"
);
$catalog[] = array(
    "0002",
    "ADQHHULYA",
    "Le design sans soudure facilite le montage et apporte une touche de modernité à la table. Rangement pratique dans la table. Facile à placer en cas d'espace réduit. Léger, facile à soulever et à déplacer. Uniquement pour une utilisation à l'intérieur.",
    "ADQHHULYA.png",
    "9",
    "noir",
    "salon,tables et chaises"
);
$catalog[] = array(
    "0003",
    "YAUQ FI 1995",
    "À l'occasion de nos 75 ans d'existence, nous avons rassemblé quelques-uns de nos anciens produits iconiques pour une collection spéciale. Saurez-vous deviner en quelle décennie ce produit a été lancé ?",
    "YAUQ FI 1995.png",
    "139",
    "beige",
    "salon,tables et chaises"
);
$catalog[] = array(
    "0004",
    "AHKIDYDW / IUAEDT",
    "Créez une atmosphère agréable et chaleureuse dans votre intérieur avec cette lampe en papier qui projette une lumière diffuse et décorative.",
    "AHKIDYDW IUAEDT.png",
    "14",
    "blanc",
    "salon,chambre,luminaires"
);
$catalog[] = array(
    "0005",
    "IYDDUHBYW",
    "La designer Ilse Crawford a créé cette lampe en bambou tressé, un matériau qui permet de diffuser une lumière chaude et accueillante tout en créant des ombres décoratives. Chaque lampe est fabriquée à la main et donc unique.",
    "IYDDUHBYW.png",
    "50",
    "beige",
    "salon,chambre,luminaires"
);
$catalog[] = array(
    "0006",
    "IZQBIBYWJ",
    "Décoration 3 pièces, vert",
    "IZQBIBYWJ.png",
    "10",
    "vert",
    "salon,chambre,salle de bain,decoration"
);
$catalog[] = array(
    "0007",
    "JEDIQJJQ",
    "Ce vase soufflé à la bouche a été fabriqué avec soin par un artisan verrier qualifié qui a développé l'art de créer des produits en verre uniques pendant de longues années.",
    "JEDIQJJQ.png",
    "15",
    "bleu",
    "salon,chambre,salle de bain,decoration"
);
$catalog[] = array(
    "0008",
    "VEBZQHUD",
    "Rideau de douche, blanc noir, gris, 180x200 cm",
    "VEBZQHUD.png",
    "10",
    "blanc",
    "salle de bain"
);
$catalog[] = array(
    "0009",
    "CQJHUTQB",
    "Idéal dans une chambre romantique, une salle de bain chaleureuse ou pour créer un joli contraste avec des photos et cadres sur un mur du salon. Ce miroir est travaillé jusque dans les moindres détails, de la forme du cadre à son bord profilé.",
    "CQJHUTQB.png",
    "50",
    "blanc",
    "salle de bain,chambre"
);
$catalog[] = array(
    "0010",
    "RUIJQ",
    "Combinaison rangement portes, brun noir Lappviken, Sindvik brun noir verre transparent, 180x42x112 cm",
    "RUIJQ.png",
    "325",
    "noir",
    "salon,chambre,rangement"
);
$file = fopen($root."/catalog.csv", "w");
foreach ($catalog as $product) {
    fputcsv($file, $product, ';');
}
fclose($file);
echo "created: catalog.csv\n";

?>