<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hello Akhmad Aprizhal - 2110020062</title>
</head>

<body>
    <h1>Selamat Datang di web <?= $nama; ?> - <?= $npm ?></h1>
    <?php
    if (isset($mvc)) {
        echo $mvc;
    }
    ?>
</body>

</html>