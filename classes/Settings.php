<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../lib/Database.php");
include_once ($filepath."/../lib/Session.php");
include_once ($filepath."/../helpers/Format.php");
    class Settings{
        private $db;
        private $fm;
        private $msg="";

        public function __construct(){
            $this->db   = new Database();
            $this->fm   = new Format();
        }

        public function updateSetting($data){
            $name       = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['name']));
            $address    = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['address']));
            $phone      = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['phone']));
            $email      = mysqli_real_escape_string($this->db->link, $this->fm->validation(strtolower($data['email'])));
            $website    = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['website']));

            if(empty($name) || empty($address) || empty($phone) ){
                $this->msg = "<span class='error'>Field must not be empty</span>";
                return $this->msg;
            }else{
                $query = "UPDATE tbl_settings SET name='$name', address='$address', phone='$phone', email='$email', website='$website' WHERE id='1'";
                $update_user = $this->db->update($query);
                if($update_user){
                    $this->msg = "<span class='success'>User updated successfully!</span>";
                    return $this->msg;
                }
            }
        }

        public function viewSetting(){
            $query = "SELECT * FROM tbl_settings WHERE id = '1' LIMIT 1";
            $result = $this->db->select($query);
            if($result){
                return $result;
            }else{
                return false;
            }
        }
    }