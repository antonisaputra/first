<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     $data = [
//         'title' => "Home"
//     ];
//     return view('home',  $data);
// });

Route::get('/', fn() => view('home', ['title' => 'Home']));


// Route::get('/about', function () {
//     $data = [
//         'name' => 'Antoni Saputra',
//         'email' => 'antonisaputra@gmail.com',
//         'title' => 'About'
//     ];
//     return view('about', $data);
// });

Route::view('/about', ('about'), ['name' => "Antoni saputra", 'email' => "antonisaputra@gmail.com", 'title' => 'About' ]);

Route::get('/category', function () {
    return view('categories', [
        'title' => 'Category',
        'categories' => Category::all()
    ]);
});

Route::get('/blog', [PostController::class, 'index']);
Route::get('/post/{post:slug}', [PostController::class, 'slug']);
// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('blog', [
//         'title' => "Categori By : $category->name",
//         'posts' => $category->post->load('author', 'category')
//     ]);
// });


// Route::get('/author/{author:username}', function (User $author) {
//     return view('blog', [
//         'title' => "Author By : $author->name",
//         'posts' => $author->post->load('author', 'category')
//     ]);
// });
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard/index', [
        'title' => 'Dashboard'
    ]);
})->middleware('auth');
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/post', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show');
Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');
