<?php
if (!empty($_SESSION["email"]) && !empty($_SESSION["number_phone"]) && !empty($_SESSION["password"])) {
}

if (empty($_SESSION["email"]) || empty($_SESSION["number_phone"]) || empty($_SESSION["password"])) {
    echo '<script>
window.location = "/buyer/sign_in.php"
</script>';
}
