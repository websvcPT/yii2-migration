<?php

declare(strict_types=1);

/**
 * This is the template for generating the update migration of a specified table.
 *
 * @var $table \websvc\yii2migration\table\TableStructure Table structure
 * @var $className string Class name
 * @var $namespace string Namespace
 * @var $plan \websvc\yii2migration\table\TablePlan Changes definitions
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
<?= $plan->render($table) ?>
    }

    public function down()
    {
        echo "<?= $className ?> cannot be reverted.\n";
        return false;
    }
}
