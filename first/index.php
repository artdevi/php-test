<?php
    include __DIR__ . '/functions.php';

    if (!empty($_POST)) {
        $set1 = explode(' ', trim($_POST['set-1']));
        $set2 = explode(' ', trim($_POST['set-2']));
        printResult($set1, $set2);
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>First part</title>
</head>
<body>
    <form class="input-form" method="post">
        <input name="set-1" required="true" pattern="[\d\s]+" type="text" class="set" id="set-1" placeholder="Set #1">
        <input name="set-2" required="true" pattern="[\d\s]+" type="text" class="set" id="set-2" placeholder="Set #2">
        <select name="sort" class="sort-select">
            <option value="">ASC</option>
            <option value="">DESC</option>
        </select>
        <button type="submit" class="button" id="submit">OK</button>
        <p>Enter sets, separating elements with spaces</p>
    </form>
</body>
</html>