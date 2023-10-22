<?php

namespace App\Repository;

use App\Models\Client;

interface RepositoryInterface
{
  public function get(int $id): ?Client;
  public function save(Client $client): Client;
  public function update(Client $client): Client;
  public function delete(int $id): bool;
}
