<?php
// Récuperation des variables passées, on donne soit année; mois; année+mois
// n = mois sans les zéros initiaux donc 1 à 12 source php.net
                if (!isset($_GET['mois']))
                    $num_mois = date("n");
                else
                    $num_mois = $_GET['mois'];
               
                if (!isset($_GET['annee']))
                    $num_an = date("Y");
                else
                    $num_an = $_GET['annee'];    
                               
                // début de code pour l'affichage des flèches de navigation...
                if ($num_mois < 1) {
                    $num_mois = 12;
                    $num_an = $num_an - 1;
                } elseif ($num_mois > 12) {
                    $num_mois = 1;
                    $num_an = $num_an + 1;
                }               
                //fin du code pour les flèches de navigation
                // nombre de jours dans le mois et numero du premier jour du mois
                // t = nombre de jours dans le mois 28 à 31 source php.net
                // w = Jour de la semaine au format numérique 0 (pour dimanche) à 6 (pour samedi) source php.net
                $int_nbj = date("t", mktime(0, 0, 0, $num_mois, 1, $num_an));
                $int_premj = date("w", mktime(0, 0, 0, $num_mois, 1, $num_an));
                // tableau des jours, tableau des mois...
                // je les commence par une case vide "", car la case vide est comptée O et je veux selectionner des jours et des mois par Lundi et Janvier. 
                $tab_jours = array("","Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
                $tab_mois = array("","Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Decembre");

                // t = nombre de jours dans le mois de 28 à 31 source php.net
                $int_nbjAV = date("t", mktime(0, 0, 0, ($num_mois - 1 < 1) ? 12 : $num_mois - 1, 1, $num_an)); // nb de jours du mois d'avant
                $int_nbjAP = date("t", mktime(0, 0, 0, ($num_mois + 1 > 12) ? 1 : $num_mois + 1, 1, $num_an)); // nb de jours du mois d'apres               
                // on affiche les jours du mois et aussi les jours du mois avant/apres, on les indique par une * 
                // a l'affichage on modifie l'apparence des chiffres *
                $tab_cal = array( array()); // tab_cal[Semaine][Jour de la semaine]
                $int_premj = ($int_premj == 0) ? 7 : $int_premj;
                $t = 1;
                $p = "";
                for ($i = 0; $i < 6; $i++) {
                    for ($j = 0; $j < 7; $j++) {
                        
                        if ($j + 1 == $int_premj && $t == 1) {
                            $tab_cal[$i][$j] = $t;
                            $t++;
                        } // on stocke le premier jour du mois
                        elseif ($t > 1 && $t <= $int_nbj) {
                            $tab_cal[$i][$j] = $p . $t;
                            $t++;
                        } // on incremente a chaque fois...
                        
                        elseif ($t > $int_nbj) {
                            $p = "*";
                            $tab_cal[$i][$j] = $p . "1";
                            $t = 2;
                        }
// on a mis tout les numeros de ce mois, on commence a mettre ceux du suivant
                        elseif ($t == 1) {
                            $tab_cal[$i][$j] = "*" . ($int_nbjAV - ($int_premj - ($j + 1)) + 1);
                        } // on a pas encore mis les num du mois, on met ceux de celui d'avant
                    }
                }
                ?>