<div class = "articles-index">
    <div class = "jumbotron">
        <h1>Article</h1>
    </div>
    <div class = "row">
        <?php foreach ($article as $article) :?>

            <div class = "col-lg-4">
                <h3><?= $article->title?></h3><br>
                <?= $article->text?>
            </div>
        <?php endforeach;?>
    </div>
</div>
