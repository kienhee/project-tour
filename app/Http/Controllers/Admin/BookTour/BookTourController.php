<?php

namespace App\Http\Controllers\Admin\BookTour;

use App\Http\Controllers\Controller;
use App\Models\BookTour;
use App\Models\Tour;
use Illuminate\Http\Request;

class BookTourController extends Controller
{
    public function index(Request $request)
    {
        $result = BookTour::query();

        if ($request->has('sort') && $request->sort != null) {
            $result->orderBy('created_at', $request->sort);
        } else {
            $result->orderBy('created_at', 'desc');
        }
        if ($request->has('status') && $request->status != null) {
            $result->where('status', "=", $request->status);
        }
        $tours = $result->paginate(10);
        return view('admin.bookTour.index', compact('tours'));
    }
    public function viewDetail(BookTour $tour)
    {
        return view('admin.bookTour.view', compact('tour'));
    }
    public function updateStatus(Request $request, $id)
    {
           $check = BookTour::where('id', $id)->update(['status' => $request->status]);

        if ($check) {
            return back()->with('msgSuccess', 'Cập nhật thành công');
        }
        return back()->with('msgError', 'Cập nhật thất bại!');
    }
    public function delete($id)
    {
        $check =
            BookTour::destroy($id);
        if ($check) {
            return back()->with('msgSuccess', 'Xóa thành công');
        }
        return back()->with('msgError', 'Xóa thất bại!');
    }
}
