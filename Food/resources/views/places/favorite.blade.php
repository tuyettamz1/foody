@extends('layouts.frontend')
@section('content')
<h3>Category </h3>
<hr>
<div class="blog">
    <div class="container">
           
            <div class="row">
                 <div class="col-lg-6 col-lg-offset-3 text-center">  
                    <h2><span class="ion-minus"></span>Blog Posts<span class="ion-minus"></span></h2>
                   <br>
                 </div> 
            </div>  
                
           <div class="row">
			 @foreach($favorites as $favorite)
			    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding: 10px">
				
                    <div class="col-lg-6 col-xs-12">
                        <img src="https://images.pexels.com/photos/39811/pexels-photo-39811.jpeg?h=350&auto=compress&cs=tinysrgb" alt="" width="100%">
					</div>
					
					<div class="col-lg-6 col-xs-12">
						 <div class="blog-column">
							<span>{{$favorite->place->name}}</span>
								<p><i class="fa fa-map-marker"></i> {{$favorite->place->address}}</p>		<p><i class="fa fa-phone-square"></i> {{$favorite->place->phone}}</p>
							<p>5 bình luận</p>							
							<a href="/dia-diem/{{$favorite->place->slug}}" class="btn btn-primary">Xem chi tiết</a>
						</div>
					</div>
					
                </div>
				@endforeach
				
			
           </div>
		   
		 
		   
		   
            
    </div>
</div>
<style>
  
</style>
@endsection