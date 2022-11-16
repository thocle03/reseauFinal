<?php
require "./Vues/layout/header.php";
if ($_POST) {
    $posts = new PostController();
    $datas = [
        "title" => $_POST["title"],
        "content" => $_POST["content"],
        "todaydate" => date("Y-m-d H:i:s"),
        "author" => $_SESSION['username'],
        "user_id" => $_SESSION['id'],
        "url" => $_POST["url"],

    ];
    //$newPost = new Post($_POST);
    $postController->create(new Post($datas));
    echo "<script>window.location.href = './index.php'</script>";

}

?>
<style>
    body {
        background-image: url("https://img.freepik.com/premium-vector/hand-painted-background-violet-orange-colours_23-2148427578.jpg?w=2000")
    }
</style>
<br>
<h3>Nouvelle Publication</h3>
<form method="POST">
    <div class="mb-3">
        <label for="title" class="form-label">Titre</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Contenue :</label>
        <textarea type="text" name="content" id="content" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label for="url" class="form-label">URL de l'image</label>
        <input type="text" name="url" class="form-control" id="url" placeholder="">
    </div>
    <!--<div class="mb-3">
        <input type="hidden" name="author" class="form-control" id="author"?>">
    </div>-->
    <input type="submit" value="Ajouter" class="btn btn-success">

</form>
<br><br>
<?php
require "./Vues/layout/footer.php";

?>