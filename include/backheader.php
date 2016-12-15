<?php
//connexion a la base de donnees
require_once "../connect.php";

//on selectionne tous les types presents (uniquement si differents) dans la bdd
$sql = "SELECT DISTINCT `type` FROM `filmuz`;";
$film = $pdo->prepare($sql);
$film->execute();

//on récupère le paramètre http "type" s'il existe dans $genre
//sinon on affecte "home" à $genre par défaut
$genre = $_GET['type'] ?? "home";

?>

<?php
//si $genre = une des valeurs de l'array
if(in_array($genre, array('western','sci-fi','action','disney'), true)): ?>
    <header class="header-<?=$genre?> clearfix">
        <a href="../index.php"><img src="../img-layout/logo.png" class="logo" alt="logo"></a>
        <nav>
            <ul>
                <?php
                //pour tous les types retournes par la requete sql
                while($nav = $film->fetch(PDO::FETCH_ASSOC)):
                    //si le type de sql = type de url, on ajout l'id "active" sur le lien
                    if ($nav['type'] === $genre):
                        ?>
                        <li id="active"><a href="../genre.php?type=<?=$nav['type']?>"><?=$nav['type']?></a></li>
                        <?php
                    //sinon le lien n'a pas l'id active = n'est pas blanc opaque
                    else:
                        ?>
                        <li><a href="../genre.php?type=<?=$nav['type']?>"><?=$nav['type']?></a></li>
                        <?php
                    endif;
                endwhile;
                ?>
            </ul>
        </nav>
        <div class="search-bar">
            <form method="get" action="../search.php">
                <input type="text" name="recherche" id="search" placeholder="rechercher une bo ">
                <input type="button" name="bouton" class="bouton bouton2" value="OK">
                <a href="../backoffice/backindex.php"><input type="button" name="bouton" class="bouton" id="back"></a>
            </form>
        </div>
    </header>
    <?php
//dans tous les autres cas pour $genre, on affiche le header de index.php
else: ?>
    <header class="header-home clearfix">
        <a href="http://www.nyan.cat"><img src="../img-layout/logo-accueil.png" class="logo" alt="logo"></a>
        <a href="../index.php"><img src="../img-layout/titre.png" class="titre" alt="filmuz"></a>
        <div class="search-bar">
            <form method="get" action="../search.php">
                <input type="text" name="recherche" id="search" placeholder="rechercher une bo ">
                <input type="button" name="bouton" class="bouton bouton2" value="OK">
                <a href="../backoffice/backindex.php"><input type="button" name="bouton" class="bouton" id="back"></a>
            </form>
        </div>
    </header>

<?php endif; ?>