<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Auth;

class AdminController extends Controller
{
    public function add_user_show()
    {
        $fetch_all_countries = DB::table('countries')
                            ->get();
        $fetch_all_states = DB::table('states')
                            ->get();
        $fetch_all_cities = DB::table('cities')
                            ->get();
        return view('admin.add-users',compact('fetch_all_countries','fetch_all_states','fetch_all_cities'));
    }
    public function getStates($country_id)
    {
        $states = DB::table('states')->where('country_id', $country_id)->get();
        return response()->json($states);
    }

    public function getCities($state_id)
    {
        $cities = DB::table('cities')->where('state_id', $state_id)->get();
        return response()->json($cities);
    }
    public function new_user_insert(Request $request)
    {
        $user_role = $request->input('user_role');
        $user_country = $request->input('user_country');
        $user_state = $request->input('user_state');
        $user_city = $request->input('user_city');
        $user_first_name = $request->input('user_first_name');
        $user_last_name = $request->input('user_last_name');
        $user_email_id = $request->input('user_email_id');
        $user_mobile_no = $request->input('user_mobile_no');
        $user_address = $request->input('user_address');
        $user_auto_password = $user_first_name.'123';
        $user_password = Hash::make($user_auto_password);
        $status = 1;

        $values = array('name'=>$user_first_name,'user_last_name'=>$user_last_name,'email'=>$user_email_id,'role'=>$user_role,'user_country'=>$user_country,'user_state'=>$user_state,'user_city'=>$user_city,'password'=>$user_password,'user_mobile_no'=>$user_mobile_no,'user_address'=>$user_address);
        $insert_data = DB::table('users')
                    ->insert($values);
        return redirect()->back();
    }

    public function get_all_regional_managers()
    {
        $fetch_all_regional_managers = DB::table('users')
                                    ->where('role','=','warehouse')
                                    ->get();

        return view('admin.users.all-regional-managers',compact('fetch_all_regional_managers'));
    }
    public function update_regional_manager_show($user_id)
    {
        $fetch_all_countries = DB::table('countries')
                            ->get();
        $fetch_all_states = DB::table('states')
                            ->get();
        $fetch_all_cities = DB::table('cities')
                            ->get();
        $fetch_user_details = DB::table('users')
                            ->where('id','=',$user_id)
                            ->first();
        return view('admin.update-users',compact('fetch_all_countries','fetch_all_states','fetch_all_cities','fetch_user_details'));
    }
    public function update_user_details(Request $request)
    {
        $user_id = $request->input('user_id');
        $user_role = $request->input('user_role');
        $user_country = $request->input('user_country');
        $user_state = $request->input('user_state');
        $user_city = $request->input('user_city');
        $user_first_name = $request->input('user_first_name');
        $user_last_name = $request->input('user_last_name');
        $user_email_id = $request->input('user_email_id');
        $user_mobile_no = $request->input('user_mobile_no');
        $user_address = $request->input('user_address');
        $user_auto_password = $user_first_name.'123';
        $user_password = Hash::make($user_auto_password);
        $status = 1;

        $values = array('name'=>$user_first_name,'user_last_name'=>$user_last_name,'email'=>$user_email_id,'role'=>$user_role,'user_country'=>$user_country,'user_state'=>$user_state,'user_city'=>$user_city,'password'=>$user_password,'user_mobile_no'=>$user_mobile_no,'user_address'=>$user_address);
        $insert_data = DB::table('users')
                    ->where('id','=',$user_id)
                    ->limit(1)
                    ->update($values);
        return redirect()->route('admin.get_all_regional_managers');
    }
    public function delete_regional_manager($user_id)
    {
        $delete_record = DB::table('users')
                        ->where('id','=',$user_id)
                        ->limit(1)
                        ->delete();
        return redirect()->back();
    }

    //Staff members

    public function get_all_staff_members()
    {
        $fetch_all_regional_managers = DB::table('users')
                                    ->where('role','=','staff')
                                    ->get();

        return view('admin.users.all-staff-members',compact('fetch_all_regional_managers'));
    }
    public function update_staff_member_show($user_id)
    {
        $fetch_all_countries = DB::table('countries')
                            ->get();
        $fetch_all_states = DB::table('states')
                            ->get();
        $fetch_all_cities = DB::table('cities')
                            ->get();
        $fetch_user_details = DB::table('users')
                            ->where('id','=',$user_id)
                            ->first();
        return view('admin.users.update-staff-member',compact('fetch_all_countries','fetch_all_states','fetch_all_cities','fetch_user_details'));
    }
    public function update_staff_member_details(Request $request)
    {
        $user_id = $request->input('user_id');
        $user_role = $request->input('user_role');
        $user_country = $request->input('user_country');
        $user_state = $request->input('user_state');
        $user_city = $request->input('user_city');
        $user_first_name = $request->input('user_first_name');
        $user_last_name = $request->input('user_last_name');
        $user_email_id = $request->input('user_email_id');
        $user_mobile_no = $request->input('user_mobile_no');
        $user_address = $request->input('user_address');
        
        $status = 1;

        $values = array('name'=>$user_first_name,'user_last_name'=>$user_last_name,'email'=>$user_email_id,'role'=>$user_role,'user_country'=>$user_country,'user_state'=>$user_state,'user_city'=>$user_city,'user_mobile_no'=>$user_mobile_no,'user_address'=>$user_address);
        $insert_data = DB::table('users')
                    ->where('id','=',$user_id)
                    ->limit(1)
                    ->update($values);
        return redirect()->route('admin.get_all_staff_members');
    }
    public function delete_staff_member($user_id)
    {
        $delete_record = DB::table('users')
                        ->where('id','=',$user_id)
                        ->limit(1)
                        ->delete();
        return redirect()->back();
    }

    // Warehouse

    public function add_warehouse_show()
    {
        $fetch_all_countries = DB::table('countries')
                            ->get();
        $fetch_all_states = DB::table('states')
                            ->get();
        $fetch_all_cities = DB::table('cities')
                            ->get();
        $fetch_regional_manager = DB::table('users')
                                ->where('role','=','warehouse')
                                ->get();

        return view('admin.warehouse.add-warehouse',compact('fetch_all_countries','fetch_all_states','fetch_all_cities','fetch_regional_manager'));

    }

    public function new_warehouse_insert(Request $request)
    {
        $warehouse_name = $request->input('warehouse_name');
        $location = $request->input('location');
        $warehouse_country = $request->input('warehouse_country');
        $warehouse_state = $request->input('warehouse_state');
        $warehouse_city = $request->input('warehouse_city');
        $postal_code = $request->input('postal_code');
        $capacity = $request->input('capacity');
        $manager_id = $request->input('manager_id');

        $values = array('warehouse_name'=>$warehouse_name,'location'=>$location,'country'=>$warehouse_country,'state'=>$warehouse_state,'city'=>$warehouse_city,'postal_code'=>$postal_code,'capacity'=>$capacity,'manager_id'=>$manager_id);

        $insert_record = DB::table('warehouse')
                        ->insert($values);
        return redirect()->back();
    }

    // products

    public function all_catgeory_show()
    {
        $fetch_all_categories = DB::table('product_categories')
                            ->get();
        return view('admin.products.all-categories',compact('fetch_all_categories'));
    }

    public function new_product_category_insert(Request $request)
    {
        $category_name = $request->input('category_name');
        $category_slug = $request->input('category_slug');
        $category_description = $request->input('category_description');

        $values = array('category_name'=>$category_name,'slug_url'=>$category_slug,'category_description'=>$category_description);

        $insert_values = DB::table('product_categories')
                        ->insert($values);
        return redirect()->back();
    }

    public function all_products_show()
    {
        $fetch_all_products = DB::table('all_products')
                            ->get();
        return view('admin.products.all-products',compact('fetch_all_products'));
    }

    public function add_product_show()
    {
        $fetch_all_categories = DB::table('product_categories')
                            ->where('status','=',1)
                            ->get();
        return view('admin.products.add-product',compact('fetch_all_categories'));
    }

    public function new_product_insert(Request $request)
    {
        $product_name = $request->input('product_name');
        $slug_url = $request->input('prod_slug');
        $prod_category = $request->input('category_id');
        $product_description = $request->input('product_description');

        $created_by = Auth::user()->id;

        $values = array('product_name'=>$product_name,'slug_url'=>$slug_url,'category_id'=>$prod_category,'product_description'=>$product_description,'created_by'=>$created_by);

        $insert_product = DB::table('all_products')
                        ->insert($values);
        return redirect()->back();

    }
    public function update_product_details_show($id)
    {
        $product_id = $id;

        $fetch_product_details = DB::table('all_products')
                                ->where('id','=',$product_id)
                                ->first();
        $fetch_all_categories = DB::table('product_categories')
                            ->get();

        return view('admin.products.update-product',compact('fetch_product_details','product_id','fetch_all_categories'));
    }

    public function update_product_details_gallery_show($id)
    {
        $product_id = $id;

        $fetch_product_details = DB::table('all_products')
                                ->where('id','=',$product_id)
                                ->first();

        $fetch_gallery = DB::table('product_gallery')
                                ->where('product_id','=',$product_id)
                                ->get();
        return view('admin.products.update-gallery',compact('fetch_product_details','product_id','fetch_gallery')); 
    }

    public function update_product_gallery_images_videos(Request $request)
    {
        
        $product_id = $request->input('product_id');
        $title = $request->input('title');
        $gallery_type = $request->input('gallery_type');
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('product-images'), $imageName);

        $values = array('product_id'=>$product_id,'gallery_type'=>$gallery_type,'title'=>$title,'image_upload'=>$imageName);

        $update_gallery = DB::table('product_gallery')
                        ->insert($values);
        return redirect()->back();
    }
}
