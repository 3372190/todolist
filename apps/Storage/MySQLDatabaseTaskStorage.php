<?php

namespace Todo\Storage;

use Todo\Storage\Contract\TaskStorageInterface;
use Todo\Model\Task;
use PDO;

class MySQLDatabaseTaskStorage implements TaskStorageInterface
{
  protected $db;

  public function __construct(PDO $db){
    $this->db = $db;
  }

  public function store(Task $task){
      var_dump($task);

      $statement = $this->db->prepare("
        INSERT INTO task(description, due, complete)
        VALUES (:description, :due, :complete)
      ");

      $statement->execute([
        'description' => $task->getDescription(),
        'due'         => $task->getDue()->format('Y-m-d H:i:s'),
        'complete'    => $task->getComplete() ? 1 : 0,
      ]);

      return $this->db->lastInsertId();
  }


  public function update(Task $task){
      $statement = $this->db->prepare("
          UPDATE task
          SET
              description = :description,
              due         = :due,
              complete    = :complete
          WHERE id = :id
      ");

      $statement->execute([
        'id'          => $task->getId(),
        'description' => $task->getDescription(),
        'due'         => $task->getDue()->format('Y-m-d H:i:s'),
        'complete'    => $task->getComplete() ? 1 : 0,
      ]);

      return $this->get($task->getId());
  }


  public function get($id){

      $statement = $this->db->prepare("
            SELECT *
            FROM task
            WHERE id = :id
      ");

      $statement->setFetchMode(PDO::FETCH_CLASS, Task::class);

      $statement->execute([
          'id' => $id,
      ]);
      return $statement->fetch();

  }

  public function all(){
    $statement = $this->db->prepare("SELECT * FROM task");
    $statement->setFetchMode(PDO::FETCH_CLASS, Task::class);
    $statement->execute();
    return $statement->fetchAll();
  }

  public function delete(Task $task){
      $statement = $this->db->prepare("
          DELETE FROM task
          WHERE id = :id
      ");

      $statement->execute(['id' => $task->getId()]);

      return 'Record Deleted Succesfully.';
  }




}
