<?php
require_once 'service.php';
require_once 'repository.php';

$service = new Service(new Repository());
$students = $service->filtredStudents();

require_once 'view.php';
