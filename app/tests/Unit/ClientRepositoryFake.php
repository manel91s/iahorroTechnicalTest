<?php

namespace Tests\Unit;

use App\Repository\RepositoryInterface;
use App\Models\Client;

class ClientRepositoryFake implements RepositoryInterface
{
  private array $clients = [];

  public function get(int $id): ?Client
  {
    $client = array_filter($this->clients, function ($client) use ($id) {
      return $client->id === $id;
    });

    return $client ? current($client) : null;
  }

  public function save(Client $client): Client
  {
    if ($client->id) {
      return $this->update($client);
    }

    $client->id = count($this->clients) + 1;

    $this->clients[] = $client;

    return $client;
  }

  public function update(Client $client): Client
  {
    $this->clients = array_map(function ($client) {
      return $client->id === $client->id ? $client : $client;
    }, $this->clients);

    return $client;
  }

  public function delete(int $id): bool
  {
    $this->deleteClient($id);

    if (count($this->clients) === 0) {
      return true;
    }

    return false;
  }

  private function deleteClient(int $id): void
  {
    $this->clients = array_filter($this->clients, function ($client) use ($id) {
      return $client->id !== $id;
    });
  }
}
