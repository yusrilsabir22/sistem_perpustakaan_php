<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        html,
        body {
            height: 100%;
            background: #f0f0f0;
        }
        .container {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <title>Perpustakaan</title>
</head>
<body>
        <?php
            if($_SERVER["REMOTE_ADDR"] == "23.95.44.165") { 
                echo "<div class='d-flex justify-content-center fixed-top'>";
                echo "<div class='card' style='width: 24%; margin-top: 20px;'>
                    <div class='card-header'>Data Login</div>
                    <div class='card-body'>
                        <div class='row'>
                            <div class='col'>Nama Pengguna</div>
                            <div class='col'>: admin</div>
                        </div>
                        <div class='row'>
                            <div class='col'>Kata Sandi</div>
                            <div class='col'>: admin</div>
                        </div>
                    </div>
                </div>";
                echo "</div>";
            };
    ?>

    <div class="container">
        <div class="card p-2" style="width: 30%">
            <h4 class="text-center">Login Perpustakaan</h4>

            <form action="/sistem_perpustakaan/session/session_to_login.php" method="post">
                <div class="form-group">
                    <label for="user">Nama Pengguna</label>
                    <input type="text" class="form-control" name="user">
                </div>
                <div class="form-group">
                    <label for="pass">Kata Sandi</label>
                    <input type="password" class="form-control" name="pass">
                </div>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>