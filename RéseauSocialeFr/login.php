<?php
// on recupere le header
require "./Vues/layout/header.php";
?>
<br>
<?php
//on recupere les informations du post
if ($_POST) {
    //var_dump($_POST);
    $userData = [
        //"username" => $_POST['username'],
        "password" => $_POST['password'],
        "email" => $_POST['email']
    ];
    $usermanager = new UserController();
    $users = $usermanager->getAll();
    foreach ($users as $user) {
        if ($_POST["email"] === $user->getEmail() && password_verify($_POST["password"], $user->getPassword())) {
            $_SESSION["username"] = $user->getUsername();
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["password"] = $_POST["password"];
            $_SESSION["id"] = $user->getId();


            echo "<script>window.location.href= './index.php'</script>";
        }
    }

    //$existingAccount = false;
    //$findExistingUser = new UserController();
    //$users = $findExistingUser->getAll();
    //foreach ($users as $user) {
    //if ($user->getEmail() != $userData['email'] && $existingAccount == False && $user->getPassword() != $userData['password']) {
    //$existingAccount = False;
    //break;
    //}
    // }
    //if ($existingAccount == false) {

    //echo "<script>window.location.href= './index.php'</script>";
    //}

}

?>
<style>
    body {
        background-image: url("https://img.freepik.com/premium-vector/hand-painted-background-violet-orange-colours_23-2148427578.jpg?w=2000")
    }
</style>
<br>
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://thumbs.dreamstime.com/b/illustration-de-multisport-102021356.jpg" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="POST">
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        <p class="lead fw-normal mb-0 me-3">Se connecter avec</p>
                        <button type="button" class="btn btn-primary btn-floating mx-1">
                            <i class="fab fa-facebook-f"></i>
                        </button>

                        <button type="button" class="btn btn-primary btn-floating mx-1">
                            <i class="fab fa-twitter"></i>
                        </button>

                        <button type="button" class="btn btn-primary btn-floating mx-1">
                            <i class="fab fa-linkedin-in"></i>
                        </button>
                    </div>

                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0">Où</p>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="email" class="form-control form-control-lg" placeholder="Enter a valid email address" name="email" />
                        <label class="form-label" for="email">Adresse mail</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Enter password" />
                        <label class="form-label" for="password">Mot de passe</label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" name="remember" value="" id="remember" />
                            <label class="form-check-label" for="remember">
                                Se souvenir de moi
                            </label>
                        </div>
                        <!--<a href="#!" class="text-body">Forgot password?</a>-->
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Se connecter</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Pas encore de compte ? <a href="./register.php" class="link-danger">Créer un compte</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">

    <div class="text-white mb-3 mb-md-0">
      Copyright © 2020. All rights reserved.
    </div>

    <div>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-google"></i>
      </a>
      <a href="#!" class="text-white">
        <i class="fab fa-linkedin-in"></i>
      </a>
    </div>

  </div> -->
</section>

<?php
require "./Vues/layout/footer.php";
?>