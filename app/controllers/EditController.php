<?php
  
  class EditController {

    private $id;
    private $nome;
    private $autor;
    private $quantidade;
    private $preco;
    private $data;
    private $flag;

    public function __construct() {
      $this->bookList = new BookStore();
    }

    public function index($id) {
      $this->id = $id['id'];
      
      require_once(PROJECTPATH.'/views/home/edit.php');
      $row = $this->bookList->search($this->getId());
      $this->edit($this->id);
    }

    public function edit($id) {
      $row = $this->bookList->search($id);
      $this->nome = $row->name;
      $this->autor = $row->author;
      $this->quantidade = $row->quantity_pages;
      $this->preco = $row->book_price;
      $this->flag = $row->book_flag;
      $this->data = $row->date;
    }

    public function update($id) {
      $host = HOST;
      $uri = URI;

      if($_POST) {
        foreach($_POST as $k => $v) {
          $this->bookList->$k = $v;
        }
        $this->bookList->update($id['id']);
  
        header("Location: http://$host$uri/?controller=ListController&method=index");
      }
    }

    public function getId() {
      return $this->id;
    }

    public function getNome(){
      return $this->nome;
    }

    public function getAutor(){
      return $this->autor;
    }

    public function getQuantidade(){
      return $this->quantidade;
    }

    public function getPreco(){
      return $this->preco;
    }

    public function getData(){
      return $this->data;
    }

    public function getFlag(){
      return $this->flag;
    }

    public function getRowAtributes() {
      return $this->rowAtributes;
    }
  }