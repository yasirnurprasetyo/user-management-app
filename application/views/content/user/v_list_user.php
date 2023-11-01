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
                            <a href="<?= site_url("user/detail/$row->id") ?>" class="btn btn-info">
                                <i class="fas fa-info"></i> Detail
                            </a>
                            <a href="<?= site_url("user/ubah/$row->id") ?>" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="#" data-id="<?= $row->id ?>" class="btn btn-danger tombolHapus">
                                <i class="fas fa-trash"></i> Delete
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
<script>
    $(function() {
        let idUser = 0;
        $(".tombolHapus").on("click", function() {
            var id = $(this).data('id');
            SwalDelete(id);
        });
    })

    function SwalDelete(id) {
        $.confirm({
            theme: 'modern',
            icon: 'fa fa-warning',
            title: 'Hapus Data!',
            content: 'Apakah anda yakin hapus data ini ? <br>',
            // closeIcon: true,
            boxWidth: '500px',
            useBootstrap: false,
            closeIconClass: 'fa fa-close',
            type: 'red',
            typeAnimated: true,
            buttons: {
                tryAgain: {
                    text: 'HAPUS',
                    btnClass: 'btn-red',
                    action: function() {
                        var url = "user/proses_hapus/"
                        $.ajax({
                                url: '<?= base_url() ?>' + url + id,
                                type: "POST",
                            })
                            .done(function(id) {
                                $.confirm({
                                    theme: 'modern',
                                    icon: 'fa fa-success',
                                    title: 'Data Terhapus!',
                                    content: false,
                                    closeIcon: true,
                                    boxWidth: '500px',
                                    useBootstrap: false,
                                    type: 'blue',
                                    typeAnimated: true,
                                    buttons: {
                                        tryAgain: {
                                            text: 'OKE',
                                            btnClass: 'btn-blue',
                                            action: function() {
                                                window.location.replace("<?= site_url("user") ?>");
                                            }
                                        },
                                    }
                                });
                            })
                            .fail(function() {
                                $.alert({
                                    theme: 'modern',
                                    icon: 'fa fa-danger',
                                    title: 'Data Tidak bisa dihapus!',
                                    // content: 'Data tersebut telah berelasi dengan tabel lain',
                                    closeIcon: true,
                                    boxWidth: '500px',
                                    useBootstrap: false,
                                    type: 'red',
                                    typeAnimated: true,
                                    buttons: {
                                        tryAgain: {
                                            text: 'OKE',
                                            btnClass: 'btn-blue',
                                            action: function() {}
                                        },
                                    }
                                })
                            });
                    }
                },
                close: function() {}
            }
        });
    }
</script>