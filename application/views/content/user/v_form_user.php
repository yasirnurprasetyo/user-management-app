<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <a href="<?= site_url(array("user")) ?>" class="btn btn-default btn-sm"><i class="fas fa-arrow-left"></i>&nbsp;
                            KEMBALI
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form id="form-user" enctype="multipart/form-data" role="form" method="post" action="<?= site_url("user/proses_simpan") ?>">
                    <div class="form-group">
                        <label for="">No KTP</label>
                        <input required type="text" value="<?= $users->no_ktp ?>" id="no_ktp" name="no_ktp" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input required type="text" name="name" value="<?= $users->name ?>" id="name" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input required type="email" name="email" value="<?= $users->email ?>" id="email" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input required type="password" name="password" value="<?= $users->password ?>" id="password" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="<?= $users->gender ?>" <?= $users->gender != null ? "selected" : "Pilih Jenis Kelamin" ?>> <?= $users->gender != null ? $users->gender : "Pilih Jenis Kelamin" ?> </option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date_birth">Tanggal Lahir</label>
                        <input type="date" name="date_birth" value="<?= $users->date_birth ?>" id="date_birth" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="">Nomor Telepon</label>
                        <input required type="text" name="phone" value="<?= $users->phone ?>" id="gender" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="">Role User</label>
                        <select name="role" id="role" required class="form-control">
                            <option value="<?= $users->role ?>" <?= $users->role != null ? "selected" : "Pilih Role" ?>> <?= $users->role != null ? $users->role : "Pilih Role" ?> </option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" value="<?= $users->photo ?>" name="photo" class="custom-file-input" id="photo">
                                <label class="custom-file-label" for="photo">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button id="btn-save-user" type="submit" name="<?= $pages ?>" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>&nbsp;&nbsp;SIMPAN DATA</button>&nbsp;&nbsp;
                        <button id="btn-reset" type="reset" class="btn btn-info btn-sm"><i class="fas fa-undo-alt"></i>&nbsp;&nbsp;RESET DATA</button>
                    </div>
                    <input type="hidden" id="id" name="id" value="<?= $users->id ?>" />
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Image Preview</h2>
            </div>
            <div class="card-body">
                <div class="imgWrap">
                    <?php if ($pages == "updates") {
                        if ($users->photo != null) { ?>
                            <img id="imgView" alt="User Avatar" class="card-img-top img-fluid" src='<?= base_url('upload/images/user/' . $users->photo) ?>' onerror="this.onerror=null;this.src='<?= base_url(); ?>assets/images/no-image.png'" alt="<?= $users->photo ?>">
                        <?php
                        }
                    } else { ?>
                        <img src="<?= base_url(); ?>assets/images/no-image.png" alt="User Avatar" class="card-img-top img-fluid" id="imgView">
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $("#btn-save-user").on("click", function() {
            let validate = $("#form-user").valid();
            if (validate) {
                Swal.fire({
                    timerProgressBar: true,
                    title: "Memproses Data..",
                    text: "On Proccess!",
                    // imageUrl: '<?= base_url() ?>' + "images/loadings.gif",
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 2000,
                    delay: 2000
                });
                $("#form-user").submit();
            }
        })

        $("#form-barang").validate({
            rules: {
                no_ktp: {
                    required: true,
                },
                name: {
                    required: true,
                },
                email: {
                    required: true,
                },
                password: {
                    required: true,
                },
                phone: {
                    required: true,
                },
                gender: {
                    required: true,
                },
            },
            messages: {
                no_ktp: {
                    required: "Anda belum memasukkan Nomor KTP",
                },
                name: {
                    required: "Anda belum memasukkan Nama",
                },
                email: {
                    required: "Anda belum memasukkan Email",
                },
                password: {
                    required: "Anda belum memasukkan Password",
                },
                phone: {
                    required: "Anda belum memasukkan Phone",
                },
                gender: {
                    required: "Anda belum memasukkan Gender",
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
        })

        $("#photo").change(function(event) {
            fadeInAdd();
            getURL(this);
        });

        $("#photo").on('click', function(event) {
            fadeInAdd();
        });

        function getURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var filename = $("#photo").val();
                filename = filename.substring(filename.lastIndexOf('\\') + 1);
                reader.onload = function(e) {
                    debugger;
                    $('#imgView').attr('src', e.target.result);
                    $('#imgView').hide();
                    $('#imgView').fadeIn(500);
                    $('.custom-file-label').text(filename);
                }
                reader.readAsDataURL(input.files[0]);
            }
            $(".alert").removeClass("loadAnimate").hide();
        }

        function fadeInAdd() {
            fadeInAlert();
        }

        function fadeInAlert(text) {
            $(".alert").text(text).addClass("loadAnimate");
        }
    })
</script>