@extends('layouts.frontend')
@section('content')
<hr>
<div class="row">
	<div class="col-md-8 col-sm-12 col-xs-12">
		<h3 class="text-success"><i class="fa fa-map-marker"></i> Thêm mới địa điểm</h3>
		@if ($errors->any())
		<div class="alert alert-danger col-10 offset-1">
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
		<hr>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<form method="post" action="{{route('places.create')}}" enctype="multipart/form-data">
						@csrf
						<div class="form-group ">
							<label class="control-label">
								Tên địa điểm
							</label>
							<input class="form-control" id="name" name="name" onkeyup="ChangeToSlug();" value="{{old('name')}}" />
						</div>
						
							<input class="form-control" name="slug" id="slug" value="{{old('slug')}}" type="hidden" />
						
						<div class="form-group ">
							<label class="control-label">
								Địa chỉ
								<span class="asteriskField">
									*
								</span>
							</label>
							<input class="form-control" name="address" type="text" value="{{old('address')}}"/>
						</div>															
						<input class="form-control" id="price_from" name="price_from" type="hidden" value="{{old('price_form')}}"/>			
						<input class="form-control" id="price_to" name="price_to" type="hidden" value="{{old('price_to')}}"/>					
						<div class="form-group ">
							<label class="control-label " for="name">
								Giá tiền 
							</label>
							<span id="amount" style="font-weight: bold; color:blue;"></span>
							<div id="price"></div>
						</div>		
						<div class="form-group ">
							<label class="control-label" >
								Category
								<span class="asteriskField">
									*
								</span>
							</label>
							<select name="category" class="form-control">
								@foreach($categories as $category)
								<option value="{{$category->id}}">{{$category->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group ">
							<label class="control-label">
								Khu vực
								<span class="asteriskField">
									*
								</span>
							</label>
							<select name="district" class="form-control">
								@foreach($districts as $district)
								<option value="{{$district->id}}">{{$district->name}}</option>
								@endforeach
							</select>
						</div>		
						<div class="form-group ">
							<label class="control-label ">
								Số điện thoại
							</label>
							<input class="form-control" name="phone" value="{{old('phone')}}"/>
						</div>
						<div class="form-group ">
							<label class="control-label">
								Chi tiết
							</label>
							<textarea class="form-control" name="detail">{{old('detail')}}</textarea>						
						</div>
						<div class="form-group ">
							<label class="control-label " for="subject">
								Ảnh
							</label>
							<input class="form-control" id="subject" name="image" type="file"/>
						</div>
						<div class="form-group">
							<div>
								<button class="btn btn-success" name="submit" type="submit">
									<i class="fa fa-plus"></i> Thêm mới
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4 col-sm-12 col-xs-12">
		<h3 class="text-danger" style="color: white"><i class="fa fa-plus"></i></h3>
		<hr>
		<div class="col-md-12">
			<div class="contactpanel">
				<div class="row">
					<div class="col-md-4 text-center">						
						<img src="/frontend/images/avatar.jpg" class="img-circle" alt="Cinque Terre" width="100" height="100">		<p><strong>{{ Auth::user()->name }}</strong></p>			
					</div>
					<div class="col-md-8">
						<h4>Thông tin người đăng</h4>						
						<i class="far fa-clock"></i> Ngày tham gia: 17-02-2018	
					</div>
				</div>
			</div>
			<hr>
			<h5 class="text-danger" style="font-weight: bold"><i class="fa fa-bullhorn"></i> Một số lưu ý về tạo mới địa điểm</h5>
			<p><i class="fa fa-check"></i> Thông tin phải rõ ràng, chính xác</p>
			<p><i class="fa fa-check"></i> Phần mô tả nên nêu những điểm nổi bật</p>
			<p><i class="fa fa-check"></i> Hình ảnh nên đẹp để thu hút hơn</p>
		</div>
	</div>
</div>
<script>
	CKEDITOR.replace( 'detail' );
</script>
@endsection