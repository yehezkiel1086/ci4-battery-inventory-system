<?= $this->extend('components/layout.php') ?>

<?= $this->section('content') ?>
<section>
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-4xl">Shipments</h1>
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
          <th scope="col" class="px-6 py-3">Stok Tersedia</th>
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
              <td class="px-6 py-4"><?= (int) ($battery['available_stock'] ?? 0) ?></td>
              <td class="px-6 py-4 text-right">
                <form action="/shipments/send/<?= $battery['id'] ?>" method="post" class="flex items-center justify-end space-x-2">
                  <?= csrf_field() ?>
                  <input type="number" name="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-20 p-2" placeholder="Qty" required min="1" max="<?= (int) ($battery['available_stock'] ?? 0) ?>">
                  <select name="destination" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2" required>
                    <option value="" disabled selected>Select Country</option>
                    <option value="Japan">Japan</option>
                    <option value="Germany">Germany</option>
                    <option value="England">England</option>
                    <option value="United States">United States</option>
                  </select>
                  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Send</button>
                </form>
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
