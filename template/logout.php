<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="refresh" content="2;url=home.php">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title>Logout</title>
</head>
<body style="background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%); min-height:100vh;">
    <div class="d-flex justify-content-center align-items-center" style="height:100vh;">
        <div class="alert alert-success text-center shadow-lg" role="alert" style="max-width: 400px;">
            <h4 class="alert-heading mb-2"><i class="fa fa-check-circle text-success"></i> Logout Berhasil!</h4>
            <p class="mb-0">Anda telah berhasil logout.<br>Anda akan diarahkan ke halaman utama...</p>
        </div>
    </div>
</body>
</html>