<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_model extends CI_Model
{

    public function getAllStudent()
    {
        $query = $this->db->get_where('students', array('deleted_at' => NULL)); // Assuming you have a 'users' table
        return $query->result(); // Returns result as an array of objects
    }

    public function findStudentById($id) {
        $query = $this->db->get_where('students', array('id' => $id));
        return $query->row(); // Return a single row object
    }


    public function findStudentWithName($name)
    {
        $query = $this->db->get_where('students', array('name' => $name));

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function updateSubjectMarks($student, $marks)
    {
        $this->db->where(array('name' => $student->name, 'subject' => $student->subject))->update('students', array('marks' => $marks));
        return true;
    }


    public function addNewStudentEntry($name, $subject, $marks)
    {
        $data = array(
            'name'    => $name,
            'subject' => $subject,
            'marks'   => $marks
        );

        return $this->db->insert('students', $data);
    }

    public function updateStudent($id, $data) {
        // Set the condition to identify the student

        $this->db->where('id', $id);
        
        // Update the student data
        return $this->db->update('students', $data);
    }
}
