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
		<h3>Dear {{$name}},</h3>
		<p>{{$content1}}</p>

		<p>{{$content2}}</p>

		<table id="example4" class="table table-striped table-bordered" style="width: 100%;">
			<tr>
				<th>Provider:</th>
				<td>{{$provider}}</td>
			</tr>
			<tr>
				<th>Electricity Plan Name:</th>
				<td>{{$electricty_plan_name}}</td>
			</tr>
			<tr>
				<th>Electricity Plan Tariff Details:</th>
				<td><a href="{{$elecrticty_plan_tariff_details}}">Electricity Plan Details</a></td>
			</tr>
			<tr>
				<th>Gas Plan Name:</th>
				<td>{{$gas_plan_name}}</td>
			</tr>
			<tr>
				<th>Gas Plan Tariff Details:</th>
				<td>{{$gas_plan_tariff_details}}</td>
			</tr>
			<tr>
				<th>Providers Terms and Conditions:</th>
				<td><a href="{{$providers_terms_and_conditon}}">Terms and Conditions</a></td>
			</tr>
		</table>
		<hr>
		<p>Click <a href="{{url('/')}}">HERE</a> to start saving on energy!</p>

		<div class="row">Best Regards</div><br>
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