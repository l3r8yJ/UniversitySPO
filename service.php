<?php
class Service {

  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  public function filtredStudents() {
    return $this->db->fetchStudents($this->preparedGet());
  }

  private function preparedGet() {
    $this->replaceIfNotExist('fio');
    $this->replaceIfNotExist('name');
    $this->replaceIfNotExist('year');
    return $_GET;
  }

  private function replaceIfNotExist($key) {
    if (isset($_GET[$key])) {
      if($_GET[$key] === '') {
        $_GET[$key] = '%';
      }
    }
  }
}
