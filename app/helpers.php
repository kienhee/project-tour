<?php

use App\Models\BookTour;
use App\Models\Category;
use App\Models\Destination;
use App\Models\Group;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Tour;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;

function getAllGroups()
{
    return Group::all();
}
function getAllCategories()
{
    return Category::all();
}
function getAllDestination()
{
    return Destination::OrderBy('created_at', 'DESC')->paginate(10);
}
function getAllTour()
{
    return Tour::OrderBy('created_at', 'DESC')->get();
}
function getAllVehicle()
{
    return Vehicle::OrderBy('created_at', 'DESC')->get();
}

function getAllTags()
{
    return Tag::all();
}
function getAllBlogs (){
    return Post::orderBy('created_at','DESC')->limit(3)->get();}
function getHistoryBookTour()
{
    return BookTour::OrderBy('created_at', 'DESC')->where('user_id', Auth::user()->id)->get();
}

function nightOfDay($start_date, $end_date)
{
    $startDate = strtotime($start_date);
    $endDate = strtotime($end_date);
    $numberOfSeconds = $endDate - $startDate;
    $numberOfDays = floor($numberOfSeconds / (60 * 60 * 24)); // 1 ngày = 60 giờ * 60 phút * 24 giây
    $numberOfNights = ceil($numberOfDays); // Giả sử mỗi ngày kết thúc lúc 00:00
    return $numberOfDays . ' Ngày ' . $numberOfNights . ' Đêm';
}
function menuSelect($menu, $parent = 0, $level = 0)
{

    if ($menu->count() > 0) {
        $result = [];
        foreach ($menu as $key => $category) {
            if ($category['category_id'] == $parent) {
                $category['level'] = $level;
                $result[] = $category;
                unset($menu[$category['id']]);
                $child = menuSelect($menu, $category['id'], $level + 1);
                $result = array_merge($result, $child);
            }
        }
        return $result;
    }
}

function menuTreeCategory($menu, $parentId = 0)
{
    if ($menu->count() > 0) {
        foreach ($menu as $key => $category) {
            if ($category['category_id'] == $parentId) {
                echo '<li><a class="d-flex justify-content-between" href ="' . route('dashboard.category.edit', $category['id']) . '" title="Click xem thêm"> <span>' . $category['name'] . '</span> </a>';
                echo '<ul >';
                unset($menu[$category['id']]);
                echo menuTreeCategory($menu, $category['id']);
                echo "</ul>";
                echo "</li>";
                echo "</li>";
            }
        }
    }
}
