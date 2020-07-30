<?php

declare(strict_types=1);

/**
 * This is the template for generating the migration of a specified table.
 *
 * @var $table \websvc\yii2migration\table\TableStructure Table data
 * @var $className string Class name
 * @var $namespace string Migration namespace
 */

echo "<?php\n";
?>

<?php if ($namespace): ?>
namespace <?= $namespace ?>;
<?php echo "\n"; endif; ?>
use yii\db\Migration;

class <?= $className ?> extends Migration
{
<?php if ($dbConName): ?>
    public function init()
    {
        $this->db = '<?= $dbConName?>';
        parent::init();
    }
<?php endif; ?>

    public function up()
    {
<?= $table->render() ?>
    }

    public function down()
    {
        $this->dropTable('<?= $table->renderName() ?>');
    }
}
