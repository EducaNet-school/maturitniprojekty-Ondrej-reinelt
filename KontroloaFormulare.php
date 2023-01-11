<html>
<body>
    <?php
        $error = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $jmeno = $_POST["name"];
            $adresa = $_POST["address"];

            if(!preg_match('/^\w+\s\w+$/',$jmeno)) {
                $error .= "Zadejte prossm platne jmeno se dvema slovy <br>";
            }

            if(strlen($adresa) < 10) {
                $error .= "Zadejte prosim platnou adresu s alespon 10 znaky <br>";
            }

            if(empty($error)) {
                echo "Jmeno: " . $jmeno . "<br>";
                echo "Adresa: " . $adresa;
            } else {
                echo $error;
            }
        }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Jméno: <input type="text" name="jmeno">
        <br>
        Adresa: <input type="text" name="adresa">
        <br>
        <input type="submit" value="Odeslat">
    </form>
</body>
</html>
