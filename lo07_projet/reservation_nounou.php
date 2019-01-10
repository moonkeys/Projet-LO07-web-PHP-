<?php
require_once 'session.php';
require_once 'database.php';
?>

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Inscription nounous</title>

        <!-- CSS  -->

        <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
        <nav class="light-blue lighten-1" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="login.html">Accueil</a></li>
                </ul>

                <ul id="nav-mobile" class="sidenav">
                    <li><a href="login.html">Accueil</a></li>
                </ul>
                <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            </div>
        </nav>
        <div class="section no-pad-bot" id="index-banner">
            <div class="container">
                <br><br>
                <h1 class="header center orange-text">Indiquez vos disponiblités</h1>
                <div class="row center">
                    <h5 class="header col s12 light">Attention toutes les heures de l'intervalle seront remplies</h5>
                </div>
                <div class='row center'>
                    <div class="row" style="width:100%">
                        <div class="col s12">
                            ajoutez un jour régulier
                            ajoutez un horaire particulier
                            tous les jours
                            tous les jours travaillés
                            <form method="post" action='reservation_nounou.php'>
                                <div class='col s4'>
                                    
                                    <select>
                                        <option value='' disabled selected>Choisissez le type de réservation</option>
                                        <option value='jourrécurrent'>Un jour récurrent</option> 
                                        <option value='touslesjours'>Tous les jours</option>   
                                        <option value='jourstravailles'>Tous les jours travaillés</option>   
                                        <option value='jourparticuluer'>Un jour particulier</option>   
                                    </select>
                                    
                                    <label for='debut'>Date de début</label>
                                    <input type="text" class='datepicker' name="debut">
                                    <label for='1'>Date de fin</label>
                                    <input type="text" class='datepicker' name='fin' id='1'>                                   
                                </div> 
                                <div class="col s4">
                                    <label>Heure de début</label>
                                     <input type="text" class="timepicker" name="timedebut">
                                     <label>Heure de fin</label>
                                     <input type="text" class="timepicker" name="timefin">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <br><br>

            </div>
        </div>




        <!--  Scripts-->
        <script src="js/jquery.js"></script> 
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>

    </body>
</html>

