<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémon Team Builder</title>
</head>
<body>
    <h1>Pokémon Team Builder</h1>

    <!-- Search Form -->
    <form action="search.php" method="get">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" placeholder="Enter Pokémon Name">

        <label for="generation">Generation:</label>
        <input type="text" name="generation" id="generation" placeholder="Enter Generation">

        <label for="type">Type:</label>
        <input type="text" name="type" id="type" placeholder="Enter Pokémon Type">

        <input type="submit" value="Search">
    </form>

    <!-- Results Display and Add to Team Form -->
    <?php include 'display_results.php'; ?>

</body>
</html>
