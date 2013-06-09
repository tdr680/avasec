<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::import('Lib', 'DebugKit.FireCake');

/* firecake($this); */

$cakeDescription = __d('cake_dev', 'AvaSec');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');
        echo $this->Html->script('jquery');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>
              <?php echo $this->Html->link($cakeDescription,    '/'         ); ?>
              <?php echo $this->Html->link(' / Teams',          '/teams'    ); ?>
              <?php echo $this->Html->link(' / Users',          '/users'    ); ?>
              <?php echo $this->Html->link(' / Roles',          '/roles'    ); ?>
              <?php echo $this->Html->link(' / Access codes',   '/acodes'   ); ?>
              <?php echo $this->Html->link(' / Entities',       '/entities' ); ?>
              <?php echo $this->Html->link(' ( Applications',   '/entities/appl' ); ?>
              <?php echo $this->Html->link(' / Meta types',     '/entities/mtyp' ); ?>
              <?php echo $this->Html->link(' / Tasks',          '/entities/task' ); ?>
              <?php echo $this->Html->link(' / Workflows',      '/entities/wfc'  ); ?>
              <?php echo $this->Html->link(' / Ctx actions )',  '/entities/ctx'  ); ?>
            </h1>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
    <?php  echo $this->element('sql_dump'); ?>
</body>
</html>
