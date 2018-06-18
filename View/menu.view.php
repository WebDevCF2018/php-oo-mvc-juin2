<?php
# aaa068 menu

?>
<ul>
    <li><a href="./">Accueil</a></li>
    <?php
    #aaa072 public mode
    if (isset($_SESSION['monid']) && $_SESSION['monid'] == session_id()) {

    }else{
        ?>
    <li><a href="?login">Connexion</a></li>
    <?php
    }
    ?>
</ul>