<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>filmuz</title>
    <link rel="stylesheet" href="css/screen.css">
</head>
<body>
    <header class="header-home clearfix">
        <a href="index.php"><img src="img-layout/logo.png" class="logo" alt="logo"></a>
        <div class="search-bar">

            <form method="post" action="search.php"/>
            <form method="post" action="search.php"/>

            <input type="text" name="recherche" id="search" placeholder="rechercher une bo">
            <input type="button" name="bouton" id="bouton" value="OK">
        </div>
    </header>
    <nav class="nav-big">
        <ul>
            <li><a href="western.php"><img src="img-content/western.jpg" alt=""><div class="nav-genre"><span>western</span></div></a></li>
            <li><a href="scifi.php"><img src="img-content/sci-fi.jpg" alt=""><div class="nav-genre"><span>sci-fi</span></div></a></li>
            <li><a href="action.php"><img src="img-content/action.jpg" alt=""><div class="nav-genre"><span>action</span></div></a></li>
            <li><a href="disney.php"><img src="img-content/disney.jpg" alt=""><div class="nav-genre"><span>disney</span></div></a></li>
        </ul>
    </nav>
</body>
</html>