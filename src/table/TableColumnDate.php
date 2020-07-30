<?php

declare(strict_types=1);

namespace websvc\yii2migration\table;

/**
 * Class TableColumnDate
 * @package websvc\yii2migration\table
 */
class TableColumnDate extends TableColumn
{
    /**
     * Builds methods chain for column definition.
     * @param TableStructure $table
     */
    public function buildSpecificDefinition(TableStructure $table): void
    {
        $this->definition[] = 'date()';
    }
}
