<?php
session_start();
unset($_SESSION["email"]);
unset($_SESSION['number_phone']);
unset($_SESSION['password']);
echo '<script>
window.location = "/buyer/sign_in.php"
</script>';