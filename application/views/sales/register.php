<?php $this->load->view("partial/header"); ?>
<div id="page_title" style="margin-bottom:8px;"><?php echo $this->lang->line('sales_register'); ?></div>
<?php
if(isset($error))
{
	echo "<div class='error_message'>".$error."</div>";
}
?>
<div id="register_wrapper">
<?php echo form_open("sales/change_mode",array('id'=>'mode_form')); ?>
	<div class="form-group">
	<span><?php echo $this->lang->line('sales_mode') ?></span>
	<?php echo form_dropdown('mode',$modes,$mode,'onchange="$(\'#mode_form\').submit();"'); ?>
	</div>
</form>
<?php echo form_open("sales/add",array('id'=>'add_item_form')); ?>
<table class="table table-striped table-hover">
	<tbody>
		<tr>
			<td>
			  <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
      <input id="item" type="text" class="form-control" name="item">
   </div>			
</td><td></td><td></td>
<td><div id="new_item_button_register">
		<?php echo anchor("items/view/-1/width:360",
		"<button class='btn btn-success btn-sm'><span>".$this->lang->line('sales_new_item')."</span></button>",
		array('class'=>'thickbox none','title'=>$this->lang->line('sales_new_item')));
		?>
	</div>
</td>
		</tr>
	</tbody>
</table>

</form>
<table id="register" class="table table-striped table-bordered">
<thead>
<tr>
<th><i class="fa fa-remove"></i></th>
<th><?php echo $this->lang->line('sales_item_name'); ?></th>
<th><?php echo $this->lang->line('sales_price'); ?></th>
<th><?php echo $this->lang->line('item_stock'); ?></th>
<th><?php echo $this->lang->line('sales_quantity'); ?></th>
<th><?php echo $this->lang->line('sales_discount'); ?></th>
<th><?php echo $this->lang->line('sales_total'); ?></th>
<th>...</th>
</tr>
</thead>
<tbody id="cart_contents">
<?php
if(count($cart)==0)
{
?>
<tr><td colspan='7'>
<div class='warning_message' style='padding:7px;'><?php echo $this->lang->line('sales_no_items_in_cart'); ?></div>
</tr></tr>
<?php
}
else
{
	foreach($cart as $item_id=>$item){
		echo form_open("sales/edit_item/$item_id",array('class'=>'form form-inline'));
	?>
		<tr><td><?php echo anchor("sales/delete_item/$item_id",'<i class="fa fa-remove" style="color:red"></i>');?></td>
		<td><?php echo $item['name']; ?></td>

		<?php if ($items_module_allowed)
		{
		?>
			<td>
			<div class="form-group">
			<?php echo form_input(array('name'=>'price','value'=>$item['price'],'size'=>'6','class'=>'form-control input-sm'));?>
			</td>
		<?php
		}
		else
		{
		?>
			<td><?php echo $item['price']; ?></td>
			<?php echo form_hidden('price',$item['price']); ?>
		<?php
		}
		?>
		<td><div class="form-group">
			<?php echo form_input(array('id'=>'stock','name'=>'stock','value'=>$item['stock'],'size'=>'6','readonly'=>'readonly','class'=>'form-control input-sm'));?>
			</div>
			</td>
		<td><div class="form-group">
		<?php echo form_input(array('id'=>'qty','name'=>'quantity','value'=>$item['quantity'],'size'=>'6','class'=>'form-control input-sm','onkeyup'=>'return validateStock()'));?>
		</div>
		</td>
		<td><div class="form-group"><?php echo form_input(array('name'=>'discount','value'=>$item['discount'],'size'=>'3','readonly'=>'readonly','class'=>'form-control input-sm'));?></div>
		</td>
		<td><input class="form-control input-sm" readonly="readonly" value="<?php echo to_currency($item['price']*$item['quantity']-$item['price']*$item['quantity']*$item['discount']/100); ?>"></td>
		<td><button type="submit" name="edit_item" class="btn btn-warning btn-sm">Edit</button></td>
		</tr>
		</form>
	<?php
	}
}
?>
</tbody>
</table>
</div>
<div id="overall_sale">
	<?php
	if(isset($customer))
	{
		echo $this->lang->line("sales_customer").': <b>'.$customer. '</b><br />';
		echo anchor("sales/delete_customer",'['.$this->lang->line('common_delete').' '.$this->lang->line('customers_customer').']');
	}
	else
	{
		echo form_open("sales/select_customer",array('id'=>'select_customer_form')); ?>
		<label id="customer_label" for="customer"><?php echo $this->lang->line('sales_select_customer'); ?></label>
		<?php echo form_input(array('name'=>'customer','id'=>'customer','size'=>'30','value'=>$this->lang->line('sales_start_typing_customer_name'),'class'=>'form-control'));?>
		</form>
		<div style="margin-top:5px;text-align:center;">
		<h3 style="margin: 5px 0 5px 0"><?php echo $this->lang->line('common_or'); ?></h3>
		<?php echo anchor("customers/view/-1/width:350",
		"<button class='btn btn-warning btn-sm' style='margin:0 auto;'><span>".$this->lang->line('sales_new_customer')."</span></button>",
		array('class'=>'thickbox none','title'=>$this->lang->line('sales_new_customer')));
		?>
		</div>
		<div class="clearfix">&nbsp;</div>
		<?php
	}
	?>

	<div id='sale_details'>
		<div class="float_left" style="width:55%;"><?php echo $this->lang->line('sales_sub_total'); ?>:</div>
		<div class="float_left" style="width:45%;font-weight:bold;"><?php echo to_currency($subtotal); ?></div>

		<?php foreach($taxes as $name=>$value) { ?>
		<div class="float_left" style='width:55%;'><?php echo $name; ?>:</div>
		<div class="float_left" style="width:45%;font-weight:bold;"><?php echo to_currency($value); ?></div>
		<?php }; ?>

		<div class="float_left" style='width:55%;'><?php echo $this->lang->line('sales_total'); ?>:</div>
		<div class="float_left" style="width:45%;font-weight:bold;"><?php echo to_currency($total); ?></div>
	</div>
	<?php
	if(count($cart) > 0)
	{
	?>
	<div id="finish_sale">
		<?php echo form_open("sales/complete",array('id'=>'finish_sale_form')); ?>
		<br>
		<label id="comment_label" for="comment"><?php echo $this->lang->line('common_comments'); ?>:</label>
		<?php echo form_textarea(array('name'=>'comment','value'=>'','rows'=>'4','cols'=>'23'));?>
		<br><br>
		<table width="100%"><tr><td>
		<?php
			echo $this->lang->line('sales_payment').':   ';?>
		</td><td>
		<?php
		    echo form_dropdown('payment_type',$payment_options);?>
        </td>
        </tr>
        
        <!-- <tr>
        <td>
        <?php
			//echo $this->lang->line('sales_amount_tendered').':   ';?>
		</td><td>
		<?php
		    //echo form_input(array('name'=>'amount_tendered','value'=>'','size'=>'10'));
		?>
        </td>
        </tr> -->
        
        </table>
        <br>
		<?php echo "<button class='btn btn-success btn-sm' id='finish_sale_button' style='float:right;margin-top:5px;'><span>".$this->lang->line('sales_complete_sale')."</span></button>";
		?>
		</div>

		</form>

	    <?php echo form_open("sales/cancel_sale",array('id'=>'cancel_sale_form')); ?>
			    <button class='btn btn-danger btn-sm' id='cancel_sale_button' style='float:left;margin-top:5px;'>
					<span>Cancel Sale</span>
				</button>
        </form>
	</div>
	<?php
	}
	?>
</div>
<div class="clearfix" style="margin-bottom:30px;">&nbsp;</div>


<?php $this->load->view("partial/footer"); ?>

<script type="text/javascript" language="javascript">
$(document).ready(function()
{
    $("#item").autocomplete('<?php echo site_url("sales/item_search"); ?>',
    {
    	minChars:0,
    	max:100,
       	delay:10,
       	selectFirst: false,
    	formatItem: function(row) {
			return row[1];
		}
    });

    $("#item").result(function(event, data, formatted)
    {
		$("#add_item_form").submit();
    });

	$('#item').focus();

	$('#item').blur(function()
    {
    	$(this).attr('value',"<?php echo $this->lang->line('sales_start_typing_item_name'); ?>");
    });

	$('#item,#customer').click(function()
    {
    	$(this).attr('value','');
    });

    $("#customer").autocomplete('<?php echo site_url("sales/customer_search"); ?>',
    {
    	minChars:0,
    	delay:10,
    	max:100,
    	formatItem: function(row) {
			return row[1];
		}
    });

    $("#customer").result(function(event, data, formatted)
    {
		$("#select_customer_form").submit();
    });

    $('#customer').blur(function()
    {
    	$(this).attr('value',"<?php echo $this->lang->line('sales_start_typing_customer_name'); ?>");
    });

    $("#finish_sale_button").click(function()
    {
    	if (confirm('<?php echo $this->lang->line("sales_confirm_finish_sale"); ?>'))
    	{
    		$('#finish_sale_form').submit();
    	}
    });

    $("#cancel_sale_button").click(function()
    {
    	if (confirm('<?php echo $this->lang->line("sales_confirm_cancel_sale"); ?>'))
    	{
    		$('#cancel_sale_form').submit();
    	}
    });


});

function post_item_form_submit(response)
{
	if(response.success)
	{
		$("#item").attr("value",response.item_id);
		$("#add_item_form").submit();
	}
}

function post_person_form_submit(response)
{
	if(response.success)
	{
		$("#customer").attr("value",response.person_id);
		$("#select_customer_form").submit();
	}
}

function validateStock(){
	var available_stock=$("#stock").val();
	var quantity_sold=$("#qty").val();
if ((available_stock-quantity_sold)<0) {
		alert("Stock Not Enough");
		document.getElementById("qty").value=available_stock;
	}	
}
</script>
