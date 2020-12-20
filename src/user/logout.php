<?php
    setcookie('userid', $user['id'], time() - 3600, "/");
    setcookie('username', $user['name'], time() - 3600, "/");
    setcookie('useremail', $user['mail'], time() - 3600, "/");
    setcookie('userphone', $user['phonenumber'], time() - 3600, "/");
    setcookie('isadmin', $user['isAdmin'], time() - 3600, "/");
    header('Location: /');
 ?>