<?php
require_once "../site/functions_users.php";
init_session();
if($_SESSION['auth']['nickname'])
{

}
else
{
    header ("Location: connexion.php");
}
require_once "admin_header.php";
?>

Hello world!

<h2>Bonjour <?php echo $_SESSION['auth']['nickname']; ?></h2>

<a href="logout.php"> Se déconnecter </a>

<?php
require_once "admin_footer.php";
?>
