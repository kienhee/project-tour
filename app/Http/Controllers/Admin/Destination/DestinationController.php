<?php

namespace App\Http\Controllers\Admin\Destination;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Destination;
use App\Models\Product;
use App\Models\Tour;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index(Request $request)
    {
        $result = Destination::query();

        if ($request->has('keywords') && $request->keywords != null) {
            $result->where('name', 'like', '%' . $request->keywords . '%');
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
        $destinations = $result->paginate(10);
        return view('admin.destination.index', compact('destinations'));
    }
    public function add()
    {
        return view('admin.destination.add');
    }
    public function store(Request $request)
    {


        $validate = $request->validate([
            'name' => 'required|unique:destinations,name',
            'slug' => 'required|unique:destinations,slug',
            "cover" => "required",
        ], [
            "name.required" => "Vui lòng nhập trường này",
            "name.unique" => "Tên này đã tồn tại!",
            "slug.required" => "Vui lòng thêm đường dẫn",
            "slug.unique" => "Đường dẫn này đã tồn tại!",
            "cover.required" => "Vui lòng tải ảnh bìa cho địa điểm!",
        ]);
        if ($request->hasFile('cover')) {
            $path_img =  $request->file('cover')->store('public/photos/1');
            // Thay thế public thành storage trong chuỗi path
            $validate['cover'] = str_replace("public", getenv('APP_URL') . "/storage", $path_img);
        }
        $check = Destination::insert($validate);
        if ($check) {
            return back()->with('msgSuccess', 'Thêm thành công');
        }
        return back()->with('msgError', 'Thêm thất bại!');
    }
    public function edit(Destination $destination)
    {
        return view('admin.destination.edit', compact('destination'));
    }
    public function update(Request $request, $id)
    {


        $validate = $request->validate([
            'name' => 'required|unique:destinations,name,' . $id,
            'slug' => 'required|unique:destinations,slug,' . $id,
            "cover" => "required",
        ], [
            "name.required" => "Vui lòng nhập trường này",
            "name.unique" => "Tên này đã tồn tại!",
            "slug.required" => "Vui lòng thêm đường dẫn",
            "slug.unique" => "Đường dẫn này đã tồn tại!",
            "cover.required" => "Vui lòng tải ảnh bìa cho địa điểm!",
        ]);
        if ($request->hasFile('cover')) {
            $path_img =  $request->file('cover')->store('public/photos/1');
            // Thay thế public thành storage trong chuỗi path
            $validate['cover'] = str_replace("public", getenv('APP_URL') . "/storage", $path_img);
        }
        $check = Destination::where('id', $id)->update($validate);
        if ($check) {
            return back()->with('msgSuccess', 'Cập nhật thành công');
        }
        return back()->with('msgError', 'Cập nhật thất bại!');
    }
    public function softDelete($id)
    {
        $check =
            Destination::destroy($id);
        if ($check) {
            return back()->with('msgSuccess', 'Đổi trạng thái thành công');
        }
        return back()->with('msgError', 'Đổi trạng thái thất bại!');
    }
    public function restore($id)
    {
        $check = Destination::onlyTrashed()->where('id', $id)->restore();
        if ($check) {
            return back()->with('msgSuccess', 'Khôi phục dùng thành công');
        }
        return back()->with('msgError', 'Khôi phục dùng thất bại!');
    }
    public function forceDelete($id)
    {
        $CheckTourExists = Tour::where('destination_id', $id)->get();
        if ($CheckTourExists->count() > 0) {
            return back()->with('msgError', 'Còn ' . $CheckTourExists->count() . ' sản phẩm trong danh mục , không thể xóa');
        }
        $check = Destination::onlyTrashed()->where('id', $id)->forceDelete();
        if ($check) {
            return back()->with('msgSuccess', 'Xóa thành công');
        }
        return back()->with('msgError', 'Xóa thất bại!');
    }
}
