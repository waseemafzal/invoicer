<?php



session_start();
if(!isset($_SESSION['login'])){
    header("Location:login.php");
}

// (A) LOAD INVOICR
require "invlib/invoicr.php";
include_once 'config.php';
pre($_POST);
$companydata = 'select * from company';
$query = mysqli_query($conn, $companydata);
$data = mysqli_fetch_assoc($query);
// (B) SET INVOICE DATA
// (B1) COMPANY INFORMATION
//RECOMMENDED TO JUST PERMANENTLY CODE INTO INVLIB/INVOICR.PHP > (C1)
$invoicr->set("company", [
	"<img src =" .$data['image'].">",
	"Name:".$data['name'],
	"Address:".$data['address'],
   "Phone:".$data['phone'],
	"Email:".$data['email']
]); 

// (B2) INVOICE HEADER

// (B3) BILL TO
include_once 'config.php';
$bill = "select * from businesses where id = '".$_POST['business_id']."'";
$query = mysqli_query($conn, $bill);
$result = mysqli_fetch_assoc($query);
$invoicr->set("billto", [
	$result['name'],
	$result['email'],
	$result['phone'],
	$result['address'],
	$result['city'],
]);
$myitems=array();
$count = count($_POST['invoice']['item']);
$invoiceItems=$_POST['invoice'];
 for($i=0;$i<$count;$i++){
	 foreach($invoiceItems as $item){
		$ths[]=  $item[$i];
		 }
		$myitems[]= $ths;
 }
// pre($myitems);
$items = $myitems;
//echo '<pre>';
//print_r($_POST);exit;
 foreach ($items as $i) { $invoicr->add("items", $i); }

// (B6) ITEMS - OR SET ALL AT ONCE
$invoicr->set("items", $items);

// (B7) TOTALS
$invoicr->set("totals", [
	["TAX %", $_POST['tax']],
	["DISCOUNT", $_POST['discount']],
	["GRAND TOTAL", $_POST['total']]
]);

// (B8) NOTES, IF ANY
$invoicr->set("notes", [
	$_POST['notes']
]);

// (C) OUTPUT
// (C1) CHOOSE A TEMPLATE
// $invoicr->template("apple");
// $invoicr->template("banana");
 $invoicr->template("blueberry");
// $invoicr->template("lime");
// $invoicr->template("simple");
// $invoicr->template("strawberry");

// (C2) OUTPUT IN HTML
// DEFAULT : DISPLAY IN BROWSER
// 1 : DISPLAY IN BROWSER
// 2 : FORCE DOWNLOAD
// 3 : SAVE ON SERVER
$invoicr->outputHTML();
// $invoicr->outputHTML(1);
// $invoicr->outputHTML(2, "invoice.html");
// $invoicr->outputHTML(3, __DIR__ . DIRECTORY_SEPARATOR . "invoice.html");

// (C3) OUTPUT IN PDF
// DEFAULT : DISPLAY IN BROWSER
// 1 : DISPLAY IN BROWSER
// 2 : FORCE DOWNLOAD
// 3 : SAVE ON SERVER
 //$invoicr->outputPDF();
 //$invoicr->outputPDF(1);
 //$invoicr->outputPDF(2, "invoice.pdf");
//$invoicr->outputPDF(3, __DIR__ . DIRECTORY_SEPARATOR . "invoice.pdf");

// (C4) OUTPUT IN DOCX
// DEFAULT : FORCE DOWNLOAD
// 1 : FORCE DOWNLOAD
// 2 : SAVE ON SERVER
// $invoicr->outputDOCX();
// $invoicr->outputDOCX(1, "invoice.docx");
// $invoicr->outputDOCX(2, __DIR__ . DIRECTORY_SEPARATOR . "invoice.docx");

// (D) USE RESET() IF YOU WANT TO CREATE ANOTHER ONE AFFTER THIS
// $invoicr->reset();
?>