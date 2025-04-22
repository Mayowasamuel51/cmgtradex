<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostTagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ShippingController;
use UniSharp\LaravelFilemanager\Lfm;

// ─── Utility Routes ──────────────────────────────────────────────────────────
Route::get('cache-clear', function () {
    Artisan::call('optimize:clear');
    session()->flash('success', 'Successfully cache cleared.');
    return back();
})->name('cache.clear');

Route::get('storage-link', [AdminController::class, 'storageLink'])->name('storage.link');

// ─── Auth ────────────────────────────────────────────────────────────────────
Auth::routes(['register' => false]);

Route::get('user/login', [FrontendController::class, 'login'])->name('login.form');
Route::post('user/login', [FrontendController::class, 'loginSubmit'])->name('login.submit');
Route::get('user/logout', [FrontendController::class, 'logout'])->name('user.logout');
Route::get('user/register', [FrontendController::class, 'register'])->name('register.form');
Route::post('user/register', [FrontendController::class, 'registerSubmit'])->name('register.submit');
Route::post('password-reset', [FrontendController::class, 'showResetForm'])->name('custom.password.reset');

// ─── Social Login ────────────────────────────────────────────────────────────
Route::get('login/{provider}', [LoginController::class, 'redirect'])->name('login.redirect');
Route::get('login/{provider}/callback', [LoginController::class, 'callback'])->name('login.callback');

// ─── Frontend ────────────────────────────────────────────────────────────────
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/home', [FrontendController::class, 'index']);
Route::get('/about-us', [FrontendController::class, 'aboutUs'])->name('about-us');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact/message', [MessageController::class, 'store'])->name('contact.store');

Route::get('/salesprouduct', [FrontendController::class, 'salesprouduct']);
Route::get('/cookingproduct', [FrontendController::class, 'cookingproduct']);
Route::get('/cookinghome', [FrontendController::class, 'cookinghome']);

// ─── Products ────────────────────────────────────────────────────────────────
Route::get('product-detail/{slug}', [FrontendController::class, 'productDetail'])->name('product-detail');
Route::post('/product/search', [FrontendController::class, 'productSearch'])->name('product.search');
Route::get('/product-cat/{slug}', [FrontendController::class, 'productCat'])->name('product-cat');
Route::get('/product-sub-cat/{slug}/{sub_slug}', [FrontendController::class, 'productSubCat'])->name('product-sub-cat');
Route::get('/product-brand/{slug}', [FrontendController::class, 'productBrand'])->name('product-brand');
Route::get('/product-grids', [FrontendController::class, 'productGrids'])->name('product-grids');
Route::get('/product-lists', [FrontendController::class, 'productLists'])->name('product-lists');
Route::match(['get', 'post'], '/filter', [FrontendController::class, 'productFilter'])->name('shop.filter');

// ─── Cart ────────────────────────────────────────────────────────────────────
Route::get('/add-to-cart/{slug}', [CartController::class, 'addToCart'])->name('add-to-cart')->middleware('user');
Route::post('/add-to-cart', [CartController::class, 'singleAddToCart'])->name('single-add-to-cart')->middleware('user');
Route::get('/cart', fn() => view('frontend.pages.cart'))->name('cart');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout')->middleware('user');
Route::get('cart-delete/{id}', [CartController::class, 'cartDelete'])->name('cart-delete');
Route::post('cart-update', [CartController::class, 'cartUpdate'])->name('cart.update');
Route::post('cart/order', [OrderController::class, 'store'])->name('cart.order');

// ─── Wishlist ────────────────────────────────────────────────────────────────
Route::get('/wishlist', fn() => view('frontend.pages.wishlist'))->name('wishlist');
Route::get('/wishlist/{slug}', [WishlistController::class, 'wishlist'])->name('add-to-wishlist')->middleware('user');
Route::get('wishlist-delete/{id}', [WishlistController::class, 'wishlistDelete'])->name('wishlist-delete');

// ─── Orders ──────────────────────────────────────────────────────────────────
Route::get('order/pdf/{id}', [OrderController::class, 'pdf'])->name('order.pdf');
Route::get('/income', [OrderController::class, 'incomeChart'])->name('product.order.income');
Route::get('/product/track', [OrderController::class, 'orderTrack'])->name('order.track');
Route::post('product/track/order', [OrderController::class, 'productTrackOrder'])->name('product.track.order');

// ─── Blog ────────────────────────────────────────────────────────────────────
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/blog-detail/{slug}', [FrontendController::class, 'blogDetail'])->name('blog.detail');
Route::get('/blog/search', [FrontendController::class, 'blogSearch'])->name('blog.search');
Route::post('/blog/filter', [FrontendController::class, 'blogFilter'])->name('blog.filter');
Route::get('blog-cat/{slug}', [FrontendController::class, 'blogByCategory'])->name('blog.category');
Route::get('blog-tag/{slug}', [FrontendController::class, 'blogByTag'])->name('blog.tag');

// ─── Review & Comments ───────────────────────────────────────────────────────
Route::resource('/review', ProductReviewController::class);
Route::post('product/{slug}/review', [ProductReviewController::class, 'store'])->name('review.store');
Route::post('post/{slug}/comment', [PostCommentController::class, 'store'])->name('post-comment.store');
Route::resource('/comment', PostCommentController::class);

// ─── Others ──────────────────────────────────────────────────────────────────
Route::post('/coupon-store', [CouponController::class, 'couponStore'])->name('coupon-store');
Route::post('/subscribe', [FrontendController::class, 'subscribe'])->name('subscribe');
Route::get('/hey', fn() => 'Hello, can you hear me out?');

// ─── Payment ─────────────────────────────────────────────────────────────────
Route::get('payment', [PayPalController::class, 'payment'])->name('payment');
Route::get('cancel', [PayPalController::class, 'cancel'])->name('payment.cancel');
Route::get('payment/success', [PayPalController::class, 'success'])->name('payment.success');

// ─── Admin Routes ────────────────────────────────────────────────────────────
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::view('/file-manager', 'backend.layouts.file-manager')->name('file-manager');

    Route::resources([
        'users' => UsersController::class,
        'banner' => BannerController::class,
        'brand' => BrandController::class,
        'category' => CategoryController::class,
        'product' => ProductController::class,
        'post-category' => PostCategoryController::class,
        'post-tag' => PostTagController::class,
        'post' => PostController::class,
        'message' => MessageController::class,
        'order' => OrderController::class,
        'shipping' => ShippingController::class,
        'coupon' => CouponController::class,
    ]);

    Route::post('/category/{id}/child', [CategoryController::class, 'getChildByParent']);
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin-profile');
    Route::post('/profile/{id}', [AdminController::class, 'profileUpdate'])->name('profile-update');
    Route::get('settings', [AdminController::class, 'settings'])->name('settings');
    Route::post('setting/update', [AdminController::class, 'settingsUpdate'])->name('settings.update');

    Route::get('/notifications', [NotificationController::class, 'index'])->name('all.notification');
    Route::get('/notification/{id}', [NotificationController::class, 'show'])->name('admin.notification');
    Route::delete('/notification/{id}', [NotificationController::class, 'delete'])->name('notification.delete');

    Route::get('change-password', [AdminController::class, 'changePassword'])->name('change.password.form');
    Route::post('change-password', [AdminController::class, 'changPasswordStore'])->name('change.password');

    Route::get('/message/five', [MessageController::class, 'messageFive'])->name('messages.five');
});

// ─── User Routes ─────────────────────────────────────────────────────────────
Route::prefix('user')->middleware(['user'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('user');
    Route::get('/profile', [HomeController::class, 'profile'])->name('user-profile');
    Route::post('/profile/{id}', [HomeController::class, 'profileUpdate'])->name('user-profile-update');

    Route::get('/order', [HomeController::class, 'orderIndex'])->name('user.order.index');
    Route::get('/order/show/{id}', [HomeController::class, 'orderShow'])->name('user.order.show');
    Route::delete('/order/delete/{id}', [HomeController::class, 'userOrderDelete'])->name('user.order.delete');

    Route::get('/user-review', [HomeController::class, 'productReviewIndex'])->name('user.productreview.index');
    Route::get('/user-review/edit/{id}', [HomeController::class, 'productReviewEdit'])->name('user.productreview.edit');
    Route::patch('/user-review/update/{id}', [HomeController::class, 'productReviewUpdate'])->name('user.productreview.update');
    Route::delete('/user-review/delete/{id}', [HomeController::class, 'productReviewDelete'])->name('user.productreview.delete');

    Route::get('user-post/comment', [HomeController::class, 'userComment'])->name('user.post-comment.index');
    Route::get('user-post/comment/edit/{id}', [HomeController::class, 'userCommentEdit'])->name('user.post-comment.edit');
    Route::patch('user-post/comment/update/{id}', [HomeController::class, 'userCommentUpdate'])->name('user.post-comment.update');
    Route::delete('user-post/comment/delete/{id}', [HomeController::class, 'userCommentDelete'])->name('user.post-comment.delete');

    Route::get('change-password', [HomeController::class, 'changePassword'])->name('user.change.password.form');
    Route::post('change-password', [HomeController::class, 'changPasswordStore'])->name('change.password');
});

// ─── File Manager ────────────────────────────────────────────────────────────
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    Lfm::routes();
});
