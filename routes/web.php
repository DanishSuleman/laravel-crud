<?php
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Post;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", function () {
$posts = [];
if(auth()->check()) {
    $posts = auth()->user()->userPost()->latest()->get();
}


return view("index", ['posts' => $posts]);
});
// User Routes
Route::post("/register", [UserController::class, "register"]);
Route::post("/logout", [UserController::class, "logout"]);
Route::post("/login", [UserController::class, "login"]);
// Posts Routes
Route::post("/create-post", [PostController::class, "createPost"]);
Route::get("/edit-post/{post}", [PostController::class, "editPost"]);
Route::put("/edit-post/{post}", [PostController::class, "updatePost"]);
