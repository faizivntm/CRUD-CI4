<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Items</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light" style="margin: 40px;">

<div class="container">

    <div class="d-flex justify-content-end gap-2 mb-4">
        <form action="<?= base_url('/add') ?>" method="get">
            <button class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Add Item
            </button>
        </form>

        <form action="<?= base_url('/logout') ?>" method="get">
            <button class="btn btn-danger">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </div>

    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            <strong>Daftar Semua Item</strong>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-hover m-0">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Tanggal Pembelian</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($items)): ?>
                            <?php $no=1; foreach($items as $item): ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= esc($item['nama_barang']) ?></td>
                                <td><?= esc($item['category']) ?></td>
                                <td class="text-end"><?= number_format($item['harga_barang'],0,',','.') ?></td>
                                <td class="text-center"><?= esc($item['tanggal_pembelian']) ?></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                       <form action="<?= base_url('/edit') ?>" method="get" class="me-1"> 
                                        <input type="hidden" name="items_id" value="<?= esc($item['items_id']) ?>"> 
                                        <input type="hidden" name="nama_barang" value="<?= esc($item['nama_barang']) ?>"> 
                                        <input type="hidden" name="category" value="<?= esc($item['category']) ?>"> 
                                        <input type="hidden" name="harga_barang" value="<?= esc($item['harga_barang']) ?>"> 
                                        <input type="hidden" name="tanggal_pembelian" value="<?= esc($item['tanggal_pembelian']) ?>">
                                            <button class="btn btn-sm btn-primary" title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                        </form>

                                        <form action="<?= base_url('/dashboard/delete') ?>" method="post" onsubmit="return confirm('Yakin ingin menghapus?')">
                                            <input type="hidden" name="items_id" value="<?= esc($item['items_id']) ?>">
                                            <button class="btn btn-sm btn-danger" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>

                                        <form action="<?= base_url('/dashboard/select') ?>" method="post">
                                            <input type="hidden" name="items_id" value="<?= esc($item['items_id']) ?>">
                                            <button class="btn btn-sm btn-success" title="Tambahkan ke List">
                                                <i class="bi bi-plus-circle"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <strong>List Item yang Ingin Dibeli</strong>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-hover m-0">
                    <thead class="table-success text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Tanggal Pembelian</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($selected_items)): ?>
                            <?php $no=1; foreach($selected_items as $item): ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= esc($item['nama_barang']) ?></td>
                                <td><?= esc($item['category']) ?></td>
                                <td class="text-end"><?= number_format($item['harga_barang'],0,',','.') ?></td>
                                <td class="text-center"><?= esc($item['tanggal_pembelian']) ?></td>
                                <td class="text-center">
                                    <form action="<?= base_url('/dashboard/unselect') ?>" method="post">
                                        <input type="hidden" name="items_id" value="<?= esc($item['items_id']) ?>">
                                        <button class="btn btn-sm btn-danger" title="Hapus dari List">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-end">Total Harga:</th>
                            <th class="text-end"><?= number_format($total ?? 0,0,',','.') ?></th>
                            <th colspan="2"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
