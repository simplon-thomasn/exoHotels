<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <link href="exohotels.css" rel="stylesheet" />
    <title>Exercice PHP - Hotel</title>
</head>
<body>
    <header>
        <h1>Exercice PHP - Les Hotels</h1>
    </header>

    <?php foreach ($hotels as $hotel): ?>
    <article>
        <h2><?php echo $hotel->getName(); ?></h2>
        <p><?php echo $hotel->getAddress(); ?></p>
    </article>
    <?php endforeach ?>
    <footer class="footer">
        Ceci est un exercice de construction d'une application qui respecte une architecture PHP pro !
    </footer>
</body>
</html>
