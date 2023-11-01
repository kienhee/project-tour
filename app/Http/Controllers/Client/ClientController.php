<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BookTour;
use App\Models\FavouriteTour;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function home()
    {
        return view('client.index');
    }

    public function destination()
    {
        return view('client.destination');
    }

    public function blog(Request $request)
    {
        $result = Tour::query();
        if ($request->has('keywords') && $request->keywords != null) {
            $result->where('title', 'like', '%' . $request->keywords . '%');
        }
        if ($request->has('price') && $request->price != null) {
            $result->where('price_large', '<=', $request->price)->orWhere('price_small', '<=', $request->price);
        }
        if ($request->has('destination') && $request->destination != null) {
            $result->where('destination_id', '=', $request->destination);
        }
        if ($request->has('date_of_department') && $request->date_of_department != null) {
            $result->whereDate('date_of_department', '<=', $request->date_of_department);
        }
        $posts = $result->OrderBy('created_at', 'DESC')->paginate(10);
        return view('client.blog', compact('posts'));
    }

    public function blogDetail($slug)
    {
        $tags = Tag::OrderBy('created_at', 'DESC')->get();
        $blog = Post::where('slug', $slug)->first();
        $recentBlog = Post::where('slug', '<>', $slug)->limit(3)->get();
        return view('client.blog-single', compact('blog', 'tags', 'recentBlog'));
    }

    public function contact()
    {
        return view('client.contact');
    }

    public function hotel()
    {
        return view('client.hotel');
    }

    public function userInfo()
    {
        return view('client.user');
    }

    public function historyBookTour()
    {
        return view('client.history-book-tour');
    }

    public function changePassword()
    {
        return view('client.change-password');
    }

    public function userUpdate(Request $request, $email)
    {
        if (Auth::user()->email != $email) {
            return abort(401);
        }
        $validate = $request->validate([
            'full_name' => 'required|max:50',
            'phone_number' => 'required|numeric|digits:10',
            'address' => 'required',
        ], [
            'full_name.required' => 'Vui lòng nhập trường này',
            'phone_number.numeric' => 'Vui lòng nhập đúng định dạng',
            'phone_number.required' => 'Vui lòng nhập trường này',
            'phone_number.digits' => 'Vui lòng nhập đúng định dạng. :digits số!',
            'full_name.max' => 'Tối đa :max kí tự',
            'address.required' => 'Vui lòng nhập trường này',
        ]);
        $check = User::where('email', $email)->update($validate);
        if ($check) {
            return back()->with('msgSuccess', 'Cập nhật thành công');
        }
        return back()->with('msgError', 'Cập nhật thất bại!');
    }

    public function tour(Request $request)
    {
        $result = Tour::query();

        if ($request->has('keywords') && $request->keywords != null) {
            $result->where('title', 'like', '%' . $request->keywords . '%');
        }
        if ($request->has('price') && $request->price != null) {
            $result->where('price_large', '<=', $request->price)->orWhere('price_small', '<=', $request->price);
        }
        if ($request->has('destination') && $request->destination != null) {
            $result->where('destination_id', '=', $request->destination);
        }
        if ($request->has('date_of_department') && $request->date_of_department != null) {
            $result->whereDate('date_of_department', '<=', $request->date_of_department);
        }
        $tours = $result->OrderBy('created_at', 'DESC')->paginate(10);

        // Log or display the queries
        return view('client.tour', compact('tours'));
    }

    public function favouriteTour(Request $request)
    {

        $data = FavouriteTour::where('userID', Auth::id())->OrderBy('created_at', 'DESC')->paginate(10);
        $tours = [];
        foreach ($data as $item) {
            $tours[] = $item->tour;
        }
        return view('client.favourite-tours', compact('data', 'tours'));
    }
    public function addFavourite(Request $request)
    {
        if ($request->has('slug')) {
            $checkTour = Tour::where('slug', $request->slug)->first();
            if (!$checkTour) {
                return false;
            }
            $checkTourExist = FavouriteTour::where('userID', Auth::id())->where('tourID', $checkTour->id)->first();
            if (!$checkTourExist) {
                return FavouriteTour::insert(['userID' => Auth::id(), 'tourID' => $checkTour->id]);
            } else {
                return true;
            }
            return false;
        }
    }
    public function removeFavourite(Request $request)
    {
        if ($request->has('slug')) {
            $checkTour = Tour::where('slug', $request->slug)->first();
            if (!$checkTour) {
                return false;
            }
            return FavouriteTour::where('userID', Auth::id())->where('tourID', $checkTour->id)->delete();
        }
        return false;
    }
    public function tourDetail($slug)
    {
        $tour = Tour::where('slug', $slug)->first();
        $related = Tour::where('slug', '<>', $slug)->where('destination_id', '=', $tour->destination_id)->limit(3)->get();
        return view('client.tour-single', compact('tour', 'related'));
    }

    public function bookTour($slug)
    {
        $tour = Tour::where('slug', $slug)->first();
        return view('client.book-tour', compact('tour'));
    }

    public function hanldeBookTour(Request $request, $slug)
    {
        $validate = $request->validate([
            'full_name' => 'required|max:50',
            'email' => 'required|email',
            'phone_number' => 'required|numeric|digits:10',
            'address' => 'required',
            'adult' => 'required|numeric|integer',
        ], [
            'tourId.required' => 'Vui lòng nhập trường này',
            'adult.numeric' => 'Bắt buộc phải là số nguyên',
            'adult.required' => 'Vui lòng nhập trường này',
            'adult.integer' => 'Bắt buộc phải là số nguyên',
            'full_name.required' => 'Vui lòng nhập trường này',
            'full_name.max' => 'Tối đa :max kí tự',
            'phone_number.numeric' => 'Vui lòng nhập đúng định dạng',
            'phone_number.required' => 'Vui lòng nhập trường này',
            'phone_number.digits' => 'Vui lòng nhập đúng định dạng. :digits số!',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập đúng định dạng',
            'address.required' => 'Vui lòng cung cấp địa chỉ!',
        ]);
        $validate['children'] = $request->children ? $request->children : 0;

        $checkTourExist = Tour::where('slug', $slug)->first();
        if (!$checkTourExist) {
            return back()->with('msgError', 'Chuyến đi không tồn tại!');
        }
        if (($request->adult + $request->children) > $checkTourExist->avaiable) {
            return back()->with('msgError', 'Chỉ còn ' . $checkTourExist->avaiable . ' chỗ trống ');
        }
        $total = ($request->adult * $request->price_large) + ($request->children * $request->price_small);
        if ($checkTourExist->sale > 0) {
            $total = ((100 - $checkTourExist->sale )/100) * $total;
        }

        $validate['tourId'] = $checkTourExist->id;
        $validate['user_id'] = Auth::user()->id;
        $validate['price_large'] = $request->price_large;
        $validate['price_small'] = $request->price_small;
$validate['sale'] = $checkTourExist->sale;
        $validate['notes'] = $request->notes;
        $validate['status'] = 1;
        $validate['total'] = $total;
        $check = BookTour::insert($validate);
        if ($check) {
            return redirect()->route('client.booking-success');
        }
        return back()->with('msgError', 'Đặt tour thất bại!');
    }

    public function bookingSuccess()
    {
        return view('client.booking-success');
    }

    public function aboutUs()
    {
        return view('client.about');
    }

    public function login()
    {
        return view('client.login');
    }

    public function register()
    {
        return view('client.register');
    }

    public function handleRegister(Request $request)
    {
        $validate = $request->validate([
            'full_name' => 'required|max:50',
            'phone_number' => 'required|numeric|digits:10',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ], [
            'full_name.required' => 'Vui lòng nhập trường này',
            'phone_number.numeric' => 'Vui lòng nhập đúng định dạng',
            'phone_number.required' => 'Vui lòng nhập trường này',
            'phone_number.digits' => 'Vui lòng nhập đúng định dạng. :digits số!',
            'full_name.max' => 'Tối đa :max kí tự',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập đúng định dạng',
            'email.unique' => 'Email này đã được sử dụng',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải lớn hơn hoặc bằng :min kí tự',
            'password.confirmed' => 'Xác nhận trường mật khẩu không khớp.',
            'password_confirmation.required' => 'Vui lòng xác nhận mật khẩu',
            'password_confirmation.min' => 'Mật khẩu phải lớn hơn hoặc bằng :min kí tự',
        ]);
        $validate['group_id'] = 2;
        $validate['password'] = Hash::make($validate['password']);

        unset($validate['password_confirmation']);
        $check = User::insert($validate);
        if ($check) {
            session()->put('email-account', $request->email);
            return redirect()->route('client.login');
        }
        return back()->with('msgError', 'Tạo tài khoản không thành công!');
    }

    public function handleLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập đúng định dạng',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ]);
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->route('client.index');
        }

        return back()->withErrors([
            'password' => 'Tài khoản hoặc mật khẩu chưa chính xác!',
        ])->onlyInput('password');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('client.login');
    }

    public function handleChangePassword(Request $request, $email)
    {
        if (Auth::user()->email != $email) {
            return abort(401);
        }
        $request->validate([
            'currentPassword' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ], [
            'currentPassword.required' => 'Vui lòng nhập trường này!',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải lớn hơn hoặc bằng :min kí tự',
            'password.confirmed' => 'Xác nhận trường mật khẩu không khớp.',
            'password_confirmation.required' => 'Vui lòng xác nhận mật khẩu',
            'password_confirmation.min' => 'Mật khẩu phải lớn hơn hoặc bằng :min kí tự',
        ]);
        $user = User::where('email', $email)->first();

        if (Hash::check($request->currentPassword, $user->password)) {
            $check = User::where('email', $email)->update(['password' => Hash::make($user->password)]);
            if ($check) {
                return back()->with('msgSuccess', 'Đổi mật khẩu thành công');
            }
            return back()->with('msgError', 'Đổi mật khẩu thất bại!');
        } else {
            return back()->with('msgError', 'Mật khẩu hiện tại không đúng!');
        }
    }
}
