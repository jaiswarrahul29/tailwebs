<?php $this->load->view('layouts/header'); ?>


<div id="home">

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo base_url() ?>">tailwebs.</a>
            <div class="right d-flex align-items-center flex-nowrap gap-2">
                <button class="btn btn-warning d-flex align-items-center flex-nowrap gap-1" data-bs-toggle="modal" data-bs-target="#addStudentModal"><i class="fa-solid fa-plus"></i> Add Student</button>
                <a href="<?php echo base_url() ?>home/logout" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div class="table-section">
        <table class="table table-striped table-hover " id="datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Mark (Out of 100)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($students as $student) {
                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td class="name text-capitalize"><?php echo $student->name ?></td>
                        <td class="subject text-capitalize"><?php echo $student->subject ?></td>
                        <td class="marks"><?php echo $student->marks ?></td>
                        <td>
                            <a href="#" class="btn btn-warning editStudentButton" data-id="<?php echo $student->id ?>" data-bs-toggle="modal" data-bs-target="#editStudentModal"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="#" class="btn btn-danger deleteStudentButton" data-id="<?php echo $student->id ?>" data-bs-toggle="modal" data-bs-target="#deleteStudentModal"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php
                    $i++;
                }

                ?>

            </tbody>
        </table>
    </div>



    <!-- ADD STUDENT MODAL -->
    <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="<?php echo base_url() ?>home/addStudent">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addStudentModalLabel">Add Student</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label class="form-label">Student Name</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-user"></i></span>
                            <input type="text" name="name" class="form-control" id="studentName" placeholder="Umesh Jaiswar" required>
                        </div>

                        <label class="form-label">Subject</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-book"></i></span>
                            <input type="text" name="subject" class="form-control" id="subject" placeholder="Maths" required>
                        </div>

                        <label class="form-label">Marks (Out of 100)</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-bookmark"></i></span>
                            <input type="text" name="marks" class="form-control numberInput" id="marks" placeholder="55 Out of 100" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add Student</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- EDIT STUDENT MODAL -->
    <div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="<?php echo base_url() ?>home/updateStudentData">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editStudentModalLabel">Update Student</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="id" id="editID" hidden>
                        <label class="form-label">Student Name</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-user"></i></span>
                            <input type="text" name="name" class="form-control" id="editStudentName" placeholder="Umesh Jaiswar" required>
                        </div>

                        <label class="form-label">Subject</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-book"></i></span>
                            <input type="text" name="subject" class="form-control" id="editSubject" placeholder="Maths" required>
                        </div>

                        <label class="form-label">Marks (Out of 100)</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-bookmark"></i></span>
                            <input type="text" name="marks" class="form-control numberInput" id="editMarks" placeholder="55 Out of 100" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Update Student</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- DELETE STUDENT MODAL -->
    <div class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="deleteStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="<?php echo base_url() ?>home/deleteStudent">
                    <input type="text" name="id" id="deleteStudentID" hidden>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteStudentModalLabel">Update Student</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>Are you sure you wanted to delete this entry?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete Student</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>




<?php $this->load->view('layouts/footer'); ?>