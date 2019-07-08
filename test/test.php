<?php
    session_start();

    if(!isset($_SESSION["pengguna"])) {
        die("Silahkan melakukan autentikasi, anda akan diteruskan ke halaman login secara otomatis!!! <script>setTimeout(function(){ location.href='page/login.php';}, 2000)</script>");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Buku</title>
    <!-- <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
    <nav id="menu" class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
        <a class="navbar-brand" href="buku.php">Perpustakaan</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <div class="navbar-nav">
            <a class="nav-item nav-link" href="page/buku.php">Buku</a>
            <a class="nav-item nav-link" href="#"></a>
            <a class="nav-item nav-link" href="peminjaman.php">Peminjaman</a>
            </div>
            </div>
        </div>
        <a href="../session/session_to_logout.php" class="btn btn-danger text-white" style="cursor: pointer;">Logout</a>
    </nav>

    <div id="module-wrapper"></div>

    <script>
        (function() {
            var $moduleWrapper = $('#module-wrapper');

            var loadIntoModuleWrapper = function(e) {
                e.preventDefault();

                var $anchor = $(this);
                var page = $anchor.attr('href');
                console.log(page)
                $moduleWrapper.load(page);
                window.history.pushState("object or string", "Buku", page);
            };

            var sendFormAndLoadIntoModuleWrapper = function(e) {
                e.preventDefault();

                var $form = $(this);
                var method = $form.attr('method') || 'GET';

                $.ajax({
                    type: $form.attr('method') || 'GET',
                    url: $form.attr('action'),
                    data: $form.serialize(),
                    success: function(data) {
                        $moduleWrapper.html(data);
                    }
                });
            };

            // manage menu links to load content links onto module wrapper
            $('#menu').on('click', 'a', loadIntoModuleWrapper);

            $moduleWrapper.load("page/buku.php");
            // manage module-wrapper links to load onto module wrapper
            $moduleWrapper.on('click', '.open', loadIntoModuleWrapper);

            // manage submits form and load result onto module wrapper
            $moduleWrapper.on('submit', '.open-form', sendFormAndLoadIntoModuleWrapper);
        }());
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>