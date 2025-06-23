<h2><?= htmlspecialchars($author['name']) ?></h2>
<img src="/MVC-Library/Public/Images/Photos/<?= htmlspecialchars($author['photo'] ?? '') ?>" alt="Author">
<p><?= htmlspecialchars($author['bio']) ?></p>

<h3>Books by this author:</h3>
<ul>
    <?php foreach ($author['books'] as $book): ?>
        <li><a href="book?id=<?= $book['id'] ?>"><?= htmlspecialchars($book['title']) ?></a></li>
    <?php endforeach; ?>
</ul>