@extends('layouts.admin')
@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>
				<i class="fa fa-th-list"></i> Danh sách Category				
			</h2>
			<ul class="nav navbar-right panel_toolbox">
				<a href="{{route('categories.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>			
			</ul>
			<div class="clearfix">
			</div>
		</div>
		@if(session('success'))
		<div class="bs-component">
			<div class="alert alert-dismissible alert-success">
				<button class="close" type="button" data-dismiss="alert">×</button>
				<strong>{{session('success')}}</strong>
			</div>
		</div>
		@endif
		<div class="x_content">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Tên Category</th>
					<th>Ngày tạo</th>
					
					<th>Tùy chọn</th>
					
				</thead>

				<tbody>
					<?php $i=1 ?>
					@foreach ($categories as $category)

					<tr>
						<th>{{ $i }}</th>
						<th style="color: red;font-weight: bold">{{ $category->name }}</th>
						<td>{{ $category->created_at }}</td>

						<td>

							<a href="/admin/categories/edit/{{$category->id}}"><button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</button></a>
							<a href="{{route('categories.delete',$category->id)}}" onclick="return confirm('Are you sure you want to delete this category?');"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Delete</button></a>
						</td>

					</tr>
					<?php $i++ ?>
					@endforeach

				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
