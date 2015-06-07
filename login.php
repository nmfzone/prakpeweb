<?php

  include('config/autoload.php');

  if (isset($_POST['username']) && isset($_POST['password']))
  {

      $username = $_POST['username'];
      $password = $_POST['password'];

      $yes = 0;
      if ($username == $useradm && $password == $passadm) {
          $yes = 1;
      }

      if ($yes == 1) {
            $lifetime=2;
            session_set_cookie_params($lifetime);
            session_start();
            $_SESSION['username']= $username;
            $_SESSION['password']= $password;
            echo "1";
      } else {
            echo "0";
      }
  }
  else 
  {
    $app->redirect('/');
  }