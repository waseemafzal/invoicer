<?php 

    if (isset($_POST['headers']) and $_POST['headers']!='') {
		$headers = explode(',',$_POST['headers']);
		$tableHeading='';
		$tableRowInputs='';
		$i=0;
		foreach($headers as $key=>$val){
			$fieldName=str_replace(' ','_',$val);
			$tableHeading.='<th>'.$val.'</th>';
			$tableRowInputs.='<td><input type="text" class="form-control" name="invoice['.$fieldName.'][]" /></td>';
			$i++;
			}
			$response['status']=200;
			$response['headers']=$tableHeading;
			$response['tableRowInputs']=$tableRowInputs;
			$response['colspan']=$i;
			header( 'Content-type: application/json' );
			echo json_encode($response);
	}
?>