<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FILMUZ</title>
    <link rel="stylesheet" href="css/screen.css">
    <link rel="icon" href="img-layout/favicon.png" />
</head>
<body>
    <header class="header-home clearfix">
                <a href="index.php"><img src="img-layout/logo-accueil.png" class="logo" alt="logo"></a>
                <img src="img-layout/titre.png" class="titre" alt="filmuz">
                <div class="search-bar">
                      <form method="get" action="search.php">
                          <input type="text" name="recherche" id="search" placeholder="rechercher une bo ">
                          <input type="button" name="bouton" class="bouton bouton2" value="OK">
                          <a href="backindex.php"><input type="button" name="bouton" class="bouton" id="back"></a>
                      </form>
                </div>
  </header>
    <nav class="nav-big">
        <ul>
            <li><a href="genre.php?type=western"><img src="img-content/western.jpg" alt=""><div class="nav-genre"><span>western</span></div></a></li>
            <li><a href="genre.php?type=sci-fi"><img src="img-content/sci-fi.jpg" alt=""><div class="nav-genre"><span>sci-fi</span></div></a></li>
            <li><a href="genre.php?type=action"><img src="img-content/action.jpg" alt=""><div class="nav-genre"><span>action</span></div></a></li>
            <li><a href="genre.php?type=disney"><img src="img-content/disney.jpg" alt=""><div class="nav-genre"><span>disney</span></div></a></li>
        </ul>
    </nav>
</body>
</html>
