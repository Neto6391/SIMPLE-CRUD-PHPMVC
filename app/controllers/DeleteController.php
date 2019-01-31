<?php
  class DeleteController {
    
    private $bookList;

    public function delete($id) {
      $this->bookList = new BookStore();
      $host = HOST;
      $uri = URI;

      if($this->bookList->delete($id['id'])){
        header("Location: http://$host$uri/?controller=ListController&method=index");
      } 
    }
  }
?>