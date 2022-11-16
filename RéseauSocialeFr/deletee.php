<?php  
//fonction qui charge la classe
function loadClass(string $class)
    {
        if (strpos($class, "Controller")) {

            require "./Controller/$class.php";
        } else {
            require "./Entity/$class.php";
        }
    }

    spl_autoload_register("loadClass");

$manager = new PostController();
//fonction qui supprime les articles
if ($_GET) {
	$manager->delete($_GET['id']);
	echo "<script>window.location.href='index.php'</script>";
}