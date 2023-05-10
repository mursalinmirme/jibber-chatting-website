<?php
session_start();
if(isset($_POST['logOutBtn'])){
session_unset();
session_destroy();
echo 'logoutsuccessfully';
exit;
}
?>