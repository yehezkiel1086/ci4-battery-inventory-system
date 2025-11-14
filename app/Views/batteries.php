<?= $this->extend('components/layout.php') ?>

<?= $this->section('content') ?>
<section>
  <h1 class="text-4xl">Batteries</h1>
  <div class="mt-4">
    <?=  view("components/table.php") ?>
  </div>
</section>
<?= $this->endSection() ?>
