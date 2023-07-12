<?php
    require base_path("views/partials/header.php");
    require base_path("views/partials/nav.php");
    require base_path("views/partials/banner.php");
?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p class="mb-6">
            <a href="/notes" class="text-green-500 hover:underline"><- Back</a>
        </p>
        <h1><?= htmlspecialchars($note['title']) ?></h1>
    </div>
</main>
<?php
    require base_path("views/partials/footer.php");
?>