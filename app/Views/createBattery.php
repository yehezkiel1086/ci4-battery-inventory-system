<?= $this->extend('components/layout.php') ?>

<?= $this->section('content') ?>
<section>
  <div class="flex justify-between items-center">
    <h1 class="text-4xl">Create New Battery</h1>
    <a href="/batteries" class="text-blue-500 hover:underline">&larr; Go back to batteries list</a>
  </div>

  <form action="/batteries/create" method="post" class="mt-8 max-w-lg">
    <?= csrf_field() ?>

    <div class="mb-4">
      <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama Produk</label>
      <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>

    <div class="mb-4">
      <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Tipe</label>
      <input type="text" name="type" id="type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <div class="mb-4">
      <label for="capacity" class="block text-gray-700 text-sm font-bold mb-2">Kapasitas</label>
      <input type="text" name="capacity" id="capacity" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <div class="mb-4">
      <label for="voltage" class="block text-gray-700 text-sm font-bold mb-2">Voltage</label>
      <input type="text" name="voltage" id="voltage" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <div class="mb-4">
      <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Harga</label>
      <input type="number" name="price" id="price" step="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>

    <div class="mb-6">
      <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">Category</label>
      <select name="category_id" id="category_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        <option value="">Select a Category</option>
        <?php if (!empty($categories) && is_array($categories)) : ?>
          <?php foreach ($categories as $category) : ?>
            <option value="<?= esc($category['id']) ?>">
              <?= esc($category['name']) ?>
            </option>
          <?php endforeach; ?>
        <?php endif; ?>
      </select>
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create Battery</button>
  </form>
</section>
<?= $this->endSection() ?>
