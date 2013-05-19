<?php $this->extend('view'); ?>
<?php $this->assign('type',   'EntityMtyp'); ?>

</p>

<dl>
  <dt><?php echo __('Group'); ?></dt>
  <dd>
	<?php echo h($entity['EntityMtyp']['grp']); ?>
	&nbsp;
  </dd>
</dl>

<!-- <?php $this->start('acode'); ?> -->
<!-- <p> -->
<!-- <h1>== acodes ==</h1> -->
<!-- </p> -->
<!-- <?php $this->end(); ?> -->

<!-- here goes other wfc specific stuff -->
