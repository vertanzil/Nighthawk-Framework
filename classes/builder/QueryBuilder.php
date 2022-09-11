<?php

namespace App\classes\builder;

use App\classes\functions\Delete;
use App\classes\functions\Insert;
use App\classes\functions\Select;
use App\classes\functions\Update;

/**
 * Class QueryBuilder
 * @package App\classes\builder
 */
class QueryBuilder
{
    /**
     * @param string[] ...$select
     * @return Select
     */
    public static function select(string ...$select): Select
    {
        return new Select($select);
    }

    /**
     * @param string $into
     * @return Insert
     */
    public static function insert(string $into): Insert
    {
        return new Insert($into);
    }

    /**
     * @param string $table
     * @return Update
     */
    public static function update(string $table): Update
    {
        return new Update($table);
    }

    /**
     * @param string $table
     * @return Delete
     */
    public static function delete(string $table): Delete
    {
        return new Delete($table);
    }
}
