<?php

namespace App\classes\builder\Functions;

use App\classes\builder\QueryInterface;

class Select implements QueryInterface
{
    /**
     * @var array<string>
     */
    private $fields = [];

    /**
     * @var array<string>
     */
    private $conditions = [];

    /**
     * @var array<string>
     */
    private $order = [];

    /**
     * @var array<string>
     */
    private $from = [];

    /**
     * @var array<string>
     */
    private $innerJoin = [];

    /**
     * @var array<string>
     */
    private $leftJoin = [];


    private $group = [];
    /**
     * @var array<string>
     */
    private $having = [];


    /**
     * @var int|null
     */
    private $limit;

    /**
     * Select constructor.
     * @param array $select
     */
    public function __construct(array $select)
    {
        $this->fields = $select;
    }

    /**
     * @param string[] ...$select
     * @return Select
     */
    public function select(string ...$select): self
    {
        foreach ($select as $arg) {
            $this->fields[] = $arg;
        }
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return 'SELECT ' . implode(', ', $this->fields)
            . ' FROM ' . implode(', ', $this->from)
            . ($this->leftJoin === [] ? '' : ' LEFT JOIN ' . implode(' LEFT JOIN ', $this->leftJoin))
            . ($this->innerJoin === [] ? '' : ' INNER JOIN ' . implode(' INNER JOIN ', $this->innerJoin))
            . ($this->conditions === [] ? '' : ' WHERE ' . implode(' AND ', $this->conditions))
            . ($this->group === [] ? '' : ' GROUP BY ' . implode(', ', $this->group))
            . ($this->having === [] ? '' : ' HAVING ' . implode(', ', $this->having))
            . ($this->order === [] ? '' : ' ORDER BY ' . implode(', ', $this->order))
            . ($this->limit === null ? '' : ' LIMIT ' . $this->limit);
    }

    /**
     * @param string[] ...$where
     * @return Select
     */
    public function where(string ...$where): self
    {
        foreach ($where as $arg) {
            $this->conditions[] = $arg;
        }
        return $this;
    }

    /**
     * @param string[] ...$having
     * @return Select
     */
    public function having(string ...$having): self
    {
        foreach ($having as $arg) {
            $this->having[] = $arg;
        }
        return $this;
    }

    /**
     * @param string $table
     * @param null|string $alias
     * @return Select
     */
    public function from(string $table, ?string $alias = null): self
    {
        $this->from[] = $alias === null ? $table : "${table} AS ${alias}";
        return $this;
    }

    /**
     * @param int $limit
     * @return Select
     */
    public function limit(int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @param string[] ...$group
     * @return Select
     */
    public function groupBy(string ...$group): self
    {
        $this->group = $group;
        return $this;
    }

    /**
     * @param string[] ...$order
     * @return Select
     */
    public function orderBy(string ...$order): self
    {
        foreach ($order as $arg) {
            $this->order[] = $arg;
        }
        return $this;
    }

    /**
     * @param string[] ...$join
     * @return Select
     */
    public function innerJoin(string ...$join): self
    {
        $this->leftJoin = [];
        foreach ($join as $arg) {
            $this->innerJoin[] = $arg;
        }
        return $this;
    }

    /**
     * @param string[] ...$join
     * @return Select
     */
    public function leftJoin(string ...$join): self
    {
        $this->innerJoin = [];
        foreach ($join as $arg) {
            $this->leftJoin[] = $arg;
        }
        return $this;
    }
}
