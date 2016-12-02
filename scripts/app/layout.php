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
        <a class="navbar-brand" href="index.php">ФГУП «Электронные торги и безопасность»</a>
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
            <div class="col-sm-3">
                <form method="POST" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
                    <div class="form-group<?php echo (isset($fio) && !$fio) ? ' has-danger' : '' ?>">
                        <label for="fio">ФИО</label>
                        <input type="text"
                               class="form-control<?php echo (isset($fio) && !$fio) ? ' form-control-danger' : '' ?>"
                               id="fio" placeholder="Введите ФИО" name="fio"
                               value="<?php echo isset($user) ? $user['fio'] : '' ?>">
                    </div>
                    <div class="form-group<?php echo (isset($phone) && !$phone) ? ' has-danger' : '' ?>">
                        <label for="phone">Телефон</label>
                        <input type="text"
                               class="form-control<?php echo (isset($phone) && !$phone) ? ' form-control-danger' : '' ?>"
                               id="phone"
                               placeholder="Ввведите телефон в формате +x-(xxx)-xxx-xx-xx" name="phone"
                               value="<?php echo isset($user) ? $user['phone'] : ''; ?>">
                    </div>
                    <div class="form-group<?php echo (isset($country) && !$country) ? ' has-danger' : '' ?>">
                        <label for="country">Страна</label>
                        <select
                            class="form-control<?php echo (isset($country) && !$country) ? ' form-control-danger' : '' ?>"
                            id="country" name="country">
                            <?php foreach ($countriesArray as $id => $name) { ?>
                                <option
                                    value="<?php echo $id; ?>"<?php echo (isset($user) && $user['country_id'] == $id) ? ' selected' : ''; ?>><?php echo $name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit"
                            class="btn btn-primary"><?php echo isset($user) ? 'Обновить' : 'Добавить' ?></button>
                </form>
            </div>
            <div class="col-sm-9">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th><a href="index.php?sort=<?php echo ($sort === 1) ? 0 : 1; ?>">ФИО</a></th>
                        <th>Телефон</th>
                        <th>Страна</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (count($users)) { ?>
                        <?php foreach ($users as $id => $user) { ?>
                            <tr>
                                <th scope="row"><?php echo $user['id']; ?></th>
                                <td><a href="index.php?edit=<?php echo $user['id']; ?>"><?php echo $user['fio']; ?></a>
                                </td>
                                <td><?php echo $user['phone']; ?></td>
                                <td><?php echo $countriesArray[$user['country_id']]; ?></td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="4">
                                Не найдено
                            </td>
                        </tr>
                    <?php } ?>
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
