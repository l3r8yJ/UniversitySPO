<?php
class Repository {

  private $db;

  public function __construct() {
    $this->db = new PDO('mysql:host=localhost;dbname=l2_1', 'root', 'root');
  }

  public function fetchStudents($get) {
    $stmt = $this->db->prepare('
      SELECT * FROM l2_1.student INNER JOIN l2_1.group
      ON l2_1.group.id=l2_1.student.group_id
      WHERE l2_1.student.fio LIKE ?
      AND l2_1.group.name LIKE ?
      AND l2_1.student.year LIKE;
    ');
    $stmt->execute([$get['fio'], $get['name'], $get['year']])
    return $stmt->fetchAll();
  }
}
