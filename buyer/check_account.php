<?php
if (!empty($_SESSION["id"])) {
}

if (empty($_SESSION["id"])) {
    echo '<script>
window.location = "/buyer/sign_in.php"
</script>';
}
