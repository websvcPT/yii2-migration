<?php

declare(strict_types=1);

namespace websvc\yii2migration\table;

use function in_array;

/**
 * Class TableColumnBigInt
 * @package websvc\yii2migration\table
 */
class TableColumnBigInt extends TableColumn
{
    /**
     * @var array Schemas using length for this column
     * @since 3.1
     */
    public $lengthSchemas = [TableStructure::SCHEMA_MYSQL, TableStructure::SCHEMA_OCI];

    /**
     * Returns length of the column.
     * @return int|string
     */
    public function getLength()
    {
        return in_array($this->schema, $this->lengthSchemas, true) ? $this->size : null;
    }

    /**
     * Sets length of the column.
     * @param string|int $value
     */
    public function setLength($value): void
    {
        if (in_array($this->schema, $this->lengthSchemas, true)) {
            $this->size = $value;
            $this->precision = $value;
        }
    }

    /**
     * Builds methods chain for column definition.
     * @param TableStructure $table
     */
    public function buildSpecificDefinition(TableStructure $table): void
    {
        if ($table->generalSchema && !$table->primaryKey->isComposite() && $this->isColumnInPK($table->primaryKey)) {
            $this->isPkPossible = false;
            $this->isNotNullPossible = false;
            $this->definition[] = 'bigPrimaryKey(' . $this->getRenderLength($table->generalSchema) . ')';
        } else {
            $this->definition[] = 'bigInteger(' . $this->getRenderLength($table->generalSchema) . ')';
        }
    }
}
