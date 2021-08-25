<?php 

    //Variable de lecture du fichier JSON
    $data = file_get_contents('./tiiTbptp.json');

    //Variable de décodagge du fichier JSON
    $json = json_decode($data, TRUE);

    //Variables pour la recherche
    $prenom = 'lucie';

    //Fonction de recherche récursive
    function findFamily($i, $j, $json, $prenom){
        if ($j == 0){
            if ($json[$i]['prenom'] == $prenom){
                echo json_encode($json[$i]);
            }
        }
        if ($j < count($json[$i]['enfants'])){
            if ($json[$i]['enfants'][$j]['prenom'] == $prenom){
                echo json_encode($json[$i]);
                if (!($j+1 == count($json[$i]['enfants']))){
                    findFamily($i, $j+1, $json, $prenom);
                }
            }elseif (!($j+1 == count($json[$i]['enfants']))){
                findFamily($i, $j+1, $json, $prenom);
            }elseif(!($i+1 == count($json))) {
                findFamily($i+1, 0, $json, $prenom);
            }
        }
    }

    findFamily(0, 0, $json, $prenom);
?>