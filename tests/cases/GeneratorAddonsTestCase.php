<?php

declare(strict_types=1);

namespace bizley\tests\cases;

use websvc\yii2migration\Generator;
use Yii;

class GeneratorAddonsTestCase extends DbTestCase
{
    protected function getGenerator(): Generator
    {
        return new Generator([
            'db' => Yii::$app->db,
            'tableName' => 'test_addons',
        ]);
    }

    public function testColumnUnique(): void
    {
        $table = $this->getGenerator()->table;
        $this->assertArrayHasKey('col_unique', $table->columns);
        $this->assertEquals(true, $table->columns['col_unique']->isUnique);
    }

    public function testColumnNotNull(): void
    {
        $table = $this->getGenerator()->table;
        $this->assertArrayHasKey('col_not_null', $table->columns);
        $this->assertEquals(true, $table->columns['col_not_null']->isNotNull);
    }

    public function testColumnDefaultValue(): void
    {
        $table = $this->getGenerator()->table;
        $this->assertArrayHasKey('col_default_value', $table->columns);
        $this->assertEquals(1, $table->columns['col_default_value']->default);
    }

    public function testColumnDefaultEmptyValue(): void
    {
        $table = $this->getGenerator()->table;
        $this->assertArrayHasKey('col_default_empty_value', $table->columns);
        $this->assertSame('', $table->columns['col_default_empty_value']->default);
    }
}
