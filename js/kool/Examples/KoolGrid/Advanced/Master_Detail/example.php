<?php
	require $KoolControlsFolder."/KoolAjax/koolajax.php";
	$koolajax->scriptFolder = $KoolControlsFolder."/KoolAjax";

	require $KoolControlsFolder."/KoolGrid/koolgrid.php";
	$ds_customer = new MySQLDataSource($db_con);//This $db_con link has been created inside KoolPHPSuite/Resources/runexample.php
	$ds_customer->SelectCommand = "select customerNumber,customerName,phone,city from customers";


	$grid_customer = new KoolGrid("grid_customer");
	$grid_customer->scriptFolder = $KoolControlsFolder."/KoolGrid";
	$grid_customer->styleFolder="default";
	$grid_customer->Width = "655px";
	$grid_customer->RowAlternative = true;
	$grid_customer->AjaxEnabled = true;
	$grid_customer->AllowSelecting = true;


	$grid_customer->AjaxLoadingImage =  $KoolControlsFolder."/KoolAjax/loading/5.gif";
	
	$grid_customer->MasterTable->DataSource = $ds_customer;
	$grid_customer->MasterTable->AutoGenerateColumns = true;

	$grid_customer->MasterTable->Pager = new GridPrevNextAndNumericPager();

	$grid_customer->ClientSettings->ClientEvents["OnRowSelect"] = "Handle_OnRowSelect";


	$grid_customer->Process();


	$ds_order = new MySQLDataSource($db_con);//This $db_con link has been created inside KoolPHPSuite/Resources/runexample.php

	if(isset($_POST["customer_selected"]))
	{
		$ds_order->SelectCommand = "select orderNumber,orderDate,status,customerNumber from orders where customerNumber=".$_POST["customerNumber"];		
		$_SESSION["customerNumber"] = $_POST["customerNumber"];
	}
	else
	{
		if(!$koolajax->isCallback)
		{
			$_rows = $grid_customer->GetInstanceMasterTable()->GetInstanceRows();
			$_rows[0]->Selected = true;			
			$ds_order->SelectCommand = "select orderNumber,orderDate,status,customerNumber from orders where customerNumber=".$_rows[0]->DataItem["customerNumber"];		
		}
		else
		{
			$ds_order->SelectCommand = "select orderNumber,orderDate,status,customerNumber from orders where customerNumber=".$_SESSION["customerNumber"];					
		}
	}


	$grid_order = new KoolGrid("grid_order");
	$grid_order->scriptFolder = $KoolControlsFolder."/KoolGrid";
	$grid_order->styleFolder="default";
	$grid_order->Width = "655px";
	$grid_order->RowAlternative = true;
	$grid_order->AjaxEnabled = true;
	$grid_order->AjaxLoadingImage =  $KoolControlsFolder."/KoolAjax/loading/5.gif";
	
	$grid_order->MasterTable->DataSource = $ds_order;
	$grid_order->MasterTable->AutoGenerateColumns = true;

	$grid_order->MasterTable->Pager = new GridPrevNextAndNumericPager();
	$grid_order->Process();
?>

<form id="form1" method="post">
	<?php echo $koolajax->Render();?>

	<script type="text/javascript">
		function Handle_OnRowSelect(sender,args)
		{
			//Prepare to refresh the grid_order.
			var _row = args["Row"];
			grid_order.attachData("customer_selected",1);
			grid_order.attachData("customerNumber",_row.getDataItem()["customerNumber"]);
			grid_order.refresh();
			grid_order.commit();
		}
	</script>

	<div style="margin-top:10px;font-weight:bold;">Customers:</div>
	<?php echo $grid_customer->Render();?>
	<div style="margin-top:10px;font-weight:bold;">Orders:</div>
	<?php echo $grid_order->Render();?>
	
</form>
