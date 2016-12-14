<?php
//connexion a la base de donnees
require_once "connect.php";

$genre = $_GET['type'] ?? "home";

//on selectionne les types presents dans la bdd
$sql = "SELECT DISTINCT `type` FROM `filmuz`";
$film = $pdo->prepare($sql);
$film->execute();
?>

<header class="header-<?=$genre?> clearfix">
    <a href="index.php"><img src="img-layout/logo.png" class="logo" alt="logo"></a>
    <nav>
        <ul>
            <?php while($nav = $film->fetch(PDO::FETCH_ASSOC)):
                    if ($nav['type'] === $genre): ?>
            <li id="active"><a href="genre.php?type=<?=$nav['type']?>"><?=$nav['type']?></a></li>
            <?php   else: ?>
            <li><a href="genre.php?type=<?=$nav['type']?>"><?=$nav['type']?></a></li>
            <?php   endif;
            endwhile;
            ?>
        </ul>
    </nav>
    <div class="search-bar">
        <form method="post" action="search.php">
            <input type="text" name="recherche" id="search" placeholder="rechercher une bo ">
            <input type="button" name="bouton" class="bouton bouton2" value="OK">
            <input type="button" name="bouton" class="bouton" id="back">
        </form>
    </div>

</header>
