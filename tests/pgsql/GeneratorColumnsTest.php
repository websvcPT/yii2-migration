<?php

declare(strict_types=1);

namespace bizley\tests\pgsql;

use websvc\yii2migration\Generator;
use websvc\yii2migration\table\TableColumnBigInt;
use websvc\yii2migration\table\TableColumnBoolean;
use websvc\yii2migration\table\TableColumnChar;
use websvc\yii2migration\table\TableColumnDecimal;
use websvc\yii2migration\table\TableColumnDouble;
use websvc\yii2migration\table\TableColumnInt;
use websvc\yii2migration\table\TableColumnJson;
use websvc\yii2migration\table\TableColumnSmallInt;
use websvc\yii2migration\table\TableColumnString;
use websvc\yii2migration\table\TableColumnTimestamp;
use bizley\tests\cases\GeneratorColumnsTestCase;
use Yii;
use yii\db\pgsql\Schema;

/**
 * @group pgsql
 */
class GeneratorColumnsTest extends GeneratorColumnsTestCase
{
    public static $schema = 'pgsql';

    public function testColumnBigInt(): void
    {
        $table = $this->getGenerator()->table;
        $this->assertArrayHasKey('col_big_int', $table->columns);
        $this->assertInstanceOf(TableColumnBigInt::class, $table->columns['col_big_int']);
        $this->assertEquals('col_big_int', $table->columns['col_big_int']->name);
        $this->assertEquals(Schema::TYPE_BIGINT, $table->columns['col_big_int']->type);
        $this->assertEquals(null, $table->columns['col_big_int']->length);
    }

    public function testColumnInt(): void
    {
        $table = $this->getGenerator()->table;
        $this->assertArrayHasKey('col_int', $table->columns);
        $this->assertInstanceOf(TableColumnInt::class, $table->columns['col_int']);
        $this->assertEquals('col_int', $table->columns['col_int']->name);
        $this->assertEquals(Schema::TYPE_INTEGER, $table->columns['col_int']->type);
        $this->assertEquals(null, $table->columns['col_int']->length);
    }

    public function testColumnSmallInt(): void
    {
        $table = $this->getGenerator()->table;
        $this->assertArrayHasKey('col_small_int', $table->columns);
        $this->assertInstanceOf(TableColumnSmallInt::class, $table->columns['col_small_int']);
        $this->assertEquals('col_small_int', $table->columns['col_small_int']->name);
        $this->assertEquals(Schema::TYPE_SMALLINT, $table->columns['col_small_int']->type);
        $this->assertEquals(null, $table->columns['col_small_int']->length);
    }

    public function testColumnTinyInt(): void
    {
        $table = (new Generator([
            'db' => Yii::$app->db,
            'tableName' => 'test_tinyint',
        ]))->table;

        $this->assertArrayHasKey('col_tiny_int', $table->columns);
        $this->assertInstanceOf(TableColumnSmallInt::class, $table->columns['col_tiny_int']);
        $this->assertEquals('col_tiny_int', $table->columns['col_tiny_int']->name);
        $this->assertEquals(Schema::TYPE_SMALLINT, $table->columns['col_tiny_int']->type);
        $this->assertEquals(null, $table->columns['col_tiny_int']->length);
    }

    public function testColumnBool(): void
    {
        $table = $this->getGenerator()->table;
        $this->assertArrayHasKey('col_bool', $table->columns);
        $this->assertEquals('col_bool', $table->columns['col_bool']->name);
        $this->assertInstanceOf(TableColumnBoolean::class, $table->columns['col_bool']);
        $this->assertEquals(Schema::TYPE_BOOLEAN, $table->columns['col_bool']->type);
        $this->assertEquals(null, $table->columns['col_bool']->length);
    }

    public function testColumnChar(): void
    {
        $table = $this->getGenerator()->table;
        $this->assertArrayHasKey('col_char', $table->columns);
        $this->assertInstanceOf(TableColumnChar::class, $table->columns['col_char']);
        $this->assertEquals('col_char', $table->columns['col_char']->name);
        $this->assertEquals(Schema::TYPE_CHAR, $table->columns['col_char']->type);
        $this->assertEquals(1, $table->columns['col_char']->length);
    }

    public function testColumnDateTime(): void
    {
        $table = $this->getGenerator()->table;
        $this->assertArrayHasKey('col_date_time', $table->columns);
        $this->assertInstanceOf(TableColumnTimestamp::class, $table->columns['col_date_time']);
        $this->assertEquals('col_date_time', $table->columns['col_date_time']->name);
        $this->assertEquals(Schema::TYPE_TIMESTAMP, $table->columns['col_date_time']->type);
        $this->assertEquals(0, $table->columns['col_date_time']->length);
    }

    public function testColumnDecimal(): void
    {
        $table = $this->getGenerator()->table;
        $this->assertArrayHasKey('col_decimal', $table->columns);
        $this->assertInstanceOf(TableColumnDecimal::class, $table->columns['col_decimal']);
        $this->assertEquals('col_decimal', $table->columns['col_decimal']->name);
        $this->assertEquals(Schema::TYPE_DECIMAL, $table->columns['col_decimal']->type);
        $this->assertEquals('10, 0', $table->columns['col_decimal']->length);
    }

    public function testColumnDouble(): void
    {
        $table = $this->getGenerator()->table;
        $this->assertArrayHasKey('col_double', $table->columns);
        $this->assertInstanceOf(TableColumnDouble::class, $table->columns['col_double']);
        $this->assertEquals('col_double', $table->columns['col_double']->name);
        $this->assertEquals(Schema::TYPE_DOUBLE, $table->columns['col_double']->type);
        $this->assertEquals(null, $table->columns['col_double']->length);
    }

    public function testColumnFloat(): void
    {
        $table = $this->getGenerator()->table;
        $this->assertArrayHasKey('col_float', $table->columns);
        $this->assertInstanceOf(TableColumnDouble::class, $table->columns['col_float']);
        $this->assertEquals('col_float', $table->columns['col_float']->name);
        $this->assertEquals(Schema::TYPE_DOUBLE, $table->columns['col_float']->type);
        $this->assertEquals(null, $table->columns['col_float']->length);
    }

    public function testColumnMoney(): void
    {
        $table = $this->getGenerator()->table;
        $this->assertArrayHasKey('col_money', $table->columns);
        $this->assertInstanceOf(TableColumnDecimal::class, $table->columns['col_money']);
        $this->assertEquals('col_money', $table->columns['col_money']->name);
        $this->assertEquals(Schema::TYPE_DECIMAL, $table->columns['col_money']->type);
        $this->assertEquals('19, 4', $table->columns['col_money']->length);
    }

    public function testColumnString(): void
    {
        $table = $this->getGenerator()->table;
        $this->assertArrayHasKey('col_string', $table->columns);
        $this->assertInstanceOf(TableColumnString::class, $table->columns['col_string']);
        $this->assertEquals('col_string', $table->columns['col_string']->name);
        $this->assertEquals(Schema::TYPE_STRING, $table->columns['col_string']->type);
        $this->assertEquals(255, $table->columns['col_string']->length);
    }

    public function testColumnJson(): void
    {
        $table = (new Generator([
            'db' => Yii::$app->db,
            'tableName' => 'test_json',
        ]))->table;
        $this->assertArrayHasKey('col_json', $table->columns);
        $this->assertInstanceOf(TableColumnJson::class, $table->columns['col_json']);
        $this->assertEquals('col_json', $table->columns['col_json']->name);
        $this->assertEquals(Schema::TYPE_JSON, $table->columns['col_json']->type);
        $this->assertEquals(null, $table->columns['col_json']->length);
    }
}
