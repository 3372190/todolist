<?php

use Todo\Model\Task;
use Todo\Storage\MySQLDatabaseTaskStorage;

require 'vendor/autoload.php';

$dsn = 'mysql:dbname=todo; host=127.0.0.1';
$user = 'root';
$password = '';

$db = new PDO($dsn, $user, $password);


$storage = new MySQLDatabaseTaskStorage($db);
$task = new Task;
var_dump(get_class_methods($storage));
var_dump(get_class_methods($task));
var_dump($storage, $task);

//CREATE NEW TASK COMPLETED !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    // $task->setDescription('Demo Two,Three,Four');
    // $task->setDue(new DateTime('now', new DateTimeZone('Australia/Melbourne')));
    // echo '<br> NOW STORAGE <br>';
    // $store = $storage->store($task);

//UPDATE SELECTED TASK!!!!
    // $taskId = $storage->get(3);
    // var_dump($taskId);
    // $taskId->setDescription('Lunch - Finished Eating My Lunch');
    // $update = $storage->update($taskId);
    // var_dump($update);

//DELETE SELECTED TASK!!!!
    // $taskId = $storage->get(33);
    // var_dump($taskId);
    // $delete = $storage->delete($taskId);
    // var_dump($delete);

//Display All the Database Record!!
    var_dump($storage->all());
