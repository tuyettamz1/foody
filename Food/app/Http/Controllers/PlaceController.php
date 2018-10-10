<?php

namespace App\Http\Controllers;

use App\Category;
use App\District;
use App\Place;
use App\Rating;
use Auth;
use Illuminate\Http\Request;

class PlaceController extends Controller
{

    public function index()
    {
        $places = Place::all();
        
        return view('places.index',compact('places'));
    }


    public function create()
    {
    	$districts = District::all();
    	$categories = Category::all();
    	return view('places.create',compact('districts','categories'));
    }

    public function store(Request $request)
    {
        //dd($request);die();
    	$request->validate([
            'name' => 'required',
            'address' =>'required',       
            'price_from' =>'required',       
            'price_to' =>'required',       
            'detail' =>'required',       
            'phone' =>'required',       
            'image' =>'required',       
            
        ],
        [  
            'name.required' => 'Vui lòng nhập tên Category',
            'price_from.required' => 'Vui lòng nhập giá thấp nhất',
            'price_to.required' => 'Vui lòng nhập giá cao nhất',
            'detail.required' => 'Vui lòng nhập phần thông tin chi tiết',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'image.required' => 'Vui lòng chọn ảnh',
            'address.required' => 'Vui lòng nhập địa chỉ',
               
        ]);
        $place = new Place;
        $place->name = $request->name;
        $place->address = $request->address;
        $place->phone = $request->phone;
        $place->slug = $request->slug;
        $place->detail = $request->detail;
        $place->image = $request->image;
        $place->price_from = $request->price_from;
        $place->price_to = $request->price_to;
        $place->category_id = $request->category;
        $place->district_id = $request->district;
        $place->user_id = Auth::user()->id;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $nameFile = 'places'.'_'.Auth::user()->id.'_'.$file->getClientOriginalName();
            $file->move('\frontend\images',$nameFile);
            $place->image = $nameFile;              
        }
        $place->save();
    	return redirect('/places/create')->with('success','Thêm mới địa điểm thành công');
    }

    public function show($slug)
    {
        $place = Place::where('slug',$slug)->first();
        return view('places.show',compact('place'));
    }

     public function rating(Request $request)
    {
        $rating = new Rating;
        $rating->user_id = Auth::user()->id;
        $rating->place_id = $request->place_id;
        $rating->value = $request->value;
        $rating->save();
        return back()->with('success','Đánh giá thành công');
    }


    public function category($category)
    {
        $places = Place::where('category_id',$category)
        ->where('status',1)
        ->get();
        return view('places.category',compact('places'));
    }

    public function edit($id)
    {
        $districts = District::all();
        $place = Place::find($id);
        $categories = Place::all();
        return view('places.edit',compact('place','districts','categories'));
    }

    public function update(Request $request,$id)
    {
        //dd($request);die();
        $request->validate([
            'name' => 'required',
            'address' =>'required',       
            'price_from' =>'required',       
            'price_to' =>'required',       
            'detail' =>'required',       
            'phone' =>'required',       
            'image' =>'required',       
            
        ],
        [  
            'name.required' => 'Vui lòng nhập tên Category',
            'price_from.required' => 'Vui lòng nhập giá thấp nhất',
            'price_to.required' => 'Vui lòng nhập giá cao nhất',
            'detail.required' => 'Vui lòng nhập phần thông tin chi tiết',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'image.required' => 'Vui lòng chọn ảnh',
            'address.required' => 'Vui lòng nhập địa chỉ',
               
        ]);
        $place = Place::find($id);
        $place->name = $request->name;
        $place->address = $request->address;
        $place->phone = $request->phone;
        $place->slug = $request->slug;
        $place->detail = $request->detail;
        $place->image = $request->image;
        $place->price_from = $request->price_from;
        $place->price_to = $request->price_to;
        $place->category_id = $request->category;
        $place->district_id = $request->district;
        $place->user_id = Auth::user()->id;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $nameFile = 'places'.'_'.Auth::user()->id.'_'.$file->getClientOriginalName();
            $file->move('\frontend\images',$nameFile);
            $place->image = $nameFile;              
        }
        $place->save();
        return back()>with('success','Thêm mới địa điểm thành công');
    }


}
