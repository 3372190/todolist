<?php

namespace Todo\Storage\Contract;

use Todo\Model\Task;

interface  TaskStorageInterface
{
    public function store(Task $task);
    public function update(Task $task);
    public function all();
    public function get($id);
    public function delete(Task $task);

}
