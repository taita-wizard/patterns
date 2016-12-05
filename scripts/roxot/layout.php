<?php
/**
 * Created by PhpStorm.
 * User: yury
 * Date: 05.12.2016
 * Time: 14:26
 */
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Приложение</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css"
          integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js"
            integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK"
            crossorigin="anonymous"></script>
</head>

<body>

<header>
    <nav class="navbar navbar-light bg-faded">
        <a class="navbar-brand" href="index.php">ROXOT</a>
        <form class="form-inline float-xs-right" method="GET" action="index.php">
            <input class="form-control" type="text" placeholder="Search" name="search"
                   value="<?php echo $search ? $search : ''; ?>">
            <button class="btn btn-outline-success" type="submit">Поиск</button>
        </form>
    </nav>
</header>
<br/>
<div class="container-fluid">
    <section>
        <div class="row">

        </div>
    </section>

    <footer>
        <p>Copyright 2016</p>
    </footer>
</div>

</body>

</html>

