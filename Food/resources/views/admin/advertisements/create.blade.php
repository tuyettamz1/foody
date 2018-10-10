@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="/backend/css/select/select2.min.css">
<script src="/backend/js/select/select2.full.js"></script>
<div class="col-md-6 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>
				<i class="fa fa-plus"></i> Thêm mới Quảng cáo			
			</h2>
			<ul class="nav navbar-right panel_toolbox">
				<li>
					<a class="collapse-link">
						<i class="fa fa-chevron-up">
						</i>
					</a>
				</li>				
			</ul>
			<div class="clearfix">
			</div>
		</div>
		<div class="x_content">
			<form class="form-horizontal form-label-left" action="{{route('advertisements.create')}}" method="post">
				@csrf				
				@if ($errors->any())
				<div class="alert alert-dismissible alert-danger">
					<button class="close" type="button" data-dismiss="alert">×</button>
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				@if(session('success'))
				<div class="bs-component">
					<div class="alert alert-dismissible alert-success">
						<button class="close" type="button" data-dismiss="alert">×</button>
						<strong>{{session('success')}}</strong>
					</div>
				</div>

				@endif
				
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Chọn địa điểm</label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<select class="select2_single form-control" tabindex="-1" name="place_id">
							<option value="AK">Alaska</option>
							<option value="HI">Hawaii</option>
							<option value="CA">California</option>				
						</select>
					</div>
				</div>
				<div class="ln_solid"></div>
				<div class="form-group">
					<div class="col-md-6">
						<button type="submit" id="submit" class="btn btn-danger"><i class="fa fa-plus"></i> Thêm mới</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		$(".select2_single").select2({
			placeholder: "Select a state",
			allowClear: true
		});

	});
</script>
@endsection
