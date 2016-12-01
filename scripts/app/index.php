<?php
//header('Content-Type: text/html; charset=utf-8');
/**
 * Created by PhpStorm.
 * User: yury
 * Date: 01.12.2016
 * Time: 13:44
 */
include_once __DIR__."/db.php";
$countriesArray = [];
foreach( DB::query("SELECT * FROM country") as $row) {
    $countriesArray[$row['id']] = $row['name'];
}
echo("<xmp>");print_r($_POST);echo("</xmp>");
if(isset($_POST))
{

}
?>
<!DOCTYPE HTML>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Приложение</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css"
          integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js"
            integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK"
            crossorigin="anonymous"></script>
</head>

<body>

<header>
    <nav class="navbar navbar-light bg-faded">
        <a class="navbar-brand" href="#">ФГУП «Электронные торги и безопасность»</a>
    </nav>
</header>
<br />
<div class="container-fluid">
    <section>
        <div class="row">
            <div class="col-sm-3">
                <form method="POST" action="index.php">
                    <div class="form-group">
                        <label for="fio">ФИО</label>
                        <input type="text" class="form-control" id="fio" placeholder="Введите ФИО">
                    </div>
                    <div class="form-group">
                        <label for="phone">Телефон</label>
                        <input type="text" class="form-control" id="phone" placeholder="Ввведите телефон в формате +x-(xxx)-xxx-xx-xx">
                    </div>
                    <div class="form-group">
                        <label for="country">Страна</label>
                        <select class="form-control" id="country">
                        <?php foreach($countriesArray as $id => $name) { ?>
                            <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </form>
            </div>
            <div class="col-sm-9">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>ФИО</th>
                        <th>Телефон</th>
                        <th>Страна</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                    </tbody>
                </table>
            </div>
    </section>

    <footer>
        <p>Copyright 2016</p>
    </footer>
</div>

</body>

</html>
