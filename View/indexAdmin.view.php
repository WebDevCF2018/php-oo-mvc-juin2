<?php
# aaa090 create homepage view
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Accueil</title>
</head>
<body>
<h1>Admin - Accueil</h1>
<?php
# aaa092 include menu
include "View/menu.view.php";
?>
<h2>Bienvenue <?=$_SESSION['thename']?></h2>
<?php
# aaa108
if(!is_array($affiche)){
    echo "<h3>$affiche</h3>";
}else{
    foreach ($affiche AS $item) {
        ?>
<h3><?= $item->getThetitle(); ?></h3>
<p><a href="?update=<?=$item->getIdarticle()?>"><img src="Asset/img/update.png" title="update" alt="update"></a>
    <img src="Asset/img/delete.png" title="delete" alt="delete">
</p>
<p><?= substr($item->getThetext(),0,150); ?> ...</p>
        <p><?= $item->getThedate(); ?></p><hr>
        <?php
    }
}
?>
</body>
</html>
