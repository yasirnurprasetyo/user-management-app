<div class="card card-gray">
    <div class="card-header">
        <h4>Daftar User</h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped" id="dataTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($users as $row) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->name ?></td>
                        <td><?= $row->email ?></td>
                        <td><?= $row->role ?></td>
                        <td><?= $row->is_active == "1" ? "Aktif" : "Tidak Aktif" ?></td>

                        <td>
                            <button data-id="<?= $row->id ?>" class="btn btn-info btn-xs btn-reset-password">
                                <i class="fas fa-key"></i>
                            </button>
                            <a href="<?= site_url("user/update/$row->id") ?>" class="btn btn-xs btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <a href="<?= site_url("user/tambah") ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah User
        </a>
    </div>
</div>