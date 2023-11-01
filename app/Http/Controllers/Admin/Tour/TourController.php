<?php

namespace App\Http\Controllers\Admin\Tour;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TourController extends Controller
{
    public function index(Request $request)
    {
        $result = Tour::query();

        if ($request->has('keywords') && $request->keywords != null) {
            $result->where('title', 'like', '%' . $request->keywords . '%');
        }


        if ($request->has('sort') && $request->sort != null) {
            $result->orderBy('created_at', $request->sort);
        } else {
            $result->orderBy('created_at', 'desc');
        }
        if ($request->has('status') && $request->status != null && $request->status == 'active') {
            $result->where('deleted_at', "=", null);
        } elseif ($request->has('status') && $request->status != null && $request->status == 'inactive') {
            $result->onlyTrashed();
        } else {
            $result->withTrashed();
        }
        $tours = $result->paginate(10);
        return view('admin.tour.index', compact('tours'));
    }
    public function add()
    {
        return view('admin.tour.add');
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $validate = $request->validate([
            "title" => "required|unique:tours,title",
            "slug" => "required|unique:tours,slug",
            "content" => "required",
            "starting_point" => "required",
            "date_of_department" => "required",
            "return_date" => "required",
            "road_map" => "required",
            "amount_of_people" => "required|numeric",
            "price_large" => "required|numeric",
            "price_small" => "required|numeric",
            "vehicle_id" => "required|numeric",
            "destination_id" => "required|numeric",
            "cover" => "required",

        ], [
            "title.required" => "Vui lòng nhập trường này!",
            "slug.required" => "Vui lòng nhập trường này!",
            "content.required" => "Vui lòng nhập trường này!",
            "starting_point.required" => "Vui lòng nhập trường này!",
            "date_of_department.required" => "Vui lòng nhập trường này!",
            "return_date.required" => "Vui lòng nhập trường này!",
            "amount_of_people.required" => "Vui lòng nhập trường này!",
            "price_large.required" => "Vui lòng nhập trường này!",
            "price_small.required" => "Vui lòng nhập trường này!",
            "vehicle_id.required" => "Vui lòng nhập trường này!",
            "road_map.required" => "Vui lòng nhập trường này!",
            "cover.required" => "Vui lòng thêm ảnh!",
            "destination_id.required" => "Vui lòng nhập trường này!",
            "title.unique" => "Tiêu đề đã tồn tại!",
            "slug.unique" => "Đường dẫn đã tồn tại!",
            "amount_of_people.numeric" => "Giá trị phải là số!",
            "price_large.numeric" => "Giá trị phải là số!",
            "price_small.numeric" => "Giá trị phải là số!",
            "vehicle_id.numeric" => "Giá trị phải là số!",
            "destination_id.numeric" => "Giá trị phải là số!",


        ]);
        $validate['sale']= $request->sale;
        $validate['avaiable'] = $request->amount_of_people;
        if ($request->hasFile('cover')) {
            $path_img =  $request->file('cover')->store('public/photos/1');
            // Thay thế public thành storage trong chuỗi path
            $validate['cover'] = str_replace("public", getenv('APP_URL') . "/storage", $path_img);
        }
        $check = Tour::insert($validate);
        if ($check) {
            return back()->with('msgSuccess', 'Thêm thành công');
        }
        return back()->with('msgError', 'Thêm thất bại!');
    }
    public function edit(Tour $tour)
    {
        return view('admin.tour.edit', compact('tour'));
    }
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            "title" => "required|unique:tours,title," . $id,
            "slug" => "required|unique:tours,slug," . $id,
            "content" => "required",
            "starting_point" => "required",
            "date_of_department" => "required",
            "return_date" => "required",
            "road_map" => "required",
            "amount_of_people" => "required|numeric",
            "price_large" => "required|numeric",
            "price_small" => "required|numeric",
            "vehicle_id" => "required|numeric",
            "destination_id" => "required|numeric",
            "cover" => "required",

        ], [
            "title.required" => "Vui lòng nhập trường này!",
            "slug.required" => "Vui lòng nhập trường này!",
            "content.required" => "Vui lòng nhập trường này!",
            "starting_point.required" => "Vui lòng nhập trường !",
            "date_of_department.required" => "Vui lòng nhập trường này!",
            "return_date.required" => "Vui lòng nhập trường này!",
            "amount_of_people.required" => "Vui lòng nhập trường !",
            "price_large.required" => "Vui lòng nhập trường này!",
            "price_small.required" => "Vui lòng nhập trường này!",
            "vehicle_id.required" => "Vui lòng nhập trường này!",
            "road_map.required" => "Vui lòng nhập trường này!",
            "cover.required" => "Vui lòng thêm ảnh!",
            "destination_id.required" => "Vui lòng nhập trường này!",
            "title.unique" => "Tiêu đề đã tồn tại!",
            "slug.unique" => "Đường dẫn đã tồn tại!",
            "amount_of_people.numeric" => "Giá trị phải là số!",
            "price_large.numeric" => "Giá trị phải là số!",
            "price_small.numeric" => "Giá trị phải là số!",
            "vehicle_id.numeric" => "Giá trị phải là số!",
            "destination_id.numeric" => "Giá trị phải là số!",


        ]);
        $validate['sale']= $request->sale;
        $validate['avaiable'] = $request->amount_of_people;
        if ($request->hasFile('cover')) {
            $path_img =  $request->file('cover')->store('public/photos/1');
            // Thay thế public thành storage trong chuỗi path
            $validate['cover'] = str_replace("public", getenv('APP_URL') . "/storage", $path_img);
        }
        $check = Tour::where('id', $id)->update($validate);
        if ($check) {
            return back()->with('msgSuccess', 'Cập nhật thành công');
        }
        return back()->with('msgError', 'Cập nhật thất bại!');
    }
    public function softDelete($id)
    {
        $check =
            Tour::destroy($id);
        if ($check) {
            return back()->with('msgSuccess', 'Đổi trạng thái thành công');
        }
        return back()->with('msgError', 'Đổi trạng thái thất bại!');
    }
    public function restore($id)
    {
        $check = Tour::onlyTrashed()->where('id', $id)->restore();
        if ($check) {
            return back()->with('msgSuccess', 'Khôi phục dùng thành công');
        }
        return back()->with('msgError', 'Khôi phục dùng thất bại!');
    }
    public function forceDelete($id)
    {
        $check = Tour::onlyTrashed()->where('id', $id)->forceDelete();
        if ($check) {
            return back()->with('msgSuccess', 'Xóa thành công');
        }
        return back()->with('msgError', 'Xóa thất bại!');
    }
}
