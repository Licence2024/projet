 <?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/thankyou', fn() => 'Merci de votre commande!');
Route::get('/checkout', [CheckoutController::class, 'create'])
    ->name('checkout.create');
Route::post('/paymentIntent', [CheckoutController::class, 'paymentIntent'])
    ->name('checkout.paymentIntent');
Route::resource('/products', ProductController::class);

Route::get('/shoppingCart', [CartController::class, 'index'])
    ->name('cart.index');

Route::resource('/orders', OrderController::class);

Route::get('/clear', function () {
    \Cart::session(auth()->user()->id)->clear();
});


Route::get('/dashboard', function () {
    $orders = auth()->user()->orders;
    return view('dashboard', compact('orders'));
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/add-product', function () {
        if(auth()->user()->admin==1){
            return view('products.add');
        }else{
            return redirect()->route("dashboard")->with('echec', "Vous n'etes pas l'administrateur");
        }
    })->middleware(['auth'])->name('product.add');

    Route::get('/admin-product', function () {
        if(auth()->user()->admin==1){
             $products = Product::inRandomOrder()
            ->whereActive(true)
            ->paginate(20)
            ;
            return view('products.admin', compact('products'));
        }else{
            return redirect()->route('dashboard')->with('echec', "Vous n'etes pas l'administrateur");
        }
    })->middleware(['auth'])->name('products.admin');

});
require __DIR__.'/auth.php';