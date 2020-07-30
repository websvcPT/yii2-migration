<?php

declare(strict_types=1);

namespace bizley\tests\table;

use websvc\yii2migration\table\TableColumnText;
use websvc\yii2migration\table\TableStructure;
use bizley\tests\cases\TableColumnTestCase;

class TableColumnTextTest extends TableColumnTestCase
{
    public function noSchemaDataProvider(): array
    {
        return [
            [['size' => 'max'], false, '$this->text()'],
            [['size' => 1024], false, '$this->text()'],
            [['size' => 'max'], true, '$this->text()'],
            [['size' => 1024], true, '$this->text()'],
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
        $column = new TableColumnText($column);
        $this->assertEquals($result, $column->renderDefinition($this->getTable($generalSchema)));
    }

    public function withSchemaDataProvider(): array
    {
        return [
            [['size' => 'max'], false, '$this->text(\'max\')'],
            [['size' => 1024], false, '$this->text(1024)'],
            [['size' => 'max'], true, '$this->text(\'max\')'],
            [['size' => 1024], true, '$this->text(1024)'],
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
        $column['schema'] = TableStructure::SCHEMA_MSSQL;
        $column = new TableColumnText($column);
        $this->assertEquals($result, $column->renderDefinition($this->getTable($generalSchema)));
    }

    public function withMappingAndSchemaDataProvider(): array
    {
        return [
            [['size' => 'max'], false, '$this->text(\'max\')'],
            [['size' => 1024], false, '$this->text(1024)'],
            [['size' => 'max'], true, '$this->text()'],
            [['size' => 1024], true, '$this->text(1024)'],
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
        $column['schema'] = TableStructure::SCHEMA_MSSQL;
        $column['defaultMapping'] = 'nvarchar(max)';
        $column = new TableColumnText($column);
        $this->assertEquals($result, $column->renderDefinition($this->getTable($generalSchema)));
    }
}
