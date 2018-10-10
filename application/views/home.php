<?php $this->load->view("partial/header"); ?>
<br />
<h3><?php echo $this->lang->line('common_welcome_message'); ?></h3>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Panel title</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			
	<?php
	foreach($allowed_modules->result() as $module)
	{
	?>
	<div class="col-lg-6 col-md-6 col-sm-6">
		<a href="<?php echo site_url("$module->module_id");?>">
		<img src="<?php echo base_url().'images/menubar/'.$module->module_id.'.png';?>" border="0" alt="Menubar Image" /></a><br />
		<a href="<?php echo site_url("$module->module_id");?>"><?php echo $this->lang->line("module_".$module->module_id) ?></a>
		 - <?php echo $this->lang->line('module_'.$module->module_id.'_desc');?>
	</div>
	<?php
	}
	?>
	</div>
</div>
</div>
<?php $this->load->view("partial/footer"); ?>