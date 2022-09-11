<?php

namespace App\classes\functions;

use App\classes\builder\QueryInterface;

class Insert implements QueryInterface
{
    private $table;
    private $columns = [];
    private $values = [];

    public function __construct(string $table)
    {
        $this->table = $table;
    }

    public function __toString(): string
    {
        return 'INSERT INTO ' . $this->table
            . ' (' . implode(', ', $this->columns) . ') VALUES (' . implode(', ', $this->values) . ')';
    }

    public function columns(string ...$columns): self
    {
        $this->columns = $columns;
        return $this;
    }

    public function values(string ...$values): self
    {
        $this->values = $values;
        return $this;
    }
}