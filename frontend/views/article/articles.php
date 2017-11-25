<?php
use yii\helpers\Url;
?>
<div class = "articles-index">
    <div class = "jumbotron">
        <h1>Articles</h1>
    </div>
    <div class = "row">
        <?php foreach ($articles as $article) :?>
            <div class = "col-lg-4">
                <h3>
                    <a href="<?= Url::to(['article/article', 'id' => $article->id]);?>">
                       <?= $article->title ?>
                    </a>
                </h3>

                <p><?= $article->getShortText($article->text) ?></p>

                <p><a class = "btn btn-default" href="<?= Url::to(['article/article', 'id' => $article->id]);?>">Читать далее >>></a></p>
            </div>
        <?php endforeach;?>
    </div>
</div>
