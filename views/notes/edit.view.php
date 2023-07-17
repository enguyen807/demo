<?php
require base_path("views/partials/header.php");
require base_path("views/partials/nav.php");
require base_path("views/partials/banner.php");
?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <form method="POST" action="/note">
            <input type="hidden" name="_method" value="PATCH" />
            <input type="hidden" name="_id" value="<?= $note['id'] ?>" />

            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Note Body</label>
                            <div class="mt-2">
                                <textarea 
                                    id="title" 
                                    name="title" 
                                    rows="3"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6"
                                    required
                                ><?= $note['title'] ?></textarea>
                            </div>

                            <?php if (isset($errors['title'])) : ?>
                                <p class="mt-3 text-sm leading-6 text-red-600">
                                    <?= $errors['title'] ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/notes" class="rounded-md text-sm font-semibold leading-6 text-gray-900 px-3 py-2 hover:bg-gray-500 hover:text-white">Cancel</a>
                <button type="submit"
                    class="rounded-md bg-emerald-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600">Update</button>
            </div>
        </form>

    </div>
</main>
<?php
require base_path("views/partials/footer.php");
?>