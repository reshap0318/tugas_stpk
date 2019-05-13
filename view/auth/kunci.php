<div class="card">
  <div class="card-header">
    <div class="text-center">
        Silakan Masukan Kode Untuk Meng-akses Tugas Ini.
    </div>
    <br>
    <p class="text-center">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lock-screen">Lock Screen</button>
    </p>
  </div>
</div>

<!-- Lock screen start -->
<div id="lock-screen" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="login-card card-block login-card-modal">
            <form class="md-float-material" action="/tugas/controller/auth/kunci.php" method="post">
                <div class="text-center">
                    <img src="/tugas/editor/assets/images/logo.png" alt="logo.png">
                </div>
                <div class="card m-t-15">
                    <div class="auth-box card-block">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-center"><i class="icofont icofont-lock text-primary f-80"></i></h3>
                        </div>
                    </div>
                    <p class="text-inverse b-b-default text-right">Anti Maling - Maling Club</p>
                    <div class="input-group">
                        <input type="hidden" name="akun" value="<?php echo $akun ?>">
                        <input name="kode" type="password" class="form-control" placeholder="Enter Your Code For Access thi Work">
                        <span class="md-line"></span>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-primary btn-md btn-block waves-effect text-center"><i class="icofont icofont-lock"></i> Lock Screen </button>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-10">
                            <p class="text-inverse text-left m-b-0">Thank you.</p>
                            <p class="text-inverse text-left"><a href="http://lea.si.fti.unand.ac.id"><b class="f-w-600">Go to my website</b></a></p>
                        </div>
                        <div class="col-md-2">
                            <img src="/tugas/img/lea-logo-small.png" alt="small-logo.png">
                        </div>
                    </div>
                </div>
                </div>
            </form>
            <!-- end of form -->
        </div>
    </div>
</div>
<!-- lock screen end-->
