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
</body>
</html>
