<?php

namespace App\Database;

use Illuminate\Database\SqlServerConnection as DatabaseSqlServerConnection;

/**
 * Class PostgresConnection
 * @package App\Database\Connection
 */
class SqlServerConnection extends DatabaseSqlServerConnection
{
    /**
     * @return PostgresGrammar
     */
    protected function getDefaultQueryGrammar()
    {
        return $this->withTablePrefix(new SqlServerGrammar);
    }
}