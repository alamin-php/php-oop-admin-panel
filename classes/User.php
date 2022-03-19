<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../lib/Database.php");
include_once ($filepath."/../lib/Session.php");
include_once ($filepath."/../helpers/Format.php");
    class User{
        private $db;
        private $fm;
        private $msg="";

        public function __construct(){
            $this->db   = new Database();
            $this->fm   = new Format();
        }

        public function loginUser($data){
            $username   = mysqli_real_escape_string($this->db->link, $this->fm->validation(strtolower($data['username'])));
            $password   = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['password']));
            $encptyPass = md5($password);
            $chkUser    = $this->metchUser($username, $encptyPass);
            $chkActiveUser    = $this->checkActiveUser($username, $encptyPass);

            if(empty($username) || empty($password)){
                $this->msg = "<span class='error'>Field must not be empty</span>";
                return $this->msg;
            }elseif($chkUser == false){
                $this->msg = "<span class='error'>Sorry! Username or Password not match</span>";
                return $this->msg;
            }elseif($chkActiveUser == false){
                $this->msg = "<span class='error'>Your account already inactived</span>";
                return $this->msg;
            }else{
                $query = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$encptyPass' AND status = '0' LIMIT 1";
                $result = $this->db->select($query);
                if($result !=false){
                    $value = $result->fetch_assoc();
                    Session::set("login",     true);
                    Session::set("userId",    $value['id']);
                    Session::set("username",  $value['username']);
                    Session::set("name",      $value['name']);
                    Session::set("email",     $value['email']);
                    Session::set("role",      $value['role']);
                    Session::set("image",     $value['image']);
                    Session::set("created_at",$value['created_at']);
                    header("Location: index.php");
                }
            }
        }

        public function addUser($data){
            date_default_timezone_set('Asia/Dhaka');
            $name       = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['name']));
            $username   = mysqli_real_escape_string($this->db->link, $this->fm->validation(strtolower($data['username'])));
            $role       = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['role']));
            $password   = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['password']));
            $encptyPass = md5($password);
            $chkUser = $this->checkUser($username);

            if(empty($name) || empty($username) || empty($role) ){
                $this->msg = "<span class='error'>Field must not be empty</span>";
                return $this->msg;
            }elseif(strlen($username) < 3){
                $this->msg = "<span class='error'>Username must be geter then 3 digit</span>";
                return $this->msg;
            }elseif(preg_match("/[^a-z0-9_-]+/i", $username)){
                $msg = "<span class='error'>Error ! </strong>Username must only content alphanmerical, dashes and underscores!</span>";
                return $msg;
            }elseif($chkUser != false){
                $msg = "<span class='error'>Error ! </strong>$username already Exist!</span>";
                return $msg;
            }elseif(strlen($password) < 4){
                $this->msg = "<span class='error'>Password must be geter then 4 digit</span>";
                return $this->msg;
            }else{
                $query = "INSERT INTO tbl_user (name, username, role, password) VALUES('$name','$username', '$role', '$encptyPass')";
                $insert_user = $this->db->insert($query);
                if($insert_user){
                    $this->msg = "<span class='success'>User registered successfully!</span>";
                    return $this->msg;
                }
            }
        }
        public function updateUser($data, $id){
            $name       = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['name']));
            $username   = mysqli_real_escape_string($this->db->link, $this->fm->validation(strtolower($data['username'])));
            $role       = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['role']));
            $status       = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['status']));
            $id       = mysqli_real_escape_string($this->db->link, $id);

            if(empty($name) || empty($username) || empty($role) ){
                $this->msg = "<span class='error'>Field must not be empty</span>";
                return $this->msg;
            }elseif(strlen($username) < 3){
                $this->msg = "<span class='error'>Username must be geter then 3 digit</span>";
                return $this->msg;
            }elseif(preg_match("/[^a-z0-9_-]+/i", $username)){
                $msg = "<span class='error'>Error ! </strong>Username must only content alphanmerical, dashes and underscores!</span>";
                return $msg;
            }else{
                $query = "UPDATE tbl_user SET name='$name', username='$username', role='$role', status='$status' WHERE id='$id'";
                $update_user = $this->db->update($query);
                if($update_user){
                    $this->msg = "<span class='success'>User updated successfully!</span>";
                    return $this->msg;
                }
            }
        }
        public function updateUserProfile($data,$file,$id){
            $name       = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['name']));
            $details    = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['details']));
            $email      = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['email']));
            $id         = mysqli_real_escape_string($this->db->link, $id);

            $permited = array('jpg', 'jpeg', 'png');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_tmp_name = $file['image']['tmp_name'];

            $divi = explode('.', $file_name);
            $file_extn = strtolower(end($divi));
            $unique_file_name = substr(md5(time()), 0, 10).'.'.$file_extn;
            $uploaded_file = 'upload/'.$unique_file_name;

            if(empty($name)){
                $this->msg = "<span class='error'>Name must not be empty</span>";
                return $this->msg;
            }
            if(!empty($file_name)){
                    move_uploaded_file($file_tmp_name, $uploaded_file);
                    $this->deleteProfileImage($id);
                    $query = "UPDATE tbl_user SET name='$name', email='$email', details='$details', image='$uploaded_file' WHERE id='$id'";
                    $update_user = $this->db->update($query);
                    if($update_user){
                        $this->msg = "<span class='success'>User profile updated successfully!</span>";
                        return $this->msg;
                    }
            }else{
                $query = "UPDATE tbl_user SET name='$name', email='$email', details='$details' WHERE id='$id'";
                $update_user = $this->db->update($query);
                if($update_user){
                    $this->msg = "<span class='success'>User profile updated successfully!</span>";
                    return $this->msg;
                }
            }
        }

        public function updatePassword($data, $id){
            $old_pass       = mysqli_real_escape_string($this->db->link, $this->fm->validation(md5($data['old_pass'])));
            $new_pass       = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['password']));
            $encptyPass     = md5($new_pass);
            $id             = mysqli_real_escape_string($this->db->link, $id);
            $chkPass        = $this->checkPassword($id, $old_pass);

            if(empty($old_pass) || empty($new_pass)){
                $this->msg = "<span class='error'>Field must not be empty</span>";
                return $this->msg;
            }elseif($chkPass == false){
                $this->msg = "<span class='error'>Old password not metch !</span>";
                return $this->msg;
            }elseif(strlen($new_pass) < 4){
                $this->msg = "<span class='error'>Password must be geter then 4 digit</span>";
                return $this->msg;
            }else{
                $query = "UPDATE tbl_user SET password='$encptyPass' WHERE id='$id'";
                $update_password = $this->db->insert($query);
                if($update_password){
                    $this->msg = "<span class='success'>Password updated successfully!</span>";
                    return $this->msg;
                }
            }
        }

        public function readAllUser(){
            $query = "SELECT * FROM tbl_user WHERE role = '1' || role = '2' || role = '3' ORDER BY name ASC";
                $result = $this->db->select($query);
                if($result){
                    return $result;
                }else{
                    return false;
                }
        }
        public function deleteUser($id){
            $this->deleteProfileImage($id);
            $query = "DELETE FROM tbl_user WHERE id = '$id'";
                $delUser = $this->db->delete($query);
                if($delUser){
                    $this->msg = "<span class='success'>User deleted successfully!</span>";
                    return $this->msg;
                }else{
                    $this->msg = "<span class='error'>User deleted fail!</span>";
                return $this->msg;
                }
        }
        public function metchUser($username, $password){
            $query = "SELECT username, password FROM tbl_user WHERE username = '$username' AND password = '$password'";
                $result = $this->db->select($query);
                if($result){
                    return true;
                }else{
                    return false;
                }
        }
        public function checkUser($username){
            $query = "SELECT username FROM tbl_user WHERE username = '$username'";
                $result = $this->db->select($query);
                if($result){
                    return true;
                }else{
                    return false;
                }
        }
        public function checkActiveUser($username, $encptyPass){
            $query = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$encptyPass' AND status = '0'";
                $result = $this->db->select($query);
                if($result){
                    return true;
                }else{
                    return false;
                }
        }
        public function userById($id){
            $query = "SELECT * FROM tbl_user WHERE id = '$id'";
                $result = $this->db->select($query);
                if($result){
                    return $result;
                }else{
                    return false;
                }
        }
        public function userProfile($id){
            $query = "SELECT * FROM tbl_user WHERE id = '$id'";
                $result = $this->db->select($query);
                if($result){
                    return $result;
                }else{
                    return false;
                }
        }

        public function deleteProfileImage($id){
            $query = "SELECT image FROM tbl_user WHERE id = '$id'";
            $result = $this->db->select($query);
            if($result){
               while($getImage = $result->fetch_assoc()){
                   $delImage = $getImage['image'];
                   if($delImage){
                       unlink($delImage);
                   }
               }
            }else{
                return false;
            }
        }

        public function activedUser(){
            $query = "SELECT * FROM tbl_user WHERE status='0'";
                $result = $this->db->select($query);
                if($result){
                    return mysqli_num_rows($result);
                }else{
                    return 0;
                }
        }
        public function inactiveUsers(){
            $query = "SELECT * FROM tbl_user WHERE status='1'";
                $result = $this->db->select($query);
                if($result){
                    return mysqli_num_rows($result);
                }else{
                    return 0;
                }
        }
        public function checkPassword($id, $password){
            $query = "SELECT password FROM tbl_user WHERE password = '$password' AND id = '$id'";
            $result = $this->db->select($query);
            if($result){
                return true;
            }else{
                return false;
            }
        }
    }