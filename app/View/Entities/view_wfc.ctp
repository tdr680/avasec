<?php $this->extend('view'); ?>
<?php $this->assign('type',   'EntityWfc'); ?>

</p>

<dl>
  <dt><?php echo __('Meta typ'); ?></dt>
  <dd>
	<?php echo h($entity['EntityWfc']['meta_typ_id']); ?>
	&nbsp;
  </dd>
  <dt><?php echo __('Name'); ?></dt>
  <dd>
	<?php echo h($entity['EntityWfc']['name']); ?>
	&nbsp;
  </dd>
</dl>

<?php $this->start('acode'); ?>
<p>
<h1>== acodes ==</h1>
</p>
<?php $this->end(); ?>

<!-- here goes other wfc specific stuff -->
