<?php
// Assuming $result is the result from the search query

if ($result->num_rows > 0) {
    echo "<h2>Search Results:</h2>";
    while ($row = $result->fetch_assoc()) {
        echo "<p>";
        echo "Name: " . $row["name"] . "<br>";
        echo "Generation: " . $row["generation"] . "<br>";
        echo "Type: " . $row["type"] . "<br>";
        echo "<a href='add_to_team.php?id=" . $row["id"] . "'>Add to Team</a>";
        echo "</p>";
    }
} else {
    echo "No results found.";
}
?>
