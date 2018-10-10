@extends('layouts.frontend')
@section('content')
<div class="blog">
    <div class="container">           
            <div class="row">
                 <div class="col-lg-6 col-lg-offset-3 text-center">  
                    <h2><span class="ion-minus"></span>Danh mục {{$category->name}}<span class="ion-minus"></span></h2>
                   <br>
                 </div> 
            </div>  
                
           <div class="row">
			 @foreach($places as $place)
			    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding: 10px">
				
                    <div class="col-lg-6 col-xs-12">
                        <img src="https://images.pexels.com/photos/39811/pexels-photo-39811.jpeg?h=350&auto=compress&cs=tinysrgb" alt="" width="100%">
					</div>
					
					<div class="col-lg-6 col-xs-12">
						 <div class="blog-column">
							<span>{{$place->name}}</span>
								<p><i class="fa fa-map-marker"></i> {{$place->address}}</p>		<p><i class="fa fa-phone-square"></i> {{$place->phone}}</p>
							<p>5 bình luận</p>							
							<a href="/dia-diem/{{$place->slug}}" class="btn btn-primary">Xem chi tiết</a>
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