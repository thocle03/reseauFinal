<?php
//on ajoute le header
require "./Vues/layout/header.php";

$posts = $postController->readAll();
//var_dump($_SESSION["username"]);
?>

<style>
    body {
        background-image: url("https://img.freepik.com/premium-vector/hand-painted-background-violet-orange-colours_23-2148427578.jpg?w=2000")
    }
</style>
<br>
<div class="d-flex flex-wrap justify-content-around">
    <? $userController = new UserController();
    $users = $userController->getAll();

    $manager = new PostController();
    $posts = $manager->readAll();


    ?>
    <?php
    //si on est connecté, on va afficher tous les postes
    if ($_SESSION && $_SESSION["username"]) :
    ?>
        <? //boucle qui fait défiler les  postes ?>
        <?php foreach ($posts as $post) { ?>

            <div class="col-md-4">
                <div class="wsk-cp-product">
                    <div class="wsk-cp-img">
                        <img src="<?= $post->getUrl() ?>" alt="Product" class="img-responsive">
                    </div>
                    <div class="wsk-cp-text">
                        <div class="category">
                            <span><?= $post->getAuthor() ?></span>
                        </div>
                        <div class="title-product">
                            <h3><?= $post->getTitle() ?></h3>
                        </div>
                        <div class="description-prod">
                            <p><?= $post->getContent() ?> <br> <?= $post->getCreate_at() ?></p>
                            
                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <a href="read.php?id=<?= $post->getId() ?>" class="btn btn-success" style="width: 50px"> <i class="fa-sharp fa-solid fa-book-open"></i></a>
                            <? if ($_SESSION["id"] === $post->getUser_id()) : ?>
                                <a href="deletee.php?id=<?= $post->getId() ?>" class="btn btn-danger style=width: 50px"><i class="fa-solid fa-trash"></i></a>
                                <a href="update.php?id=<?= $post->getId() ?>" class="btn btn-warning" style="width: 50px"> <i class="fa-solid fa-pen-to-square"></i></a>
                            <?php endif ?>
                            <a href="" onclick="" class="btn btn-primary" style="width: 50px"> <i class="fa-solid fa-thumbs-up"></i></a>
                        </div>
                    </div>
                    <div id="commentaire-<?= $post->getId() ?>" style="display: none;">
                        <br>
                        <textarea></textarea>
                    </div>
                    <script src="script.js"></script>
                </div>
            </div>
        <?php } ?>
</div>
<script>
    function deleteArticle(id) {
        if (confirm("confirmer la suppression")) {
            window.location.href = "./delete.php?id=" + id
        }
    }
</script>

<script src="./javascript/acceuil.js"></script>
<?php else : ?>
    <h3>Vous devez vous <a href="./login.php">connecter</a> !</h3>
<?php endif ?>

<?php require "./Vues/layout/footer.php"; ?>


<!--
    Style des cartes car elles sont a moitiés bootstrap et à moitié css et ca ne marchait 
    pas quand je faisais un link vers un fichier depuis le header
-->


<style>
    .shell {
        padding: 20px 0;
    }

    .wsk-cp-product {
        background: #fff;
        padding: 15px;
        border-radius: 6px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        position: relative;
        margin: 20px auto;
    }

    .wsk-cp-img {
        position: absolute;
        top: 5px;
        left: 50%;
        transform: translate(-50%);
        -webkit-transform: translate(-50%);
        -ms-transform: translate(-50%);
        -moz-transform: translate(-50%);
        -o-transform: translate(-50%);
        -khtml-transform: translate(-50%);
        width: 100%;
        padding: 15px;
        transition: all 0.2s ease-in-out;
    }

    .wsk-cp-img img {
        width: 100%;
        transition: all 0.2s ease-in-out;
        border-radius: 6px;
    }

    .wsk-cp-product:hover .wsk-cp-img {
        top: -40px;
    }

    .wsk-cp-product:hover .wsk-cp-img img {
        box-shadow: 0 19px 38px rgba(0, 0, 0, 0.30), 0 15px 12px rgba(0, 0, 0, 0.22);
    }

    .wsk-cp-text {
        padding-top: 80%;
    }

    .wsk-cp-text .category {
        text-align: center;
        font-size: 12px;
        font-weight: bold;
        padding: 5px;
        margin-bottom: 30px;
        position: relative;
        transition: all 0.2s ease-in-out;
    }

    .wsk-cp-text .category>* {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        -khtml-transform: translate(-50%, -50%);

    }

    .wsk-cp-text .category>span {
        padding: 12px 30px;
        border: 1px solid #313131;
        background: #212121;
        color: #fff;
        box-shadow: 0 19px 38px rgba(0, 0, 0, 0.30), 0 15px 12px rgba(0, 0, 0, 0.22);
        border-radius: 27px;
        transition: all 0.05s ease-in-out;

    }

    .wsk-cp-product:hover .wsk-cp-text .category>span {
        border-color: #ddd;
        box-shadow: none;
        padding: 11px 28px;
    }

    .wsk-cp-product:hover .wsk-cp-text .category {
        margin-top: 0px;
    }

    .wsk-cp-text .title-product {
        text-align: center;
    }

    .wsk-cp-text .title-product h3 {
        font-size: 20px;
        font-weight: bold;
        margin: 15px auto;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        width: 100%;
    }

    .wsk-cp-text .description-prod p {
        margin: 0;
    }

    /* Truncate */
    .wsk-cp-text .description-prod {
        text-align: center;
        width: 100%;
        height: 122px;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        margin-bottom: 0px;
    }

    .card-footer {
        padding: 25px 0 5px;
        border-top: 1px solid #ddd;
    }

    .card-footer:after,
    .card-footer:before {
        content: '';
        display: table;
    }

    .card-footer:after {
        clear: both;
    }

    .card-footer .wcf-left {
        float: left;

    }

    .card-footer .wcf-right {
        float: right;
    }

    .wsk-btn {
        display: inline-block;
        color: #212121;
        text-align: center;
        font-size: 18px;
        transition: all 0.2s ease-in-out;
        border-color: #FF9800;
        background: #FF9800;
        padding: 12px 30px;
        border-radius: 27px;
        margin: 0 5px;
    }

    .wsk-btn:hover,
    .wsk-btn:focus,
    .wsk-btn:active {
        text-decoration: none;
        color: #fff;
    }

    .red {
        color: #F44336;
        font-size: 22px;
        display: inline-block;
        margin: 0 5px;
    }

    @media screen and (max-width: 991px) {
        .wsk-cp-product {
            margin: 40px auto;
        }

        .wsk-cp-product .wsk-cp-img {
            top: -40px;
        }

        .wsk-cp-product .wsk-cp-img img {
            box-shadow: 0 19px 38px rgba(0, 0, 0, 0.30), 0 15px 12px rgba(0, 0, 0, 0.22);
        }

        .wsk-cp-product .wsk-cp-text .category>span {
            border-color: #ddd;
            box-shadow: none;
            padding: 11px 28px;
        }

        .wsk-cp-product .wsk-cp-text .category {
            margin-top: 0px;
        }

    }
</style>