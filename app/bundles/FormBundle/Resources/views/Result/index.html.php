<?php
/**
 * @package     Mautic
 * @copyright   2014 Mautic, NP. All rights reserved.
 * @author      Mautic
 * @link        http://mautic.com
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

$view->extend('MauticCoreBundle:Default:content.html.php');
$view['blocks']->set('mauticContent', 'formresult');
$view['blocks']->set("headerTitle", $view['translator']->trans('mautic.form.result.header.index', array(
    '%name%' => $form->getName()
)));
?>

<?php $view['blocks']->start("actions"); ?>
<li>
    <a href="<?php echo $this->container->get('router')->generate(
        'mautic_form_export', array("objectId" => $form->getId(), "format" => "csv")); ?>"
       data-toggle="download">
        <?php echo $view["translator"]->trans("mautic.form.result.export.csv"); ?>
    </a>
</li>
<?php if (class_exists('PHPExcel')): ?>
<li>
    <a href="<?php echo $this->container->get('router')->generate(
        'mautic_form_export', array("objectId" => $form->getId(), "format" => "xlsx")); ?>"
       data-toggle="download">
        <?php echo $view["translator"]->trans("mautic.form.result.export.xlsx"); ?>
    </a>
</li>
<?php endif; ?>
<li>
    <a href="<?php echo $this->container->get('router')->generate(
        'mautic_form_export', array("objectId" => $form->getId(), "format" => "html")); ?>"
       target="_blank">
        <?php echo $view["translator"]->trans("mautic.form.result.export.html"); ?>
    </a>
</li>
<?php if (class_exists('mPDF')): ?>
<li>
    <a href="<?php echo $this->container->get('router')->generate(
        'mautic_form_export', array("objectId" => $form->getId(), "format" => "pdf")); ?>"
       target="_blank">
        <?php echo $view["translator"]->trans("mautic.form.result.export.pdf"); ?>
    </a>
</li>
<?php endif; ?>
<?php $view['blocks']->stop(); ?>

<?php $view['blocks']->output('_content'); ?>