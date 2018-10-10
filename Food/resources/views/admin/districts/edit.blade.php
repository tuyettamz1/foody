@extends('layouts.admin')
@section('content')
<div class="col-md-6 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>
				<i class="fa fa-edit"></i> Sửa Khu vực <b class="font-italic">{{$district->name}}</b>				
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
			<form class="form-horizontal form-label-left" action="{{ route('districts.edit',$district->id)}}" method="post">
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
				
				<div class="item form-group">					
					<div class="col-md-12 col-sm-12 col-xs-12">
						<input value="{{$district->name}}" name="name" class="form-control col-md-12 col-xs-12" id="name" >
					</div>
				</div>
				<div class="ln_solid"></div>
				<div class="form-group">
					<div class="col-md-6">
						<button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-save"></i> Cập nhật</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
