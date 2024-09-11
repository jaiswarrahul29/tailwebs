<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Student_model');
	}

	public function index()
	{
		if ($this->session->userdata('admin_user')) {
			$data['students'] = $this->Student_model->getAllStudent();
			$this->load->view('home', $data);
		} else {
			redirect(base_url('login'));
		}
	}


	public function addStudent()
	{

		if ($this->session->userdata('admin_user')) {
			$name = rtrim(strtolower($_POST['name']));
			$subject = rtrim(strtolower($_POST['subject']));
			$marks = rtrim($_POST['marks']);

			$getStudent = $this->Student_model->findStudentWithName($name);

			if (!empty($getStudent)) {
				$sameSubject = false;
				foreach ($getStudent as $student) {
					// CHECK SUBJECT IS THERE IN DB OR NOT
					if ($student->subject == $subject) {
						// SAME SUBJECT FOUND THEN UPDATE IT
						$sameSubject = true;
						$this->Student_model->updateSubjectMarks($student, $marks);
						$this->session->set_flashdata('success', 'Marks updated successfully!');
						redirect(base_url());
					}
				}

				if ($sameSubject == false) {
					$this->Student_model->addNewStudentEntry($name, $subject, $marks);
					$this->session->set_flashdata('success', 'New Subject with Marks Added successfully!');
					redirect(base_url());
				}
			} else {
				// If we do not find this name entry so we insert new entry
				$this->Student_model->addNewStudentEntry($name, $subject, $marks);
				$this->session->set_flashdata('success', 'New Student Subject with Marks Added successfully!');
				redirect(base_url());
			}
		} else {
			redirect(base_url('login'));
		}
	}


	public function getStudent()
	{

		if ($this->session->userdata('admin_user')) {
			$studentId = $this->input->post('id');

			// Load your model
			$this->load->model('Student_model');

			// Fetch student data based on the ID
			$student = $this->Student_model->findStudentById($studentId); // Assume this method exists

			// Return student data as JSON
			echo json_encode($student);
		} else {
			redirect(base_url('login'));
		}
	}


	public function updateStudentData()
	{

		if ($this->session->userdata('admin_user')) {
			$id = $_POST['id'];
			$name = $_POST['name'];
			$subject = $_POST['subject'];
			$marks = $_POST['marks'];

			$data = array(
				'name'    => $name,
				'subject' => $subject,
				'marks'   => $marks
			);


			if ($this->Student_model->updateStudent($id, $data)) {
				$this->session->set_flashdata('success', 'Student Data updated successfully!');
			} else {
				$this->session->set_flashdata('error', 'Failed to update student.');
			}

			// Redirect or load a view
			redirect(base_url());
		} else {
			redirect(base_url('login'));
		}
	}

	public function deleteStudent()
	{
		if ($this->session->userdata('admin_user')) {
			$id = $_POST['id'];
			$data = [
				"deleted_at" => date("y-m-d H:s:i")
			];


			if ($this->Student_model->updateStudent($id, $data)) {
				$this->session->set_flashdata('success', 'Student deleted successfully!');
			} else {
				$this->session->set_flashdata('error', 'Failed to delete student.');
			}

			// Redirect or load a view
			redirect(base_url());
		} else {
			redirect(base_url('login'));
		}
	}



	public function logout()
	{
		if ($this->session->userdata('admin_user')) {
			session_destroy();
			redirect(base_url());
		} else {
			redirect(base_url('login'));
		}
	}
}
