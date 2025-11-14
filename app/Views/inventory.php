<?= $this->extend('components/layout.php') ?>

<?= $this->section('content') ?>
<section>
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-4xl">Inventories</h1>
  </div>

  <?php if (session()->getFlashdata('message')) : ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
      <span class="block sm:inline"><?= session()->getFlashdata('message') ?></span>
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('error')) : ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
      <span class="block sm:inline"><?= session()->getFlashdata('error') ?></span>
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
          <th scope="col" class="px-6 py-3">Stok</th>
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
              <td class="px-6 py-4">
                <div class="flex items-center space-x-3">
                    <form action="/inventory/update/<?= $battery['id'] ?>" method="post" class="inline">
                        <?= csrf_field() ?>
                        <input type="hidden" name="action" value="reduce">
                        <button type="submit" class="inline-flex items-center justify-center p-1 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200" <?= ( (int) ($battery['available_stock'] ?? 0) === 0) ? 'disabled' : '' ?>>-</button>
                    </form>
                    <div>
                        <span class="bg-gray-50 w-14 text-center text-sm text-gray-900 font-bold focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1"><?= (int) ($battery['available_stock'] ?? 0) ?></span>
                    </div>
                    <form action="/inventory/update/<?= $battery['id'] ?>" method="post" class="inline">
                        <?= csrf_field() ?>
                        <input type="hidden" name="action" value="add">
                        <button type="submit" class="inline-flex items-center justify-center h-6 w-6 p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200">+</button>
                    </form>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else : ?>
          <tr>
            <td colspan="7" class="px-6 py-4 text-center text-gray-500">No batteries found.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</section>
<?= $this->endSection() ?>
