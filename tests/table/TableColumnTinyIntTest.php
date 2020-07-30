<?php

declare(strict_types=1);

namespace bizley\tests\table;

use websvc\yii2migration\table\TableColumnTinyInt;
use websvc\yii2migration\table\TableStructure;
use bizley\tests\cases\TableColumnTestCase;

class TableColumnTinyIntTest extends TableColumnTestCase
{
    public function noSchemaDataProvider(): array
    {
        return [
            [['size' => 3], false, '$this->tinyInteger()'],
            [['size' => 7], false, '$this->tinyInteger()'],
            [['size' => 3], true, '$this->tinyInteger()'],
            [['size' => 7], true, '$this->tinyInteger()'],
        ];
    }

    /**
     * @dataProvider noSchemaDataProvider
     * @param array $column
     * @param bool $generalSchema
     * @param string $result
     */
    public function testDefinitionNoSchema(array $column, bool $generalSchema, string $result): void
    {
        $column = new TableColumnTinyInt($column);
        $this->assertEquals($result, $column->renderDefinition($this->getTable($generalSchema)));
    }

    public function withSchemaDataProvider(): array
    {
        return [
            [['size' => 3], false, '$this->tinyInteger(3)'],
            [['size' => 7], false, '$this->tinyInteger(7)'],
            [['size' => 3], true, '$this->tinyInteger(3)'],
            [['size' => 7], true, '$this->tinyInteger(7)'],
        ];
    }

    /**
     * @dataProvider withSchemaDataProvider
     * @param array $column
     * @param bool $generalSchema
     * @param string $result
     */
    public function testDefinitionWithSchema(array $column, bool $generalSchema, string $result): void
    {
        $column['schema'] = TableStructure::SCHEMA_MYSQL;
        $column = new TableColumnTinyInt($column);
        $this->assertEquals($result, $column->renderDefinition($this->getTable($generalSchema)));
    }

    public function withMappingAndSchemaDataProvider(): array
    {
        return [
            [['size' => 3], false, '$this->tinyInteger(3)'],
            [['size' => 7], false, '$this->tinyInteger(7)'],
            [['size' => 3], true, '$this->tinyInteger()'],
            [['size' => 7], true, '$this->tinyInteger(7)'],
        ];
    }

    /**
     * @dataProvider withMappingAndSchemaDataProvider
     * @param array $column
     * @param bool $generalSchema
     * @param string $result
     */
    public function testDefinitionWithMappingAndSchema(array $column, bool $generalSchema, string $result): void
    {
        $column['schema'] = TableStructure::SCHEMA_MYSQL;
        $column['defaultMapping'] = 'tinyint(3)';
        $column = new TableColumnTinyInt($column);
        $this->assertEquals($result, $column->renderDefinition($this->getTable($generalSchema)));
    }
}
