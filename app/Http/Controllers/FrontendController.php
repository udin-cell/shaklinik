<?php

namespace App\Http\Controllers;

use Exception;
use Midtrans\Snap;
use App\Models\Cart;
use Midtrans\Config;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CheckoutRequest;
use App\Models\Booking;
use App\Models\Bookingtreatmen;
use App\Models\BookingtreatmenItem;
use App\Models\Category;
use App\Models\Categorytreatmen;
use App\Models\DaftarTunggu;
use App\Models\Testimoni;
use App\Models\TransactionItem;
use App\Models\Treatmen;
use Carbon\Carbon;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with(['galleries'])->latest()->get();
        $treatments = Treatmen::with('bagian')->latest()->get();
        $categoryproducts = Category::all();
        $categorytreatments = Categorytreatmen::all();
        $products = Product::all();
        $treatments = Treatmen::all();
        $testimonis = Testimoni::all();
        return view('pages.frontend.index', compact('products', 'treatments', 'categoryproducts', 'categorytreatments', 'testimonis', 'products', 'treatments'));
    }

    public function category()
    {
        $products = Product::with(['galleries'])->latest()->get();
        $category = Category::all();
        return view('pages.frontend.category', compact('products', 'category'));
    }

    public function categorytreatmen()
    {
        $treatmen = Treatmen::all();
        $category = Categorytreatmen::all();
        return view('pages.frontend.categorytreatmen', compact('treatmen', 'category'));
    }

    public function contact()
    {
        return view('pages.frontend.contact');
    }



    public function treatmendetails(Request $request, $id)
    {
        $treatment = Treatmen::with('bagian')->where('id', $id)->firstOrFail();
        $recommendations = Treatmen::with(['bagian'])->inRandomOrder()->limit(4)->get();
        return view('pages.frontend.treatmendetails', compact('treatment', 'recommendations'));
    }

    public function details(Request $request, $slug)
    {
        $product = Product::with(['galleries'])->where('slug', $slug)->firstOrFail();
        $recommendations = Product::with(['galleries'])->inRandomOrder()->limit(4)->get();

        return view('pages.frontend.details', compact('product', 'recommendations'));
    }



    public function cartAdd(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        Cart::create([
            'users_id' => Auth::user()->id,
            'quantity' => $request->quantity,
            'products_id' => $id,
            'total_harga' => $product->price * $request->quantity,
        ]);

        return redirect('cart');
    }

    public function cartDelete(Request $request, $id)
    {
        $item = Cart::findOrFail($id);

        $item->delete();

        return redirect('cart');
    }
    public function cartEdit(Request $request, $id)
    {
        $item = Cart::findOrFail($id);
        $item->update([
            'quantity' => $request->quantity,
            'total_harga' => $item->product->price * $request->quantity,
        ]);


        return redirect('cart')->with('warning', 'Produk Telah Di Rubah Dalam Keranjang');
    }

    public function cart(Request $request)
    {
        $carts = Cart::with(['product.galleries'])->where('users_id', Auth::user()->id)->get();

        return view('pages.frontend.cart', compact('carts'));
    }


    public function bookingAdd(Request $request, $id)
    {
        $treatmen = Treatmen::findOrFail($id);
        Booking::create([
            'users_id' => Auth::user()->id,
            'quantity' => $request->quantity,
            'treatmens_id' => $id,
            'total_harga' => $treatmen->tarif * $request->quantity,
        ]);

        return redirect('bookingcart');
    }

    public function bookingDelete(Request $request, $id)
    {
        $item = Booking::findOrFail($id);

        $item->delete();

        return redirect('bookingcart');
    }
    public function bookingEdit(Request $request, $id)
    {
        $item = Booking::findOrFail($id);
        $item->update([
            'quantity' => $request->quantity,
            'total_harga' => $item->treatmen->tarif * $request->quantity,
        ]);

        return redirect('bookingcart')->with('warning', 'Produk Telah Di Rubah Dalam Keranjang');
    }
    public function bookingcart()
    {
        $booking = Booking::with(['treatmen'])->where('users_id', Auth::user()->id)->get();
        return view('pages.frontend.booking', compact('booking'));
    }

    public function bookingdetail()
    {
        $bookings = Booking::with(['treatmen'])->where('users_id', Auth::user()->id)->get();
        return view('pages.frontend.bookingdetail', compact('bookings'));
    }


    public function checkoutdetail(Request $request)
    {
        $carts = Cart::with(['product.galleries'])->where('users_id', Auth::user()->id)->get();

        return view('pages.frontend.checkout', compact('carts'));
    }

    public function bookingout(Request $request)
    {
        $data = $request->all();

        // Get Carts data
        $carts = Booking::with(['treatmen'])->where('users_id', Auth::user()->id)->get();

        // Add to Transaction data
        $noKode = rand(1111, 9999);
        $data['kode'] =  "INVB-" . $noKode;
        $data['users_id'] = Auth::user()->id;
        $data['total_price'] = $carts->sum('total_harga');

        // Create Booking
        $booking = Bookingtreatmen::create($data);

        // Create Transaction item
        foreach ($carts as $cart) {
            $items[] = BookingtreatmenItem::create([
                'bookingtreatmens_id' => $booking->id,
                'users_id' => $cart->users_id,
                'treatments_id' => $cart->treatmens_id,
                'quantity' => $cart->quantity,
            ]);
        }

        $items = [];
        foreach ($carts as $cart) {
            $item = [
                'id' => $cart->treatmen->id,
                'price' => $cart->treatmen->tarif,
                'quantity' => $cart->quantity,
                'name' => $cart->treatmen->nama_jasa,
            ];
            $items[] = $item;
        }

        // Delete cart after transaction
        Booking::where('users_id', Auth::user()->id)->delete();

        // Konfigurasi midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // Setup midtrans variable
        $midtrans = [
            'transaction_details' => [
                'order_id' => $booking->kode,
                'gross_amount' => (int) $booking->total_price,
            ],
            'item_details' => $items,
            'customer_details' => [
                'first_name'    => $booking->user->name,
                'billing_address' => [
                    'address' => $booking->address,
                ],
            ],
            'enabled_payments' => [
                'gopay',
                'shopeepay',
                'bank_transfer',
                'GOPAY_WALLET',
                'cstore',
            ],
            'vtweb' => [],
        ];

        try {
            // Ambil halaman payment midtrans
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

            $booking->payment_url = $paymentUrl;
            $booking->save();

            // Redirect ke halaman midtrans
            return redirect($paymentUrl);
        } catch (Exception $e) {
            return $e;
        }
    }

    public function checkout(CheckoutRequest $request)
    {
        $data = $request->all();

        // Get Carts data
        $carts = Cart::with(['product'])->where('users_id', Auth::user()->id)->get();
        $tgl = Carbon::now();

        // Add to Transaction data
        $noKode = rand(1111, 9999);
        $data['kode_inv'] = "INVP-" . $noKode;
        $data['tgl'] = $tgl;
        $data['users_id'] = Auth::user()->id;
        $data['total_price'] = $carts->sum('total_harga');

        // Create Transaction
        $transaction = Transaction::create($data);

        // Create Transaction items and update product stock
        foreach ($carts as $cart) {
            TransactionItem::create([
                'transactions_id' => $transaction->id,
                'users_id' => $cart->users_id,
                'products_id' => $cart->products_id,
                'quantity' => $cart->quantity,
            ]);

            $product = Product::find($cart->products_id);
            $product->stock -= $cart->quantity;
            $product->save();
        }

        // Prepare items for midtrans
        $items = [];
        foreach ($carts as $cart) {
            $item = [
                'id' => $cart->product->id,
                'price' => $cart->product->price,
                'quantity' => $cart->quantity,
                'name' => $cart->product->name,
            ];
            $items[] = $item;
        }

        // Delete cart after transaction
        Cart::where('users_id', Auth::user()->id)->delete();

        // Configure Midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // Setup Midtrans variables
        $midtrans = [
            'transaction_details' => [
                'order_id' => $transaction->kode_inv,
                'gross_amount' => (int) $transaction->total_price,
            ],
            'item_details' => $items,
            'customer_details' => [
                'first_name'    => $transaction->user->name,
                'billing_address' => [
                    'address' => $transaction->address,
                ],
            ],
            'enabled_payments' => [
                'gopay',
                'shopeepay',
                'bank_transfer',
                'GOPAY_WALLET',
                'cstore',
            ],
            'vtweb' => [],
        ];

        try {
            // Get Midtrans payment page
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

            $transaction->payment_url = $paymentUrl;
            $transaction->save();

            // Redirect to Midtrans payment page
            return redirect($paymentUrl);
        } catch (Exception $e) {
            return $e;
        }
    }

    public function success(Request $request)
    {
        return view('pages.frontend.success');
    }

    public function checkjadwal(Request $request)
    {


        $searchKeyword = $request->input('search_keyword');

        // Lakukan pencarian kode jadwal di database
        $results = DaftarTunggu::where('kode_jadwal', $searchKeyword)->get();

        // Kirim hasil pencarian ke halaman view 'pages.frontend.checkjadwal'
        return view('pages.frontend.checkjadwal', compact('results'));
    }

    public function checkinvoice(Request $request)
    {
        $searchKeyword = $request->input('search_keyword');

        $result = Transaction::where('kode_inv', $searchKeyword)->first();

        if ($result) {
            // Dapatkan item transaksi hanya jika $result tidak null
            $items = Transactionitem::where('transactions_id', $result->id)->get();
        } else {
            // Jika hasil pencarian tidak ditemukan, tetapkan $items sebagai null
            $items = null;
        }
        return view('pages.frontend.checkinvoice', compact('result', 'items'));
    }


    public function storeTestimoni(Request $request)
    {

        $validatedData = $request->validate([
            'users_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'treatmen_id' => 'required|exists:treatmens,id',
            'foto_before' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:25000',
            'foto_after' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:25000',
            'testimoni_text' => 'required|string|max:500',
        ]);


        if ($request->hasFile('foto_before')) {
            $fotoBeforePath = $request->file('foto_before')->store('testimoni/foto_before', 'public');
            $validatedData['foto_before'] = $fotoBeforePath;
        }

      
        if ($request->hasFile('foto_after')) {
            $fotoAfterPath = $request->file('foto_after')->store('testimoni/foto_after', 'public');
            $validatedData['foto_after'] = $fotoAfterPath;
        }

    
        Testimoni::create($validatedData);

        return redirect()->back()->with('success', 'Testimoni berhasil ditambahkan!');
    }
}
