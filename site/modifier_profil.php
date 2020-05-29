<?php
require_once "functions_users.php";

init_session();
$is_error = !nickname_exists() . !email_exists() .  !password_est_valide();

extract($_POST);

if(isset($pseudo) && !empty($pseudo) && empty($email) && empty($pwd) && empty($pwdConfirm))
{
    if (!nickname_exists()) {
        if (modifierProfil()) {
            header("Location: profil.php");
        }
    } elseif (nickname_exists()) {
        header("Location: profil.php?" . nickname_exists());
    }
}
else if(isset($email) && !empty($email) && empty($pseudo) && empty($pwd) && empty($pwdConfirm))
{
    if (!email_exists()) {
        if (modifierProfil()) {
            header("Location: profil.php");
        }
    } elseif (email_exists()) {
        header("Location: profil.php?" . email_exists());
    }
}
else if(isset($pwd, $pwdConfirm) && empty($email) && empty($email) && !empty($pwd) && !empty($pwdConfirm))
{
    if (!password_est_valide()) {
        if (modifierProfil()) {
            header("Location: profil.php");
        }
    } else {
        header("Location: profil.php?" . password_est_valide());
    }
}else if(isset($pseudo, $email, $pwdConfirm, $pwd))
{
    if ($is_error) {
        if (modifierProfil()) {
            header("Location: profil.php");
        }
    } else {
        header("Location: profil.php?" . $is_error);
    }
}



