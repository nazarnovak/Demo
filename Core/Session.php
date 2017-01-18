<?php

namespace Core;

// Session
class Session
{
  public static function init()
  {
    session_start();
  }

  public static function setUser($userId)
  {
    $_SESSION['user'] = $userId;
  }

  public static function getUser()
  {
    return isset($_SESSION['user']) ? $_SESSION['user'] : false;
  }
  
  public static function deleteUser()
  {
    if(isset($_SESSION['user'])) {
      unset($_SESSION['user']);
    }
  }
}
