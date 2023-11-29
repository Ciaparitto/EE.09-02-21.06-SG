<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl2.css">
    <title>Document</title>
</head>
<body>
    <?php
    if(!empty($_POST["nazwa"]) && !empty($_POST["cena"]))
    {
    $conn = mysqli_connect("localhost","root","","warzywniak");
    $query =mysqli_query($conn,"INSERT INTO Produkty (Rodzaje_id, Producenci_id, nazwa, ilosc, opis, cena, zdjecie) VALUES ((SELECT id FROM Rodzaje WHERE nazwa = 'owoce'), (SELECT id FROM Producenci WHERE nazwa = 'warzywa-rolnik'),'owoc1', 10, '', 9.99, 'owoce.jpg')");
    mysqli_close($conn);    
    }
   ?>
    <div id="banerL">
        <h1>internetowy sklep z eko-warzywami</h1>             
    </div>
    <div id="banerP">
        <ol>
            <li>warzywa</li>
            <li>owoce</li>
            <li><a href="https://terapiasokami.pl/"target="_blank" >Soki</a></li>
        </ol>
    </div>
    <main>
   
        <?php
        $conn = mysqli_connect("localhost","root","","warzywniak");
      
        $query = mysqli_query($conn, "SELECT nazwa,ilosc,opis,cena,zdjecie FROM produkty WHERE Rodzaje_id = 1 OR Rodzaje_id = 2");
        while($w = mysqli_fetch_row($query)){
            echo '<div id="produkt">';
            echo '<img src="' . $w[4] . '" alt="warzywniak">';
            echo '<h5>' . $w[0] . '</h5>';
            echo '<p>opis: ' . $w[2] . '</p>';
            echo '<p>na stanie: ' . $w[1] . '</p>';
            echo '<h2>' . $w[3] . 'zł';
            echo '</div>';
        }
        mysqli_close($conn);
        ?>
        
    </main>
    <footer>
        <form action="sklep.php" method="post">
            <input type="text" name="nazwa" id="nazwa">
            <label for="nazwa">Nazwa</label>
            <input type="text" name="cena" id="cena">
            <label for="cena">Cena</label>
            <button>Dodaj produkt</button>
        </form>
        strone wykonal:0000000
    </footer>
</body>
</html>