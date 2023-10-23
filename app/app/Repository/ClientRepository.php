<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\Client;
use App\Repository\RepositoryInterface;

class ClientRepository implements RepositoryInterface
{

  public function get(int $id): ?Client
  {
    $client = Client::find($id);

    return $client;
  }

  public function save(Client $client): Client
  {
    $client->save();

    return $client;
  }

  public function update(Client $client): Client
  {
    $client->update();

    return $client;
  }

  public function delete(int $id): bool
  {
    $client = Client::find($id);

    return $client->delete();
  }
}
