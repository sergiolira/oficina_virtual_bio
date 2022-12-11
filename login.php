<?php
if($_SERVER['HTTP_HOST']=='localhost'){
header('Location: https://localhost/login-admin.php');
exit();
}
elseif($_SERVER['HTTP_HOST']=='adminbio.wisbac.com'){
header('Location: https://adminbio.wisbac.com/login-admin');
exit();
}
elseif($_SERVER['HTTP_HOST']=='oficinavirtualbio.wisbac.com'){
header('Location: https://oficinavirtualbio.wisbac.com/login-asesor');
exit();
}
exit();
?>