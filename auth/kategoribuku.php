<div class="card">
    <div class="card-body">
        <?php
        if ($_SESSION['data']['Role'] == 'user') {
            echo "<script>";
            echo 'alert("Anda tidak memiliki Akses!");';
            echo 'window.location.href = "dashboard.php?page=dashboard";';
            echo '</script>';
        }
        ?>
        <h1>Kategori Buku</h1>
        <hr>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahkategori">
                <i class="fas fa-plus fa-sm text-white-50"></i>Tambah Kategori</button>
        </div>
        <div class="table-responsive">
            <table class="table table-striped" id="example2">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($fung->viewkategori() as $d) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $d['NamaKategori'] ?></td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit<?= $d['KategoriID'] ?>"><i class="fa fa-edit fa-sm text-white"></button>
                                <a href="dashboard.php?page=hapusKategori&KategoriID=<?= $d['KategoriID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin menghapus Kategori <?= $d['NamaKategori'] ?>?')"><i class="fa fa-trash"></i></a>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- modal -->
<div class="modal fade" id="tambahkategori">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="dashboard.php?page=postKategori" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <input type="text" class="form-control" name="NamaKategori" required="">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- edit -->
<?php
foreach ($fung->viewkategori() as $k) { ?>
    <div class="modal fade" id="edit<?= $k['KategoriID'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Kategori</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <form action="dashboard.php?page=updatekategori" method="post">
                    <div class="modal-body">

                        <input type="text" name="KategoriID" value="<?= $k['KategoriID']; ?>" hidden>
                        <div class="form-group">
                            <label for="">Kategori</label>
                            <input type="text" class="form-control" name="NamaKategori" value="<?= $k['NamaKategori']; ?>" required="">
                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    </div>
<?php  }
?>

<!-- /.modal -->