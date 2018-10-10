<?php $this->load->view("partial/header"); ?>
<div id="page_title" style="margin-bottom:8px;"><?php echo $title ?></div>
<div id="page_subtitle" style="margin-bottom:8px;"><?php echo $subtitle ?></div>
<div class="panel panel-default">
	<div class="panel-heading">
	</div>
	<div class="panel-body">
			<div id="table_holder">
	<table class="tablesorter report table table-bordered table-striped" id="sortable_table">
		<thead>
			<tr>
				<?php foreach ($headers as $header) { ?>
				<th><?php echo $header; ?></th>
				<?php } ?>
				<th><button type="button" class="btn btn-success btn-block" onclick="return printData()">Print
				</button></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $row) { ?>
			<tr>
				<?php foreach ($row as $cell) { ?>
				<td><?php echo $cell; ?></td>
				<?php } ?>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
	</div>
</div>
<div id="report_summary">
<?php foreach($summary_data as $name=>$value) { ?>
	<div class="summary_row"><?php echo $this->lang->line('reports_'.$name). ': '.to_currency($value); ?></div>
<?php }?>
</div>
<?php $this->load->view("partial/footer"); ?>

<script type="text/javascript" language="javascript">

function init_table_sorting()
{
	//Only init if there is more than one row
	if($('.tablesorter tbody tr').length >1)
	{
		$("#sortable_table").tablesorter(); 
	}
}
$(document).ready(function()
{
	init_table_sorting();
});
function printData()
{
   var divToPrint=document.getElementById("table_holder");
   newWin= window.open("");
   newWin.document.write(divToPrint.innerHTML);
   newWin.print();
   newWin.close();
}

$('#printView').on('click',function(){
printData();
});
</script>
