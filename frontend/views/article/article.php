<?php
use yii\helpers\Url;
?>
<div class = "articles-index">
    <div class = "jumbotron">
        <h1>Article</h1>
    </div>
    <div class = "row">

                <h3><?= $article->getFullTitle($article->title)?></h3><br>
                <?= $article->text?>
                <span>
                    <?= $article->author_id?>
                    <?= $article->getDescription($article->likes, 'like')?>
                    <?= $article->getDescription($article->hits, 'hit')?>
                </span>
            <strong>
                <p> <a href="<?= Url::to(['article/articles'])?>"><<< Вернуться обратно</a></p>
            </strong>



    </div>
</div>
