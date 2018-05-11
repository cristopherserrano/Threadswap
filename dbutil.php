<?php
class DbUtil{
  public static $loginUser = "CS4750ebo6jt"; 
  public static $loginPass = "P8uY95Mahj6ept7q";
  public static $host = "stardock.cs.virginia.edu"; // DB Host
  public static $schema = "CS4750cas5tu"; // DB Schema
  
  public static function loginConnection(){
    $db = new mysqli(DbUtil::$host, DbUtil::$loginUser, DbUtil::$loginPass, DbUtil::$schema);
    
    if($db->connect_errno){
      echo("Could not connect to db");
      $db->close();
      exit();
    }
    
    return $db;
  }
  
}
?>
