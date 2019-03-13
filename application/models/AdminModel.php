<?php
class AdminModel extends CI_Model{
function __construct() {
parent::__construct();
}

function UserRegistration_insert($data){ 
// Inserting in Table(user_mgt) of Database
$this->db->insert('user_mgt', $data);
}
// Read data using username and password
public function adminlogin($data) {
$condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $data['password'] . "'";
$this->db->select('*');
$this->db->from('adminlogin');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return true;
} else {
return false;
}
}

// Read data from database to show data in admin page
public function read_admin_information($email) {

$condition = "email =" . "'" . $email . "'";
$this->db->select('*');
$this->db->from('adminlogin');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
}

}
 