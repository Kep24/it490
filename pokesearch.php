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
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <h1>Pokémon Team Builder</h1>
            </div>
            <div class="col"></div>
        </div>
        <div class="row"><!-- Search Form -->
            <div class="col"></div>
            <div class="col">
                <form action="search.php" method="get">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" placeholder="Enter Pokémon Name"><br>

                    <label for="generation">Generation:</label>
                    <input type="text" name="generation" id="generation" placeholder="Enter Generation"><br>

                    <label for="type">Type:</label>
                    <input type="text" name="type" id="type" placeholder="Enter Pokémon Type"><br>

                    <input type="submit" value="Search">
                </form>
            </div>
            <div class="col"></div>

        </div>
        <div class="row"><!-- Results Display and Add to Team Form -->
            <?php include 'display_results.php'; ?>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col-2" id="box">
                <a href="home.php">Return to Home Page</a>
                <!-- Add more links if needed -->
            </div>
            <div class="col"></div>
        </div>






    </div>
</body>

</html>