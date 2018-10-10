<?php $this->load->view("partial/header"); ?>
<div class="panel panel-success">
	<div class="panel-heading">	
	<h3 style="text-align: center;">REPORTS CONSOLE</h3>
	</div>
	<div class="panel-body">
    <!-- Drob down menu for listing report options -->
    <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
            	<!-- Default panel contents -->
            	<div class="panel-heading">Summary Reports</div>
            
            	<!-- Table -->
            	<table class="table">
            		<tbody>
            			<tr>
            				<td><a href="<?php echo site_url('reports/summary_sales');?>"><?php echo $this->lang->line('reports_sales'); ?></a></td>
            			</tr>
            			<tr>
            				<td><a href="<?php echo site_url('reports/summary_categories');?>"><?php echo $this->lang->line('reports_categories'); ?></a></td>
            			</tr>
            			<tr>
            				<td><a href="<?php echo site_url('reports/summary_customers');?>"><?php echo $this->lang->line('reports_customers'); ?></a></td>
            			</tr>
            			<tr><td>
            				<a href="<?php echo site_url('reports/summary_suppliers');?>"><?php echo $this->lang->line('reports_suppliers'); ?></a>
            			</td></tr>
            			<tr><td>
            				<a href="<?php echo site_url('reports/summary_items');?>"><?php echo $this->lang->line('reports_items'); ?></a>
            			</td></tr>
            			<tr><td>
            				<a href="<?php echo site_url('reports/summary_employees');?>"><?php echo $this->lang->line('reports_employees'); ?></a>
            			</td></tr>
            		</tbody>
            	</table>
            </div>
        	</div>

        	 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-success">
            	<!-- Default panel contents -->
            	<div class="panel-heading">Detailed Reports</div>
            	<!-- Table -->
            	<table class="table">
            		<tbody>
            			<tr>
            				<td>
            					<a href="<?php echo site_url('reports/detailed_sales');?>"><?php echo $this->lang->line('reports_sales'); ?></a>
            				</td>
            			</tr>
            			<tr>
            				<td>
            					<a href="<?php echo site_url('reports/specific_customer');?>"><?php echo $this->lang->line('reports_customer'); ?></a>
            				</td>
            			</tr>
            			<tr>
            				<td>
            					<a href="<?php echo site_url('reports/specific_employee');?>"><?php echo $this->lang->line('reports_employee'); ?></a>
            				</td>
            			</tr>
            		</tbody>
            	</table>
            </div>
        	</div>
        </div>
        <?php
if(isset($error))
{
	echo "<div class='error_message'>".$error."</div>";
}
?>     

<?php $this->load->view("partial/footer"); ?>

<script type="text/javascript" language="javascript">
$(document).ready(function()
{
});
</script>
