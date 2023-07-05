<?php

interface SQLQueryBuilderInterface
{
    // Contrado para os concrete builders
    public function select(string $table, array $fields): SQLQueryBuilderInterface;
    public function where(string $field, string $value, string $operator = '='): SQLQueryBuilderInterface;
    public function limit(int $start, int $offset): SQLQueryBuilderInterface;
    public function getSQL(): string;
}
