<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Place;
use App\Category;
use App\District;
use App\Advertisement;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   
    public function index()
    {
        return view('admin.index');
    }

        /**Category CRUD*/

    public function getIndexCategory()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    public function getCreateCategory()
    {
        $categories = Category::all();
        return view('admin.categories.create',compact('categories'));
    }

    public function postCreateCategory(Request $request)
    {
        
        $request->validate([
            'name' => 'required',       
        ],
        [  
            'name.required' => 'Vui lòng nhập tên Category',      
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        return redirect('admin/categories')->with('success','Thêm mới thành công!');
    }

    public function getEditCategory($id)
    {
         $category = Category::find($id);
        return view('admin.categories.edit',compact('category'));
    }

    public function postEditCategory(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required',       
        ],
        [  
            'name.required' => 'Vui lòng nhập tên Category',      
        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect('admin/categories')->with('success','Cập nhật thành công!');
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);      
        $category->delete();
        return redirect('admin/categories')->with('success','Xóa thành công!');
    }

    /**District CRUD*/

    public function getIndexDistrict()
    {
        $districts = District::all();
        return view('admin.districts.index',compact('districts'));
    }

    public function getCreateDistrict()
    {
        $districts = District::all();
        return view('admin.districts.create',compact('districts'));
    }

    public function postCreateDistrict(Request $request)
    {
        
        $request->validate([
            'name' => 'required',       
        ],
        [  
            'name.required' => 'Vui lòng nhập tên District',      
        ]);
        $district = new District;
        $district->name = $request->name;
        $district->save();
        return redirect('admin/districts')->with('success','Thêm mới thành công!');
    }

    public function getEditDistrict($id)
    {
         $district = District::find($id);
        return view('admin.districts.edit',compact('district'));
    }

    public function postEditDistrict(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required',       
        ],
        [  
            'name.required' => 'Vui lòng nhập tên Category',      
        ]);
        $district = District::find($id);
        $district->name = $request->name;
        $district->save();
        return redirect('admin/districts')->with('success','Cập nhật thành công!');
    }

    public function deleteDistrict($id)
    {
        $district = District::find($id);      
        $district->delete();
        return redirect('admin/districts')->with('success','Xóa thành công!');
    }

     /**District CRUD*/

     public function getIndexUser()
     {
         $users = User::all();
         return view('admin.users.index',compact('users'));
     }

     public function getEditUser($id)
     {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.users.edit',compact('user','roles'));
     }

     public function postEditUser(Request $request,$id)
     {
         $request->validate([
            'name' => 'required',       
        ],
        [  
            'name.required' => 'Vui lòng nhập tên thành viên',      
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->role_id = $request->role;
        $user->status = $request->status;
        $user->save();
        return redirect('admin/users')->with('success','Cập nhật thành công!');
     }

     public function deleteUser($id)
     {
         $user = User::find($id);
         $user->delete();
         return redirect('admin/users')->with('success','Xóa thành công!');
     }
   //Place

     public function getIndexPlace()
    {
        $places = Place::where('status',1)->get();
        return view('admin.places.index',compact('places'));
    }

    public function getPendingPlace()
    {
        $places = Place::where('status',0)->get();
        return view('admin.places.pending',compact('places'));
    }

    public function getApprovedPlace($id,$flag)
    {
        $place = Place::find($id);
        if($flag==1){
            $place->status =1;
        }
        else
        {
            $place->status =2;
        }
        $place->save();
        return redirect('/admin/places')->with('success','Đã phê duyệt thành công !');
    }

    public function getViewPlace($id)
    {
        $place = Place::find($id);
        return view('admin.places.view',compact('place'));
    }

    public function getDeletePlace($id)
    {
        $place = Place::find($id);
        $place->delete();
        return redirect('admin/places')->with('success','Xóa thành công !');
    }

    public function getCreateAd()
    {
        $advertisements = District::all();
        return view('admin.advertisements.create',compact('advertisements'));
    }

    public function postCreateAd(Request $request)
    {
        dd($request);die();
        
        $request->validate([
            'place_id' => 'required',       
        ],
        [  
            'place_id.required' => 'Vui lòng chọn địa điểm',      
        ]);
        $advertisement = new Advertisement;
        $advertisement->place_id = $request->place_id;
        $advertisement->save();
        return redirect('admin/districts')->with('success','Thêm mới thành công!');
    }
}
