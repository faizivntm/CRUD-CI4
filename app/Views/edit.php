<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Item</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="min-height: 100vh;" 
      class="d-flex justify-content-center align-items-center">

  <div class="card p-4"
       style="width: 100%; max-width: 500px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">

    <h3 class="mb-4 text-center" style="font-weight: 600;">Edit Item</h3>

    <form action="<?= base_url('/edit/items') ?>" method="post">
      <?= csrf_field(); ?>

      <?php if($error = session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?= esc($error) ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      <?php endif; ?>

      <?php
      $categories = [
          'Smartphone',
          'Notebook',
          'Keyboard',
          'Hardisk',
      ];
      ?>

      <input type="hidden" name="items_id" value="<?= esc($items_id ?? '') ?>">

      <div class="mb-3">
        <label class="form-label fw-semibold">Nama Barang</label>
        <input class="form-control"
               type="text"
               name="nama_barang"
               value="<?= esc($nama_barang ?? '') ?>"
               style="border-radius: 8px;"
               required>
      </div>

      <div class="mb-3">
        <label class="form-label fw-semibold">Kategori</label>
        <select name="category"
                class="form-select"
                style="border-radius: 8px;"
                required>
          <?php foreach ($categories as $cat): ?>
            <option value="<?= esc($cat) ?>"
              <?= (isset($category) && $category == $cat) ? 'selected' : '' ?>>
              <?= esc($cat) ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label fw-semibold">Harga Barang</label>
        <input class="form-control"
               type="number"
               name="harga_barang"
               value="<?= esc($harga_barang ?? '') ?>"
               style="border-radius: 8px;"
               required>
      </div>

      <div class="mb-3">
        <label class="form-label fw-semibold">Tanggal Pembelian</label>
        <input class="form-control"
               type="date"
               name="tanggal_pembelian"
               value="<?= isset($tanggal_pembelian) 
                        ? date('Y-m-d', strtotime($tanggal_pembelian)) 
                        : '' ?>"
               style="border-radius: 8px;"
               required>
      </div>

      <button type="submit"
              class="btn btn-primary text-white w-100"
              style=" color: black; border-radius: 8px; font-weight: 500;">
        Update Item
      </button>
    </form>

    <form action="<?= base_url('/dashboard') ?>" method="get">
      <button type="submit"
              class="btn btn-outline-danger w-100 mt-3"
              style="border-radius: 8px;">
        Cancel
      </button>
    </form>

  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
