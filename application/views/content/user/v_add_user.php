<div class="card card-gray">
    <div class="card-header">
        <h4>Tambah User</h4>
    </div>
    <div class="card-body">
        <form id="form-tambah" method="post" action="<?= site_url("user/proses_simpan") ?>">
            <div class="form-group">
                <label for="">No KTP</label>
                <input required type="text" name="no_ktp" class="form-control" />
            </div>
            <div class="form-group">
                <label for="">Nama</label>
                <input required type="text" name="name" class="form-control" />
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input required type="email" name="email" class="form-control" />
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input required type="password" name="password" class="form-control" />
            </div>
            <div class="form-group">
                <label>Tangal Lahir</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" />
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select name="gender" id="" class="form-control">
                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Nomor Telepon</label>
                <input required type="text" name="phone" class="form-control" />
            </div>
            <div class="form-group">
                <label for="">Role User</label>
                <select name="role" id="" required class="form-control">
                    <option value="" disabled selected>Pilih Role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Photo</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="photo" class="custom-file-input" id="">
                        <label class="custom-file-label" for="">Choose file</label>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer">
        <button id="btn-save" type="button" class="btn btn-success">
            <i class="fas fa-save"></i> Simpan
        </button>
        <a href="<?= site_url("user") ?>" class="btn btn-info">
            <i class="fas fa-reply"></i> Kembali
        </a>
    </div>
</div>
<script>
    $(function() {
        $("#btn-save").on("click", function() {
            let validate = $("#form-tambah").valid();
            if (validate) {
                $("#form-tambah").submit();
            }
        });
        $("#form-tambah").validate({
            rules: {
                phone: {
                    digits: true
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
        $('#reservationdate').datetimepicker({
            format: 'L'
        });

    });
</script>