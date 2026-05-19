<h1>Blog Articles</h1>

<?php foreach ($articles as $article): ?>
    <article>
        <h2>
            <?= $this->Html->link(
                h($article->title),
                ['action' => 'view', $article->slug]
            ) ?>
        </h2>
        <p>
            <small>Published: <?= $article->created->format('F d, Y') ?></small>
        </p>
        <p><?= h($article->body) ?></p>
    </article>
<?php endforeach; ?>

<?= $this->Html->link('New Article', ['action' => 'add'], ['class' => 'button']) ?>