<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css"> 
    <title>Search Bar</title>
    <style>
        h1 {
            text-align: center;
            font-size: 10em !important;
        }

        .search-container {
            background-image: url('fundme.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            padding: 100px;
        }

        .search-bar {
        }
    </style>
</head>
<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <h4>
            <div class="search-container">
                <form class="search-bar" action="search.php" method="GET">
                    <input type="text" placeholder="Type here to search..." name="query">
                    <button type="submit">Search</button>
                </form>
            </div>
        </h4>
    </div>
</body>
</html>
