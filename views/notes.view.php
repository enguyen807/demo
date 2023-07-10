<?php
    require("views/partials/header.php");
    require("views/partials/nav.php");
    require("views/partials/banner.php");
?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <ul>
            <?php foreach ($notes as $note) : ?>
                <li>
                    <a href="/note?id=<?= $note['id'] ?>" class="text-green-500 hover:underline">
                        <?= $note['title'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</main>
<?php
    require("views/partials/footer.php");
?>