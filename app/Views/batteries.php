<?= $this->extend('components/layout.php') ?>

<?= $this->section('content') ?>
<section>
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-4xl">Batteries</h1>
    <a href="/batteries/new" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
      Create New Battery
    </a>
  </div>

  <?php if (session()->getFlashdata('message')) : ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
      <span class="block sm:inline"><?= session()->getFlashdata('message') ?></span>
    </div>
  <?php endif; ?>

  <div class="relative overflow-x-auto bg-white shadow-md sm:rounded-lg border">
    <table class="w-full text-sm text-left text-gray-500">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
          <th scope="col" class="px-6 py-3">Nama Produk</th>
          <th scope="col" class="px-6 py-3">Tipe</th>
          <th scope="col" class="px-6 py-3">Kapasitas</th>
          <th scope="col" class="px-6 py-3">Voltage</th>
          <th scope="col" class="px-6 py-3">Harga</th>
          <th scope="col" class="px-6 py-3"><span class="sr-only">Actions</span></th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($batteries) && is_array($batteries)) : ?>
          <?php foreach ($batteries as $battery) : ?>
            <tr class="bg-white border-b hover:bg-gray-50">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                <a href="/batteries/show/<?= $battery['id'] ?>" class="hover:underline">
                  <?= esc($battery['name']) ?>
                </a>
              </th>
              <td class="px-6 py-4"><?= esc($battery['type']) ?></td>
              <td class="px-6 py-4"><?= esc($battery['capacity']) ?></td>
              <td class="px-6 py-4"><?= esc($battery['voltage']) ?></td>
              <td class="px-6 py-4">Rp <?= number_format($battery['price'], 2, ',', '.') ?></td>
              <td class="px-6 py-4 text-right">
                <a href="/batteries/edit/<?= $battery['id'] ?>" class="font-medium text-blue-600 hover:underline mr-4">Edit</a>
                <form action="/batteries/delete/<?= $battery['id'] ?>" method="post" class="inline" onsubmit="return confirm('Are you sure you want to delete this battery?');">
                  <?= csrf_field() ?>
                  <button type="submit" class="font-medium text-red-600 hover:underline">Delete</button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else : ?>
          <tr>
            <td colspan="6" class="px-6 py-4 text-center text-gray-500">No batteries found.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</section>
<?= $this->endSection() ?>
