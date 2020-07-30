<?php

declare(strict_types=1);

namespace websvc\yii2migration\table;

use yii\base\InvalidArgumentException;
use yii\helpers\Json;
use function is_array;

/**
 * Class TableColumnJson
 * @package websvc\yii2migration\table
 */
class TableColumnJson extends TableColumn
{
    /**
     * Checks if default value is JSONed array. If so it's decoded.
     * @since 3.3.0
     */
    public function init(): void
    {
        parent::init();

        if ($this->default !== '' && $this->default !== null && !is_array($this->default)) {
            try {
                $default = Json::decode($this->default);

                if (is_array($default)) {
                    $this->default = $default;
                }
            } catch (InvalidArgumentException $exception) {
            }
        }
    }

    /**
     * Builds methods chain for column definition.
     * @param TableStructure $table
     */
    public function buildSpecificDefinition(TableStructure $table): void
    {
        $this->definition[] = 'json()';
    }
}
