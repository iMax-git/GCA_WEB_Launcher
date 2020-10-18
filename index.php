<?php
    require ('includes/steamauth.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
        <meta name="viewport" content="height=device-height">
        <title>Gotham - Launcher</title>
        <link rel="stylesheet" href="connect.css">
        <link rel="stylesheet" href="launcher.css">
        <link rel="icon" href="assets/imax.ico" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <body>
            <?php
            if(!isset($_SESSION['steamid'])) {
                echo '
                <section id="connect">
                    <img class="bg" src="assets/steambg.png" alt="bg">
                    <img class="bg2" src="assets/steam3.png" alt="bg2">
                    <section id="right">
                        <div class="formulaire">
                            <p class="title text">
                                Se Connecter avec Steam
                            </p>
                            <a class="button text fab fa-steam" href="?login">
                            <span> - Se connecter </span>
                            </a>
                        </div>
                    </section>
                </section>
                ';
            } else {
                include ('includes/userInfo.php');
            ?>

            <section id="launcher">
                <div class="lists">
                    <h1>Listes des serveurs.</h1>
                    <div class="profile">
                        <img class="avatar" src='<?=$steamprofile['avatarmedium']?>'>
                        <h1 class="name"><?=$steamprofile['personaname']?></h1>
                        <p class="steam64">steam:<?=dechex($steamprofile['steamid'])?></p>
                    </div>
                    <div class="sep"></div>
                    <div class="serveurs">
                        <div class="card FiveM">
                            <img class="" src="assets/fivem.png">
                            <p class="title">Gotham City Anarchy</p>
                            <?php
                                include ("includes/include.db.php"); 
                                $whitelisted = whitelisted("fivem","steam:".dechex($steamprofile['steamid']));
                                if($whitelisted == "True"){
                                    echo "<a href='fivem://connect/146.59.151.43:30120'><button class='on' >Se connecter</button></a>";
                                } else {
                                    echo '<button class="notWL" href="">Non Whitelister</button>';
                                }
                                
                            ?>
                        </div>
                        <div class="card ArmaIII">
                            <img class="" src="assets/arma.png">
                            <p class="title">Stargate</p>
                            <button class="off" href="">Comming Soon</button>
                        </div>
                        <form action='' method='get' class="exit">
                            <button name='logout' type='submit' style="
                                    position: fixed;
                                    top: 85%;
                                    left: 26%;
                                    border-radius: 1.5rem;
                                    border-style: solid;
                                    padding: 10px 2%;
                                    transition: 900ms;
                                    background-color: rgba(0,0,0,0.4);
                                    border-color: rgb(255, 0, 0);
                                    color: rgb(255, 255, 255);
                                ">Logout</button>
                        </form>
                    </div>
                </div>
                
                <div class="error">
                    <h1>Augmenter la taille de votre fenetre.</h1>
                </div>
            </section>

            <?php
            }
            ?>
        </body>
    </body>
</html>
