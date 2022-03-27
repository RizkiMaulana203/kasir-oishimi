<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>

<div class="content-body">
    <div class="container-fluid">
        <!-- Add Project -->
        <div class="modal fade" id="addProjectSidebar">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Project</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label class="text-black font-w500">Project Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="text-black font-w500">Deadline</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="text-black font-w500">Client Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary">CREATE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, <?= session()->get('nama_user') ?>!</h4>
                    <p class="mb-0">Your Profile Account</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo"></div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                <img src="<?= base_url('/foto/user/' . session()->get('foto')); ?>" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0"><?= session()->get('nama_user') ?></h4>
                                    <p><?php if (session()->get('id_level') == 1) {
                                            echo 'Administrator';
                                        } elseif (session()->get('id_level') == 2) {
                                            echo 'Manager';
                                        } elseif (session()->get('id_level') == 3) {
                                            echo 'Kasir';
                                        } else {
                                            echo 'Unknown';
                                        }
                                        ?></p>
                                </div>
                                <div class="my-post-content ml-auto">
                                    <div class="post-input">
                                        <a href="javascript:void(0);" class="btn btn-primary light px-3" data-toggle="modal" data-target="#linkModal"><i class="fa fa-link m-0"></i> </a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="linkModal">
                                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Social Media</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <a class="btn-social whatsapp" href="https://api.whatsapp.com/send?phone=62895367038666" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                                        <a class="btn-social instagram" href="https://www.instagram.com/rizki_maulana203/" target="_blank"><i class="fab fa-instagram"></i></a>
                                                        <a class="btn-social facebook" href="https://www.facebook.com/profile.php?id=100019118822586" target="_blank"><i class="fab fa-facebook"></i></a>
                                                        <a class="btn-social youtube" href="javascript:void(0)"><i class="fab fa-youtube"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <div class="tab-content">
                                    <div id="my-posts" class="tab-pane fade active show">
                                        <div id="about-me" class="tab-pane fade active show">
                                            <div class="profile-about-me">
                                                <div class="pt-4 border-bottom-1 pb-3">
                                                    <h4 class="text-primary">About Me</h4>
                                                    <p class="mb-2">This proverb “Better an egg today than a hen tomorrow” is relevant. The meaning of that words are about life which unpredictable. If we reject the chance at hand hoping to get better chances tomorrow, </p>
                                                    <p>we are liable to get dejected. So, it is always wise to accept and utilize whatever is at hand than being over-ambitious hoping to get bigger things tomorrow.</p>
                                                </div>
                                            </div>
                                            <div class="profile-personal-info">
                                                <h4 class="text-primary mb-4">Personal Information</h4>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Nama <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span><?= session()->get('nama_user') ?></span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Userame <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span><?= session()->get('username') ?></span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Level <span class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span><?php if (session()->get('id_level') == 1) {
                                                                                            echo 'Administrator';
                                                                                        } elseif (session()->get('id_level') == 2) {
                                                                                            echo 'Owner';
                                                                                        } elseif (session()->get('id_level') == 3) {
                                                                                            echo 'Kasir';
                                                                                        } else {
                                                                                            echo 'Unknown';
                                                                                        }
                                                                                        ?></span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Lokasi <span class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>Indonesia</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="col">
                    <div class="row">
                        <div class="col-xl-12 col-lg-6 col-sm-6">
                            <div class="card">
                                <div class="card-header border-0">
                                    <h4 class="mb-0 text-black fs-20">My Profile</h4>
                                    <div class="dropdown custom-dropdown mb-0 tbl-orders-style">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <div class="my-profile">
                                            <img src="<?= base_url('/foto/user/' . session()->get('foto')); ?>" alt="" class="rounded">
                                        </div>
                                        <h4 class="mt-3 font-w600 text-black mb-0 name-text"><?= session()->get('nama_user') ?></h4>
                                        <span>@<?= session()->get('nama_user') ?></span>
                                    </div>
                                    <ul class="portofolio-social">
                                        <li><a href="https://api.whatsapp.com/send?phone=62895367038666" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                                        <li><a href="https://www.instagram.com/rizki_maulana203/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="https://www.facebook.com/profile.php?id=100019118822586" target="_blank"><i class="fab fa-facebook"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?= $this->endSection(); ?>