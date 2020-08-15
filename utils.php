<?php
class DB{
    var $db;
    public function __construct($db = null){
        if($db === null){
            $this->db = mysqli_connect('localhost', 'root', 'root', 'voody');
        }else{
            $this->db = $db;
        }
        return $this->db;
    }
    public static function getDB(){
        return self::class->db;
    }
    public function __destroy(){
        mysqli_close($this->db);
    }
}
function get_user(){
    $db = mysqli_connect('localhost', 'root', 'root', 'voody');
    $email = $_SESSION['username'];
    $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    return mysqli_fetch_array($result);
}
function get_db(){
    return mysqli_connect('localhost', 'root', 'root', 'voody');;
}
function get_receipts(){
    $user_id = get_user()['id'];
    $user_check_query = "SELECT * FROM receipts WHERE user=$user_id LIMIT 50";
    $result = mysqli_query(get_db(), $user_check_query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
function get_purchases(){
    $user_id = get_user()['id'];
    $user_check_query = "SELECT * FROM purchases WHERE user=$user_id LIMIT 50";
    $result = mysqli_query(get_db(), $user_check_query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}