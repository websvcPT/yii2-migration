<?php

declare(strict_types=1);

namespace websvc\yii2migration\table;

use yii\base\BaseObject;
use function count;
use function implode;
use function in_array;
use function sprintf;
use function str_repeat;

/**
 * Class TablePrimaryKey
 * @package websvc\yii2migration\table
 */
class TablePrimaryKey extends BaseObject
{
    public const GENERIC_PRIMARY_KEY = 'PRIMARYKEY';

    /**
     * @var string
     */
    public $name;

    /**
     * @var array
     */
    public $columns = [];

    /**
     * Checks if primary key is composite.
     * @return bool
     */
    public function isComposite(): bool
    {
        return count($this->columns) > 1;
    }

    /**
     * Renders the key.
     * @param TableStructure $table
     * @param int $indent
     * @return string
     */
    public function render(TableStructure $table, int $indent = 8): string
    {
        return str_repeat(' ', $indent) . sprintf(
            '$this->addPrimaryKey(\'%s\', \'%s\', [\'%s\']);',
            $this->name ?: self::GENERIC_PRIMARY_KEY,
            $table->renderName(),
            implode("', '", $this->columns)
        );
    }

    /**
     * Adds column to the key.
     * @param string $name
     */
    public function addColumn(string $name): void
    {
        if (!in_array($name, $this->columns, true)) {
            $this->columns[] = $name;
        }
    }
}
