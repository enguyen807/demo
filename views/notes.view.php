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

        <p class="mt-6">
            <a href="/notes/create" class="rounded-md bg-green-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">+ Create Note</a>
        </p>
    </div>
</main>
<?php
    require("views/partials/footer.php");
?>