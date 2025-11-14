<?= $this->extend('components/layout.php') ?>

<?= $this->section('content') ?>
<section>
    <h1 class="text-4xl">Inventory Statistics</h1>

    <div class="mt-4 flex justify-between gap-4">
        <?php echo view("components/card.php") ?>
        <?php echo view("components/card.php") ?>
        <?php echo view("components/card.php") ?>
    </div>
</section>
<?= $this->endSection() ?>
