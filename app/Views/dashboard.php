<?= $this->extend('components/layout.php') ?>

<?= $this->section('content') ?>
<section>
    <h1 class="text-4xl">Battery Inventory Statistics</h1>

    <div class="mt-4 flex justify-between gap-4">
        <?php echo view("components/card.php", ['title' => 'Total Inventory', 'value' => $totalInventory ?? 0, 'description' => 'Total batteries in inventory']) ?>
        <?php echo view("components/card.php", ['title' => 'Total Shipments', 'value' => $totalShipments ?? 0, 'description' => 'Total batteries sent']) ?>
        <?php echo view("components/card.php", ['title' => 'Total Countries', 'value' => $totalCountries ?? 0, 'description' => 'Total countries batteries sent to']) ?>
    </div>

    <div class="mt-6">
        <?php echo view("components/chart.php") ?>
    </div>
</section>
<?= $this->endSection() ?>
