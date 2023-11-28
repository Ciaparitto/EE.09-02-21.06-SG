<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl2.css">
    <title>Document</title>
</head>
<body>
    <div id="banerL">
        <h1>internetowy sklep z eko-warzywami</h1>             
    </div>
    <div id="banerP">
        <ul>
            <li>warzywa</li>
            <li>owoce</li>
            <li><a href="https://terapiasokami.pl/" >Soki</a></li>
        </ul>
    </div>
    <div id="glowny">
   
        <?php
        $conn = mysqli_connect("localhost","root","","warzywniak");
      
        $query = mysqli_query($conn, "SELECT nazwa,ilosc,opis,cena,zdjecie FROM produkty WHERE Rodzaje_id = 1 OR Rodzaje_id = 2");
        while($wynik = mysqli_fetch_row($query)){
            echo "<div class='generowany'>
            <img src='$wynik[4]' alt='warzywniak'>
            <h5>$wynik[0]</h5>
            <p>opis:$wynik[2]</p>
            <p>na stanie:$wynik[1]</p>
            <h2>$wynik[3] zł</h2>
            </div>";
        }
        mysqli_close($conn);
        ?>
        
    </div>
    <footer>
        <form action="sklep.php">
            <input type="text" name="nazwa" id="nazwa">
            <label for="nazwa">Nazwa</label>
            <input type="text" name="cena" id="cena">
            <label for="cena">Cena</label>
            <button>Dodaj produkt</button>
        </form>
        <?php
            
            if(!empty($_POST["nazwa"]) && !empty($_POST["cena"]))
            {
            $conn = mysqli_connect("localhost","root","","warzywniak");
            $query =mysqli_query($conn,"INSERT INTO Produkty (Rodzaje_id, Producenci_id, nazwa, ilosc, opis, cena, zdjecie) VALUES ((SELECT id FROM Rodzaje WHERE nazwa = 'owoce'), (SELECT id FROM Producenci WHERE nazwa = 'warzywa-rolnik'),'owoc1', 10, '', 9.99, 'owoce.jpg')");
            mysqli_close($conn);    
            }
           
        ?>
        strone wykonal:0000000
    </footer>
</body>
</html>