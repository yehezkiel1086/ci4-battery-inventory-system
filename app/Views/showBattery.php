<?= $this->extend('components/layout.php') ?>

<?= $this->section('content') ?>
<section>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-4xl">Battery Details</h1>
        <a href="/batteries" class="text-blue-500 hover:underline">&larr; Go back to batteries list</a>
    </div>

    <?php if (!empty($battery)) : ?>
        <div class="bg-white shadow-md rounded-lg p-6 max-w-lg border">
            <div class="mb-4">
                <h2 class="text-2xl font-bold text-gray-800"><?= esc($battery['name']) ?></h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700">
                <div>
                    <p class="font-semibold">Tipe:</p>
                    <p><?= esc($battery['type']) ?></p>
                </div>
                <div>
                    <p class="font-semibold">Kapasitas:</p>
                    <p><?= esc($battery['capacity']) ?></p>
                </div>
                <div>
                    <p class="font-semibold">Voltage:</p>
                    <p><?= esc($battery['voltage']) ?></p>
                </div>
                <div>
                    <p class="font-semibold">Harga:</p>
                    <p>Rp <?= number_format($battery['price'], 2, ',', '.') ?></p>
                </div>
            </div>
        </div>
    <?php else : ?>
        <p class="text-center text-gray-500">Battery not found.</p>
    <?php endif; ?>
</section>
<?= $this->endSection() ?>