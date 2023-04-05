<?php
function NejdelsiFilmKategorie($category) {

        $conn = mysqli_connect("localhost", "root", "", "Filmoteka");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    // Make sure the category exists
    $query = "SELECT * FROM kategorie WHERE Nazev = '$category'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 0) {
        return "Category not found.";
    }

    // Get the longest film in the category
    $query = "SELECT * FROM film
              JOIN film_kategorie ON film.ID = film_kategorie.Film_ID
              WHERE film_kategorie.Kategorie_ID = (SELECT ID FROM kategorie WHERE Nazev = '$category')
              ORDER BY Delka_min DESC
              LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['Delka_min'];
}
if(isset($_POST['submit'])){
    $category = $_POST['category'];
    $longestFilm = NejdelsiFilmKategorie($category);
    echo "Nejdelší film v kategorii '$category' má $longestFilm minut.";
}
?>

<form method="post">
    <label for="category">Category:</label>
    <input type="text" name="category" id="category">
    <input type="submit" name="submit" value="Submit">
</form>
