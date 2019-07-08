<?php
    session_start();
    unset($_SESSION['pengguna']);
    session_destroy();
    echo "<script>location.href='../page/login'</script>";
?>