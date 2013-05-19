<?php $this->extend('view'); ?>
<?php $this->assign('type', 'EntityCtx'); ?>

</p>

<dl>
  <dt><?php echo __('Parent Id'); ?></dt>
  <dd>
	<?php echo h($entity['EntityCtx']['parent_id']); ?>
	&nbsp;
  </dd>
  <dt><?php echo __('Is Parent'); ?></dt>
  <dd>
	<?php echo h($entity['EntityCtx']['is_parent']); ?>
	&nbsp;
  </dd>
  <dt><?php echo __('Group Id'); ?></dt>
  <dd>
	<?php echo h($entity['EntityCtx']['group_id']); ?>
	&nbsp;
  </dd>
  <dt><?php echo __('Global order by'); ?></dt>
  <dd>
	<?php echo h($entity['EntityCtx']['global_order_by']); ?>
	&nbsp;
  </dd>
</dl>

<!-- <?php $this->start('acode'); ?> -->
<!-- <p> -->
<!-- <h1>== acodes ==</h1> -->
<!-- </p> -->
<!-- <?php $this->end(); ?> -->

<!-- here goes other wfc specific stuff -->
