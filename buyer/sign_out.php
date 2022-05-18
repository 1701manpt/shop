<?php
session_start();
unset($_SESSION["id"]);
echo '<script>
window.location = "/buyer/sign_in.php"
</script>';