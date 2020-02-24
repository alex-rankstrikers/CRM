<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Invoice</title>
<style>
body{ margin:0 auto; padding:0;font-family:Arial, Helvetica, sans-serif; font-size:14px;}
table {
    border-collapse: separate;
    border-spacing: 1px;
}
</style>
</head>
<body>


<table width="700px" border="0" cellspacing="0" cellpadding="0"  >
  <tr>
    <td width="50%" bgcolor="#fff"><img src="http://searchvenue.co.uk/assets/images/logo.png" height="40" width="230" /></td>
    <td width="50%" style="text-align:right;"> <p style="color:#6a6868; line-height:20px; padding:0; margin:0; ">25 | Brock Road | London | E13 8NA</p>
             <p style="color:#6a6868; line-height:20px; padding:0; margin:0;">accounts@searchvenue.co.uk</p>
             <p style="color:#6a6868; line-height:20px; padding:0; margin:0;">020 3582 5080</p></td>
  </tr>
</table>
<table width="700px" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="10px" ></td>
  </tr>
</table>
<table width="700px" border="0" cellspacing="0" cellpadding="0" bgcolor="#666666">
  <tr>
    <td height="1px" ></td>
  </tr>
</table>
<table width="700px" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="10px" ></td>
  </tr>
</table>

<table width="700px" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="color:#6a6868;font-size:14px; line-height:14px; " width="25%" >Invoice Date
    
    </td> <td style="color:#6a6868;font-size:14px;line-height:25px;">

    <?php 
	
	$date = new DateTime($order->created_at);

echo $date->format('d-M-Y');
	
	//echo date_format($py->created, 'd-m-Y');//echo $py->created;//echo $Today=date('d-m-Y');?>
    </td>
  </tr>
   <tr>
    <td style="color:#6a6868;font-size:14px;line-height:25px;" width="25%">Invoice Number</td> <td style="color:#6a6868;font-size:16px;line-height:25px;">
    <?php //$Today=date('dmY');  echo $order->created_at;// echo $in='B2B-CM-'.$py->id;?>
	<?php echo $in='PVG-SV-'.$order->p_id;?><!--PVINV-->
	</td>
  </tr>
</table>
<table width="700px" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="10px" ></td>
  </tr>
</table>

  <table width="700px" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    <table width="350px" border="0" cellspacing="" cellpadding="0" style="1px solid#000; border-radius:10px;" >
  <tr>
    <td align="center" >

    <table width="500px" border="0" cellspacing="0" cellpadding="5" bgcolor="#fff">
  <tr>
    <td style="color:#6a6868; line-height:30px;font-size:14px ">&nbsp;Invoice To,</td>
  </tr>
  <tr>
    <td style="color:#6a6868; line-height:25px;font-size:14px ">
		{{$venue_contact->title}},
		{{$venue_contact->address1}},
		@if($venue_contact->address2){{$venue_contact->address2}}, @endif
		{{$cities}},
		{{$states}},<br />
		{{$countries}}.<br />
		{{$venue_contact->postcode}}<br />

		Phone:{{$venue_contact->contact_no}}
</td>
  </tr>
</table>
</td>
  </tr>
</table>
    </td>
  </tr>
  
</table>


<table width="700px" border="0" cellspacing="0" cellpadding="0" style=" margin-top:20px;">
  <tr>
    <td width="35%" style="padding:10px;"><p style="color:#6a6868;  line-height:20px; padding:0; margin:0;font-size:14px ">Description</p></td>
    <td width="20%" style="padding:10px;"><p style="color:#6a6868; line-height:20px; padding:0; margin:0;font-size:14px ">&nbsp;</p></td>
    <td width="20%" style="padding:10px;"><p style="color:#6a6868; line-height:20px; padding:0; margin:0;font-size:14px ">Unit Price </p></td>
     <td width="10%" style="padding:10px;"><p style="color:#6a6868; line-height:20px; padding:0; margin:0;font-size:14px ">VAT </p></td>
    <td width="15%" style="padding:10px;" ><p style="color:#6a6868; line-height:20px; padding:0; margin:0;font-size:14px ">Amount GBP</p></td>
  </tr>
</table>
	<table width="700px" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px; margin-bottom:5px;  "><tr><td width="100%" height="1px" style="background:#5b5c5c;"></td></tr></table>
<table width="700px" border="0" cellspacing="0" cellpadding="0" style="border:1px solid#ccc;  background:#fff; height:160px">
  <tr valign="top">
    <td width="35%" style="border-right:1px solid#ccc;padding:10px;font-size:14px;color:#6a6868;">GO UNLIMITED</td>
    <td width="20%" style="border-right:1px solid#ccc;padding:10px;font-size:14px;color:#6a6868;">&nbsp;</td>
      <td width="20%" style="border-right:1px solid#ccc;padding:10px;font-size:14px;color:#6a6868;">£ <?php echo substr($order->amount, 0, -2);?></td>
      
     <td width="10%" style="border-right:1px solid#ccc;padding:10px;font-size:14px;color:#6a6868;">Zero Rated</td>
    <td width="15%" style="padding:10px;font-size:14px;color:#6a6868;">£ <?php echo substr($order->amount, 0, -2);?>.00</td>
  </tr>
  
</table>

	<table width="700px" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px; margin-bottom:5px;  "><tr><td width="100%" height="1px" style="background:#5b5c5c;"></td></tr></table>

<table width="700px" border="0" cellspacing="0" cellpadding="0" style=" margin-top:20px">
  <tr valign="top">
    <td width="65%" style="padding:10px;">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid#ccc;border-radius:5px;  background:#fff; height:50px">
  <tr>
    <td valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:10px;">
  <tr valign="top">
    <td valign="top"><p style="color:#6a6a6a;line-height:35px; padding:0; margin:0;font-size:14px "><i>Notes:</i></p></td>
  </tr>
  <tr>
    <td><p style="line-height:20px; padding:0; margin:0;font-size:14px;color:#6a6868; ">This invoice has already been paid.</p></td>
  </tr>
</table>

    
    </td>
  </tr>
</table>

    </td>
    <td width="35%" style=" padding-top:10px">
    <table width="100%" border="0" cellspacing="0" cellpadding="0"  style="padding:10px;">
  <tr>
    <td style=" color:#6a6868;font-size:14px;">Amount Due</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0"  style="border:1px solid#ccc;">
  <tr>
    <td  style="width:50%; padding:5px;color:#6a6868;font-size:14px;">Sub Total</td> <td style=" width:50%; padding:5px;color:#6a6868;">£ <?php echo substr($order->amount, 0, -2);?>.00</td>
  </tr>
   <tr>
    <td style="width:50%;padding:5px;color:#6a6868;font-size:14px;">VAT</td> <td style="color:#6a6868; font-size:14px;width:50%; padding:5px">£ 0.00</td>
  </tr>
   <tr>
    <td style="color:#6a6868;width:50%;padding:5px;font-size:14px;">Total</td> <td style="color:#6a6868; width:50%; padding:5px">£ <?php echo substr($order->amount, 0, -2);?>.00</td>
  </tr>
</table>
    
    </td>   
  </tr>
  
</table>
<table width="700px" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="35px" ></td>
  </tr>
</table>

<table width="700px" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="150px" ></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="100">
  <tr>
    <td align="center"><p style="color:#6a6a6a;line-height:20px; padding:0; margin:0; font-size:12px">Paravigs Ltd. is registered in England and Wales with Company No. 9097923</p></td>
  </tr>
</table>

</body>
</html>

