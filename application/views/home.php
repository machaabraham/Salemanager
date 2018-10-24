<?php $this->load->view("partial/header"); ?>
<div class="panel panel-info">
	<div class="panel-heading">
	<h5><?php echo $this->lang->line('common_welcome_message'); ?></h5>
	</div>
	<div class="panel-body">
		<div class="row">
			
	<?php
	foreach($allowed_modules->result() as $module)
	{
	?>
	<div class="col-lg-5 col-md-5 col-sm-6" style="margin:1%;">
		<div class="panel panel-primary">
			
			<div class="panel-body">
				<a href="<?php echo site_url("$module->module_id");?>">
		<img src="<?php echo base_url().'images/menubar/'.$module->module_id.'.png';?>" border="0" alt="Menubar Image" /></a><br />
		<a href="<?php echo site_url("$module->module_id");?>"><?php echo $this->lang->line("module_".$module->module_id) ?></a>
		 - <?php echo $this->lang->line('module_'.$module->module_id.'_desc');?>
			</div>
		</div>
	</div>
	<?php
	}
	?>
	</div>
</div>
</div>
<?php $this->load->view("partial/footer"); ?>