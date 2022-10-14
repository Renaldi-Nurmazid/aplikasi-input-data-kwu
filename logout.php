<?php
include('./kwu_config.php');
session_destroy();
echo"
<script>
alert('Logout Berhasil');
window.location='login.php';
</script>"
;
?>