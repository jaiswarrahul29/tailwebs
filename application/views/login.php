<?php $this->load->view('layouts/header'); ?>

<div id="loginSection" class="d-flex flex-column align-items-center justify-content-center">
    <div class="logo mb-3">
        <h6>tailwebs. | Login</h6>
    </div>
    <div class="loginView">
        <form action="<?php echo base_url()?>login/auth" method="POST">
            <label class="form-label">Email Address</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-user"></i></span>
                <input type="email" name="username" class="form-control" id="username" placeholder="Enter Email Address" required>
            </div>

            <label class="form-label">Password</label>
            <div class="input-group mb-3 passwordField">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                <input type="password" name="password" class="form-control userPassword" id="userPassword" placeholder="Enter Password" required>

                <div class="show-hide-eye">
                    <button type="button" class="showPassword"><i class="fa-solid fa-eye"></i></button>
                    <button type="button" class="hidePassword"><i class="fa-solid fa-eye-slash"></i></button>
                </div>
            </div>

            <div class="input-group mb-3 d-flex justify-content-end">
                <a href="#"  data-bs-toggle="modal" data-bs-target="#forgetPasswordModal">Forget Password?</a>
            </div>

            <button class="mt-5 loginBtn">Login</button>
        </form>
    </div>
</div>


 <!-- FORGET PASSWORD MODAL -->
 <div class="modal fade" id="forgetPasswordModal" tabindex="-1" aria-labelledby="forgetPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="<?php echo base_url() ?>login/forgetPassword">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="forgetPasswordModalLabel">Forget Password</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label class="form-label">Email Address</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-user"></i></span>
                            <input type="email" name="email" class="form-control" id="emailAddress" placeholder="Enter Email Address" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Forget Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php $this->load->view('layouts/footer'); ?>