<?php
  require_once(PROJECTPATH. "/config/init.php");

  class RegisterController {
    private $bookList;

    public function __construct() {
      require_once(PROJECTPATH."/views/home/add.php");
      $this->bookList = new BookStore();
    }

    public function index(){
    }

    public function registerBook() {
      $host = HOST;
      $uri = URI;

      if($_POST) { 
        foreach($_POST as $k => $v) {
          $this->bookList->$k = $v;
        }
        $this->bookList->save();
        header("Location: http://$host$uri/?controller=ListController&method=index");
      }
    }
  }