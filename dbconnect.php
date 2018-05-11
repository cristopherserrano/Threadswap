<?php
class DbUtil{
  public static $user = "CS4750ebo6jt";
  public static $pass = "P8uY95Mahj6ept7q";
  public static $host = "stardock.cs.virginia.edu";
  public static $schema = "CS4750cas5tu";

  public static function loginConnection() {
    $db = new mysqli(DbUtil::$host, DbUtil::$user,
		     DbUtil::$pass, DbUtil::$schema);
    if($db->connect_errno) {
      echo "fail";
      $db->close();
      exit();
    }
    return $db;
  }
}
?> 