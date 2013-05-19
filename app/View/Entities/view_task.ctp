<?php $this->extend('view'); ?>
<?php $this->assign('type',   'EntityTask'); ?>

</p>

<dl>
  <dt><?php echo __('Type'); ?></dt>
  <dd>
	<?php echo h($entity['EntityTask']['type']); ?>
	&nbsp;
  </dd>
  <dt><?php echo __('Meta out Id'); ?></dt>
  <dd>
	<?php echo h($entity['EntityTask']['meta_out_id']); ?>
	&nbsp;
  </dd>
</dl>

<!-- <?php $this->start('acode'); ?> -->
<!-- <p> -->
<!-- <h1>== acodes ==</h1> -->
<!-- </p> -->
<!-- <?php $this->end(); ?> -->

<!-- here goes other wfc specific stuff -->
