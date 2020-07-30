<?php

declare(strict_types=1);

namespace websvc\yii2migration\table;

/**
 * Class TableColumnBigUPK
 * @package websvc\yii2migration\table
 */
class TableColumnBigUPK extends TableColumnBigPK
{
    /**
     * Builds methods chain for column definition.
     * @param TableStructure $table
     */
    public function buildSpecificDefinition(TableStructure $table): void
    {
        parent::buildSpecificDefinition($table);

        if ($table->generalSchema) {
            $this->definition[] = 'unsigned()';
            $this->isUnsignedPossible = false;
        }
    }
}
