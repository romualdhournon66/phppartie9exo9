<?php
require 'calendrier.php';
?>
<!DOCTYPE html>
<html lang="FR">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <title>PHP Partie 5 exercice 9</title>
    </head>
    <body>
        <div align="center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 align="center">PHP Partie 9 exercice 9</h1>
                    </div>
                </div>
                Nous sommes le : <?= date('d/n/Y'); ?>
                <p align="center">Affichage du calendrier</p>
                <form method="GET" action="index.php" name="calendar" />
                <p>
                    <label for="mois">Choisir un mois</label><br />
                    <select name="mois" id="mois">
                        <option value="1">Janvier</option>
                        <option value="2">Février</option>
                        <option value="3">Mars</option>
                        <option value="4">Avril</option>
                        <option value="5">Mai</option>
                        <option value="6">Juin</option>
                        <option value="7">Juillet</option>
                        <option value="8">Août</option>
                        <option value="9">Septembre</option>
                        <option value="10">Octobre</option>
                        <option value="11">Novembre</option>
                        <option value="12">Décembre</option>
                    </select>
                </p>
                <p>
                    <label for="annee">Choisir une année</label><br />
                    <select name="annee" id="annee">
                        <option value="2000">2000</option>
                        <option value="2001">2001</option>
                        <option value="2002">2002</option>
                        <option value="2003">2003</option>
                        <option value="2004">2004</option>
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007">2007</option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                    </select>
                </p>         
                <input type="submit" value="Envoyer" />
                </form>
                <table>


                    <tr><?php //affichage du mois selectionné  ?>
                        <td colspan="7" align="center"><a href="index.php?mois=<?= $num_mois - 1; ?>&amp;annee=<?= $num_an; ?>"><<</a>&nbsp;&nbsp;<?= $tab_mois[$num_mois]; ?>&nbsp;&nbsp;<a href="index.php?mois=<?= $num_mois + 1; ?>&amp;annee=<?= $num_an; ?>">>></a></td>
                    </tr>
                    <tr><?php //affichage de l'année selectionnée  ?>
                        <td colspan="7" align="center"><a href="index.php?mois=<?= $num_mois; ?>&amp;annee=<?= $num_an - 1; ?>"><<</a>&nbsp;&nbsp;<?= $num_an; ?>&nbsp;&nbsp;<a href="index.php?mois=<?= $num_mois; ?>&amp;annee=<?= $num_an + 1; ?>">>></a></td>
                    </tr>


                    <tr>
                        <?php
                        for ($i = 1; $i <= 7; $i++) {
                            //nom des jours du calendrier                       
                            ?>
                            <td style = "background-color: #FF9900" height="50" width="200">
    <?= $tab_jours[$i];
} ?>
                        </td>
                    </tr>                  
                        <?php for ($i = 0; $i < 6; $i++) { ?>
                        <tr>
                                <?php for ($j = 0; $j < 7; $j++) { ?>                      
                                <td style = "background-color: #99CC00" height="100" width="200"> <?=(($num_mois == date("n") && $num_an == date("Y") && $tab_cal[$i][$j] == date("j")) ? ' <img src="https://media.giphy.com/media/Tfgavc2GRONy/giphy.gif" alt="" height="100" width="200" />' : null) . "" . ((strpos($tab_cal[$i][$j], "*") !== false) ? '<font color="red">' . str_replace("*", "", $tab_cal[$i][$j]) . '</font>' : $tab_cal[$i][$j]);
                                    ?>
    <?php } ?>
                            </td>
                        </tr>
<?php } ?>
                </table>
            </div></div>
    </body>
</html>

<?php
phpinfo();
?>