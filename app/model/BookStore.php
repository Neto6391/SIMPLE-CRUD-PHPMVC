<?php
  require_once(PROJECTPATH."/config/init.php");

  class BookStore {

    private $tableName = "bookstore_list";
    private $atributes;

    public function __set(string $atributo, $valor) {
      $this->atributes[$atributo] = $valor;
      return $this;
    }
    public function __get(string $atributo) {
        return $this->atributes[$atributo];
    }
    public function __isset($atributo) {
        return isset($this->atributes[$atributo]);
    }

    public function save() {
      $colunas = $this->atributes;
      $query = "INSERT INTO {$this->tableName} (id_book, ".implode(', ', array_keys($colunas))." ) VALUES ('','".implode("', '", array_values($colunas))."');";
      
        if ($conexao = Connection::getInstance()) {
          $stmt = $conexao->prepare($query);
          if ($stmt->execute()) {
            return $stmt->rowCount();
          }
        }
        
        return false;
    }

    public function update($id) {
      $colunas = $this->atributes;
      foreach ($colunas as $key => $value) {
        if ($key !== 'id') {
            $define[] = "{$key}='{$value}'";
        }
      }
      
      $query = "UPDATE {$this->tableName} SET ".implode(", ", $define)." WHERE id_book = {$id};";

      if ($conexao = Connection::getInstance()) {
        $stmt = $conexao->prepare($query);

        if ($stmt->execute()) {
            return $stmt->rowCount();
        }
      }
      return false;

      }

      public function delete($id) {
        $conexao = Connection::getInstance();
        if ($conexao->exec("DELETE FROM {$this->tableName} WHERE id_book='{$id}'")) {
            return true;
        }
        return false;
      }

    public function search($id = null) {
      if(isset($id)) {
        $con  = Connection::getInstance();
        $stmt = $con->prepare("SELECT * FROM {$this->tableName} WHERE id_book='{$id}';");
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $resultado = $stmt->fetchObject('BookStore');
                if ($resultado) {
                    $con = Connection::close();
                    return $resultado;
                }
            }
        }
        $con = Connection::close();
        return false;
      }

      $con = Connection::getInstance();
      $stmt = $con->prepare("SELECT * FROM {$this->tableName}");
      $result = array();
      if($stmt->execute()) {
        while ($rs = $stmt->fetchObject('BookStore')) {
          $result[] = $rs;
        }
        
      }
      $con = Connection::close();
      if (count($result) > 0) {
        return $result;
      }
      return false;
    }
}