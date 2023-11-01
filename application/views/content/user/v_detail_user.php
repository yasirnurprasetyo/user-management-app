<div class="row">
    <div class="col-md-4">
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
                <div class="text-center">
                    <?php if ($users->photo != null) { ?>
                        <img id="imgView" alt="User Avatar" class="card-img-top img-thumbnail" src='<?= base_url('upload/images/user/' . $users->photo) ?>' onerror="this.onerror=null;this.src='<?= base_url(); ?>assets/images/no-image.png'" alt="<?= $users->photo ?>">
                    <?php
                    } else { ?>
                        <img src="<?= base_url(); ?>assets/images/no-image.png" alt="User Avatar" class="card-img-top img-thumbnail" id="imgView">
                    <?php } ?>
                </div>
                <h2 class="text-center"><?= $users->name ?></h2>
                <h3 class="profile-username text-center"><?= date('d-m-Y',strtotime($users->date_birth)) ?></h3>
                <p class="text-muted text-center"><?= $users->role ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Information User</h2>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">No KTP</label>
                    <input required disabled type="text" value="<?= $users->no_ktp ?>" id="no_ktp" name="no_ktp" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input required disabled ="text" name="name" value="<?= $users->name ?>" id="name" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="">Gender</label>
                    <input required disabled ="text" name="gender" value="<?= $users->gender ?>" id="gender" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input required disabled type="email" name="email" value="<?= $users->email ?>" id="email" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input required disabled type="text" name="phone" value="<?= $users->phone ?>" id="phone" class="form-control" />
                </div>
            </div>
        </div>
    </div>
</div>