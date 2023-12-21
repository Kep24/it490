<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémon Team Builder</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="Assets/css/pokesearch.css">
</head>
<body>
<div class="container-fluid bg-image" style="background-image: url('Assets/images/background.jpg'); height: 100vh;">
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

    <ul>
        <li><a href="home.php">Return to Home Page</a></li>
        <!-- Add more links if needed -->
    </ul>
</div>
</body>
</html>
