<?php
  
  require_once(PROJECTPATH. "/config/init.php");

  class ListController {

    private $bookList;

    public function __construct() {
      require_once(PROJECTPATH."/views/home/list.php");
      $this->bookList = new BookStore();
    }

    public function index() {}

    public function createTable() {
      $row = $this->bookList->search();
      if($row) {
        foreach($row as $value) {
        
        echo "<th scope='row'>".$value->id_book."</th>";
        echo "<td>".$value->name."</td>";
        echo "<td>".$value->author."</td>";
        echo "<td>".$value->quantity_pages."</td>";
        echo "<td>".$value->book_price."</td>";
        echo "<td>".$value->book_flag."</td>";
        echo "<td>".$value->date."</td>";
        echo "<td>";
        echo " <a href='?controller=EditController&method=index&id={$value->id_book}'>";
        echo "    <button type='button' class='btn btn-warning mr-2'>Editar</button>";
        echo " </a>";
        echo "  <a href='?controller=DeleteController&method=delete&id={$value->id_book}'>";
        echo "<button type='button' class='btn btn-danger'>Excluir</button></td>";
        echo " </a>";
        echo "</div>";
        echo "</tr>";
        }
      } else {
        echo "<tr>";
        echo "<div class='row'>";
        echo "<td class='bg-secondary' colspan='8'><p class='text-center text-light'>Nenhum registro encontrado</p></td>";
        echo "</div>";
        echo "</tr>";
      }
    }
  }