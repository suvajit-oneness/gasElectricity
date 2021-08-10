<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Plan Details</title>
	<link rel="stylesheet" type="text/css" href="{{asset('design/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('design/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
</head>
<body>
	<div class="container">
	    <h2 style="margin:20px 0 30px;"><img src="{{asset('forntEnd/images/logo.png')}}" width="110px"></h2>
		<h3>Dear {{$name}},</h3>
		<p style="line-height:24px;">{{$content1}}</p>

		<p style="line-height:24px;">{{$content2}}</p>

		<table id="example4" class="table table-striped table-bordered" style="width: 54%; margin-bottom:15px;">
			<tr>
				<th style="text-align:left; padding:5px; font-size:13px;">Provider:</th>
				<td style="text-align:left; padding:5px; font-size:13px;">{{$provider}}</td>
			</tr>
			<tr>
				<th style="text-align:left; padding:5px; font-size:13px;">Electricity Plan Name:</th>
				<td style="text-align:left; padding:5px; font-size:13px;">{{$electricty_plan_name}}</td>
			</tr>
			<tr>
				<th style="text-align:left; padding:5px; font-size:13px;">Electricity Plan Tariff Details:</th>
				<td style="text-align:left; padding:5px; font-size:13px;"><a href="{{$elecrticty_plan_tariff_details}}">Electricity Plan Details</a></td>
			</tr>
			<tr>
				<th style="text-align:left; padding:5px; font-size:13px;">Gas Plan Name:</th>
				<td style="text-align:left; padding:5px; font-size:13px;">{{$gas_plan_name}}</td>
			</tr>
			<tr>
				<th style="text-align:left; padding:5px; font-size:13px;">Gas Plan Tariff Details:</th>
				<td style="text-align:left; padding:5px; font-size:13px;">{{$gas_plan_tariff_details}}</td>
			</tr>
			<tr>
				<th style="text-align:left; padding:5px; font-size:13px;">Providers Terms and Conditions:</th>
				<td style="text-align:left; padding:5px; font-size:13px;"><a href="{{$providers_terms_and_conditon}}">Terms and Conditions</a></td>
			</tr>
		</table>
		
		<p>Click <a href="{{url('/')}}">HERE</a> to start saving on energy!</p>

		<div class="row" style="margin-top:35px;">Best Regards</div><br>
		<div class="row">Switchr!</div>
	</div>
	<script type="text/javascript" src="{{asset('design/js/jquery-3.5.1.js')}}"></script>
	<script type="text/javascript" src="{{asset('design/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
	
	<script type="text/javascript">
		$('#example4').DataTable({
            ordering: false
        });
	</script>
</body>
</html>