<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
</head>
<body>

<nav class="navbar navbar-default">

<!-- Top bar --> 
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">FundMe</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact info</a></li>
            <li><a href="support.php">Support</a></li>
            <li><a href="faq.php">FAQ</a></li>
            <li><a href="searchbar.php">Search<img src="search_icon.png" alt="Search Icon" width="20" height="20"></a></li>
            <li> <a href="login.php">
                <button type="submit" class="btn btn-primary">Sign In</button></a>
            </li> 
            
        </ul>
    </div>

<!-- Bottom bar -->
<div class="navbar navbar-default navbar-fixed-bottom">
    <div class="container-fluid">
        <div style="display: flex; align-items: center;">
        <a href="index.php">
            <img src="logo.jpg" alt="Logo" width="50" height="50">
            <a href="legal.php" style="margin-left: auto;">Legal Agreement</a>
        </div>
    </div>
</div>

</nav>

</body>
</html>
