<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function getAll();

    public function find($id);

    public function create($data);

    public function update($id, $attributes);

    public function delete($id);
}
