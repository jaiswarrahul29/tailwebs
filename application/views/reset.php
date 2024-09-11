<?php $this->load->view('layouts/header'); ?>

<div id="loginSection" class="d-flex flex-column align-items-center justify-content-center">
    <div class="logo mb-3">
        <h6>tailwebs. | Reset Password</h6>
    </div>
    <div class="loginView">
        <form action="<?php echo base_url() ?>login/updatePassword" method="POST">
            <input type="text" name="token" value="<?php echo isset($_GET['token'])?$_GET['token']:"" ?>" hidden>
            <label class="form-label">Password</label>
            <div class="input-group mb-3 passwordField">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                <input type="password" name="password" class="form-control userPassword" id="userPassword" placeholder="Enter Password" required>

                <div class="show-hide-eye">
                    <button type="button" class="showPassword"><i class="fa-solid fa-eye"></i></button>
                    <button type="button" class="hidePassword"><i class="fa-solid fa-eye-slash"></i></button>
                </div>
            </div>

            <label class="form-label">Confirm Password</label>
            <div class="input-group mb-3 passwordField">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                <input type="password" name="confirmPassword" class="form-control userPassword" id="userPassword" placeholder="Enter Confirm Password" required>
            </div>

            <button class="mt-5 loginBtn">Reset Password</button>
        </form>
    </div>
</div>


<?php $this->load->view('layouts/footer'); ?>