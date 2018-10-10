@extends('layouts.frontend')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}"> 
<?php 
$one = \App\Rating::where('place_id',$place->id)->where('value',1)->count();
$two = \App\Rating::where('place_id',$place->id)->where('value',2)->count();
$three = \App\Rating::where('place_id',$place->id)->where('value',3)->count();
$four = \App\Rating::where('place_id',$place->id)->where('value',4)->count();
$five = \App\Rating::where('place_id',$place->id)->where('value',5)->count();
$number_comment = \App\Comment::where('place_id',$place->id)->count();
$number_rating = \App\Rating::where('place_id',$place->id)->count();
if(Auth::check()){
$check = \App\Favorite::where('place_id',$place->id)
->where('user_id',Auth::user()->id)
->first();
$like = \App\Favorite::where('place_id',$place->id)
->where('user_id',Auth::user()->id)
->where('status',1)
->first();
}
?>
<link rel="stylesheet" href="frontend/css/progressbar.css">
<div class="container">
	<div class="row">
		<!-- Blog Entries Column -->
		<div class="col-md-8">
			<!-- Title -->
			<h1 class="mt-4">{{$place->name}}</h1>
			<!-- Date/Time -->
			<p>Đăng lúc {{$place->created_at}}</p>
			@if(Auth::check())
			@if($like)
			<button class="btn btn-danger" id="unfavorite" type="button"><i class="fa fa-thumbs-down"></i> Bỏ yêu thích</button>
			@else
			<button class="btn btn-primary" id="favorite" type="button"><i class="fa fa-thumbs-up"></i> Thêm vào yêu thích</button>
			@endif
			<input type="hidden" id="ajax_place_id" value="{{$place->id}}"> 
			@endif
			<hr>
			<!-- Preview Image -->
			<img class="card-img-top" src="/frontend/images/1.jpg" alt="Card image cap" style="width: 730px; height: 400px">
				<hr>
			<h4> <i class="fa fa-paw"></i> Thông tin địa điểm </h4> 

			<table class="table table-user-information">
				<tbody>
					<tr>
						<td>Tên địa điểm:</td>
						<td>{{$place->name}}</td>
					</tr>
					<tr>
						<td><i class="fa fa-map-marker"></i> Địa chỉ:</td>
						<td>{{$place->address}}</td>
					</tr>
					<tr>
						<td>Khu vực</td>
						<td>{{$place->district->name}}</td>
					</tr>

					<tr>
						<tr>
							<td>Số điện thoại</td>
							<td>{{$place->phone}}</td>
						</tr>
						<tr>
							<td>Category</td>
							<td>{{$place->category->name}}</td>
						</tr>
						<tr>
							<td>Giá</td>
							<td>Từ {{$place->price_from}}đ - {{$place->price_to}}đ</td>
						</tr>
						<tr>
						<td>Điểm đánh giá </td>
						<td>{{$place->avg_rate}}/5 <i class="fa fa-star"></i></td>
						</tr>
						<tr>
						<td>Thống kê </td>
						<td>{{$number_comment}} bình luận <i class="fa fa-comment"></i>  
							{{$number_rating}} đánh giá <i class="fa fa-star"></i> 
						</td>
						</tr>
					</tr>

				</tbody>
			</table>



			<hr>
			<h4><i class="fa fa-paw"></i> Mô tả chi tiết</h4>
			{!!$place->detail!!}
			<hr>

			<!-- Comments Form -->
			<div class="card my-4">
				<h4 class="card-header" style="font-weight: bold;color: blue">Bình luận:</h4>
				<div class="card-body">
					<form action="{{route('places.comment')}}" method="post">
						@csrf
						<div class="form-group">
							<textarea class="form-control" rows="3" id="body" name="body"></textarea>
						</div>
						<input type="hidden" name="place_id" value="{{$place->id}}">
						@if(session('comment'))
						<div class="bs-component">
							<div class="alert alert-dismissible alert-success">
								<button class="close" type="button" data-dismiss="alert">×</button>
								<strong>{{session('comment')}}</strong>
							</div>
						</div>
						@endif
						@if(Auth::check())
						<button type="submit" class="btn btn-primary" id="comment">Gửi bình luận</button>
						@else
						<a href="/login"><span class="btn btn-danger" id="comment">Vui lòng đăng nhập để bình luận</span></a>
						@endif
					</form>
				</div>
			</div>
			<hr>
			<div class="container">

				<div class="row">
					<div class="col-sm-4">
						<div class="rating-block">
							<h4><i class="fa fa-paw"></i> Đánh giá</h4>
							<h2 class="bold padding-bottom-7">4.3 <small>/ 5</small></h2>
							<form action="{{route('places.rating')}}" method="post">
								@csrf
								<div>
									<div id="stars" class="starrr lead" data-rating='3'></div>

									<input type="hidden" id="count" name="value">
									<input type="hidden" value="{{$place->id}}" name="place_id">
								</div>
								@if(session('rating'))
								<div class="bs-component">
									<div class="alert alert-dismissible alert-success">
										<button class="close" type="button" data-dismiss="alert">×</button>
										<span>{{session('rating')}}</span>
									</div>
								</div>
								@endif
								@if(session('rating_error'))
								<div class="bs-component">
									<div class="alert alert-dismissible alert-danger">
										<button class="close" type="button" data-dismiss="alert">×</button>
										<span>{{session('rating_error')}}</span>
									</div>
								</div>
								@endif
								@if(Auth::check())
								<p><button type="submit" class="btn btn-primary">Đánh giá</button></p>
								@else
								<a href="/login"><p class="btn btn-danger">Vui lòng đăng nhập để đánh giá</p></a>
								@endif
							</form>
						</div>
					</div>
					<div class="col-sm-4">
						<h4><i class="fa fa-paw"></i> Thống kê</h4>
						<div class="pull-left">
							<div class="pull-left" style="width:35px; line-height:1;">
								<div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
							</div>
							<div class="pull-left" style="width:180px;">
								<div class="progress" style="height:9px; margin:8px 0;">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: 1000%">
										<span class="sr-only">80% Complete (danger)</span>
									</div>
								</div>
							</div>
							<div class="pull-right" style="margin-left:10px;">{{$five}}</div>
						</div>
						<div class="pull-left">
							<div class="pull-left" style="width:35px; line-height:1;">
								<div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
							</div>
							<div class="pull-left" style="width:180px;">
								<div class="progress" style="height:9px; margin:8px 0;">
									<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: 80%">
										<span class="sr-only">80% Complete (danger)</span>
									</div>
								</div>
							</div>
							<div class="pull-right" style="margin-left:10px;">{{$four}}</div>
						</div>
						<div class="pull-left">
							<div class="pull-left" style="width:35px; line-height:1;">
								<div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
							</div>
							<div class="pull-left" style="width:180px;">
								<div class="progress" style="height:9px; margin:8px 0;">
									<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 60%">
										<span class="sr-only">80% Complete (danger)</span>
									</div>
								</div>
							</div>
							<div class="pull-right" style="margin-left:10px;">{{$three}}</div>
						</div>
						<div class="pull-left">
							<div class="pull-left" style="width:35px; line-height:1;">
								<div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
							</div>
							<div class="pull-left" style="width:180px;">
								<div class="progress" style="height:9px; margin:8px 0;">
									<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: 40%">
										<span class="sr-only">80% Complete (danger)</span>
									</div>
								</div>
							</div>
							<div class="pull-right" style="margin-left:10px;">{{$two}}</div>
						</div>
						<div class="pull-left">
							<div class="pull-left" style="width:35px; line-height:1;">
								<div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
							</div>
							<div class="pull-left" style="width:180px;">
								<div class="progress" style="height:9px; margin:8px 0;">
									<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: 20%">
										<span class="sr-only">80% Complete (danger)</span>
									</div>
								</div>
							</div>
							<div class="pull-right" style="margin-left:10px;">{{$one}}</div>
						</div>
					</div>			
				</div>			

				<div class="row">
					<div class="col-sm-7">
						<h4 class="text-success"><i class="fa fa-paw"></i> Review từ người dùng</h4>
						<hr/>
						<div class="review-block">
							@foreach($comments as $comment)
							<div class="row">
								<div class="col-sm-3">
									<img src="/frontend/images/avatar.jpg" class="img-rounded" style="width: 60px;height: 60px">
									<br>
									<small style="float: rigth">{{$comment->created_at}}</small>
								</div>
								<div class="col-sm-9">
									<div class="review-block-rate">

									</div>
									<div class="review-block-title">{{$comment->user->name}} </div>
									<div class="review-block-description">{{$comment->body}}</div>
								</div>
							</div>
							<hr/>
							@endforeach
							
						</div>
					</div>
				</div>

			</div>



		</div>

		<!-- Sidebar Widgets Column -->
		<div class="col-md-4">
			<h3 class="text-danger" style="color: white"><i class="fa fa-plus"></i></h3>
			<hr>
			<div class="col-md-12">
				<div class="contactpanel">
					<div class="row">
						<div class="col-md-4 text-center">						
							<img src="/frontend/images/avatar.jpg" class="img-circle" alt="Cinque Terre" width="100" height="100">		<p><strong>{{$place->user->name }}</strong></p>			
						</div>
						<div class="col-md-8">
							<h4>Thông tin người đăng</h4>						
							<i class="far fa-clock"></i> Ngày tham gia: 17-02-2018	
							<br>

						</div>
					</div>
					<div class="text-center">
						<a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Bấm vào đây để lấy số điện thoại</a>
						<div class="row">
							<div class="col">
								<div class="collapse multi-collapse" id="multiCollapseExample1">
									<div class="card card-body">
										<br>
										<h4 style="font-weight: bold;color: red;text-align: center"><i class="fa fa-phone-square"></i> {{$place->phone}}</h4>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
				<hr>
				
			</div>
		</div>
	</div>
	<!-- /.row -->
</div>
<script src="/js/notify.min.js"></script>
<style>
.btn-grey{
	background-color:#D8D8D8;
	color:#FFF;
}
.rating-block{
	background-color:#FAFAFA;
	border:1px solid #EFEFEF;
	padding:15px 15px 20px 15px;
	border-radius:3px;
}
.bold{
	font-weight:700;
}
.padding-bottom-7{
	padding-bottom:7px;
}

.review-block{
	background-color:#FAFAFA;
	border:1px solid #EFEFEF;
	padding:15px;
	border-radius:3px;
	margin-bottom:15px;
}
.review-block-name{
	font-size:12px;
	margin:10px 0;
}
.review-block-date{
	font-size:12px;
}
.review-block-rate{
	font-size:13px;
	margin-bottom:15px;
}
.review-block-title{
	font-size:15px;
	font-weight:700;
	margin-bottom:10px;
}
.review-block-description{
	font-size:13px;
}
</style>
<script>
	$(document).ready(function(){
		$('#comment').prop('disabled',true);
		$('#body').keyup(function(){
			$('#comment').prop('disabled', this.value == "" ? true : false);     
		})
	});

	var __slice = [].slice;

	(function ($, window) {
		var Starrr;

		Starrr = (function () {
			Starrr.prototype.defaults = {
				rating: void 0,
				numStars: 5,
				change: function (e, value) {}
			};

			function Starrr($el, options) {
				var i, _, _ref,
				_this = this;

				this.options = $.extend({}, this.defaults, options);
				this.$el = $el;
				_ref = this.defaults;
				for (i in _ref) {
					_ = _ref[i];
					if (this.$el.data(i) != null) {
						this.options[i] = this.$el.data(i);
					}
				}
				this.createStars();
				this.syncRating();
				this.$el.on('mouseover.starrr', 'span', function (e) {
					return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
				});
				this.$el.on('mouseout.starrr', function () {
					return _this.syncRating();
				});
				this.$el.on('click.starrr', 'span', function (e) {
					return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
				});
				this.$el.on('starrr:change', this.options.change);
			}

			Starrr.prototype.createStars = function () {
				var _i, _ref, _results;

				_results = [];
				for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
					_results.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"));
				}
				return _results;
			};

			Starrr.prototype.setRating = function (rating) {
				if (this.options.rating === rating) {
					rating = void 0;
				}
				this.options.rating = rating;
				this.syncRating();
				return this.$el.trigger('starrr:change', rating);
			};

			Starrr.prototype.syncRating = function (rating) {
				var i, _i, _j, _ref;

				rating || (rating = this.options.rating);
				if (rating) {
					for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
						this.$el.find('span').eq(i).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
					}
				}
				if (rating && rating < 5) {
					for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
						this.$el.find('span').eq(i).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
					}
				}
				if (!rating) {
					return this.$el.find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
				}
			};

			return Starrr;

		})();
		return $.fn.extend({
			starrr: function () {
				var args, option;

				option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
				return this.each(function () {
					var data;

					data = $(this).data('star-rating');
					if (!data) {
						$(this).data('star-rating', (data = new Starrr($(this), option)));
					}
					if (typeof option === 'string') {
						return data[option].apply(data, args);
					}
				});
			}
		});
	})(window.jQuery, window);

	$(function () {
		return $(".starrr").starrr();
	});

	$(document).ready(function () {

		$('#stars').on('starrr:change', function (e, value) {
			$('#count').val(value);
		});


		$('#stars-existing').on('starrr:change', function (e, value) {
			$('#count-existing').html(value);
		});

	});

</script>

<script type="text/javascript">

$(document).ready(function () {
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }
    });

    $("#favorite").click(function(e){
        e.preventDefault();
        var place_id = $("#ajax_place_id").val();

        $.ajax({

           type:'POST',

           url:'/favorite',
           dataType : "json",

           data: {place_id : place_id},
           success:function(response){
           	location.reload();
              $.notify("Đã thêm vào yêu thích", "success");
           }
        });
	});

	$("#unfavorite").click(function(e){
        e.preventDefault();
        var place_id = $("#ajax_place_id").val();     
        $.ajax({
           type:'POST',
           url:'/unfavorite',
           dataType : "json",

           data: {place_id : place_id},
           success:function(response){
           	location.reload();
              $.notify("Đã bỏ yêu thích", "success");
           }
        });
	});
});

</script>


@endsection