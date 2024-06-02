<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Merk;
use App\Models\Product;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // fetching transaction data grouped by day for the current month
        $transactionData = Transaksi::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->selectRaw('COUNT(*) as count, DAY(created_at) as day')
            ->groupBy('day')
            ->pluck('count', 'day');

        // dd("transactionData", $transactionData);

        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
        $dailyTransactionData = [];
        for ($i = 1; $i <= $daysInMonth; $i++) {
            $dailyTransactionData[$i] = $transactionData[$i] ?? 0;
        }

        // calculate profit
        $transactions = Transaksi::with('product')->get();
        // dd($transactions);

        $totalProfit = 0;
        $totalOriginalPrice = 0;
        $totalProductSold = 0;
        $totalTransaction = 0;
        $totalProduct = 0;

        // first foreach is iterating transactions
        // second foreach is iterating the product inside transactions
        foreach ($transactions as $transaction) {
            foreach ($transaction->product as $product) {

                $sellingPrice = $product->harga_jual;
                $originalPrice = $product->harga_asli;
                $profit = $sellingPrice - $originalPrice;

                $totalProfit += $profit;
                $totalOriginalPrice += $originalPrice;
                $totalProductSold += $product->pivot->quantity;
            }
        }
        $totalTransaction = sizeof($transactions) ?? 0;
        $totalProduct = Product::count() ?? 0;
        $totalCustomer = Customers::count() ?? 0;
        $totalCashier = User::where('role', 'kasir')->count() ?? 0;
        $totalMerk = Merk::count() ?? 0;

        $topProducts = Transaksi::with('product')
            ->select('product.id', 'product.product_name', 'product.img', 'merk.merk_name', DB::raw('SUM(detail_transaksi.quantity) as total_quantity_sold'))
            ->join('detail_transaksi', 'transaksi.id', '=', 'detail_transaksi.transaksi_id')
            ->join('product', 'detail_transaksi.product_id', '=', 'product.id')
            ->join('merk', 'product.merk_id', '=', 'merk.id')
            ->groupBy('product.id', 'product.product_name', 'product.img', 'merk.merk_name')
            ->orderByDesc('total_quantity_sold')
            ->limit(5)
            ->get();
        // dd("top products", $topProducts);
        // $topFiveProduct = Transaksi::with('product')
        // ->;
        // dd(User::where('role', 'kasir')->count());
        // dd($sellingPrice, $originalPrice, $profit, $totalProfit, $totalOriginalPrice, $totalProductSold, $totalProduct, $totalTransaction);
        // dd($totalOriginalPrice);

        // dd($transactions);

        // dd($dailyTransactionCounts);
        return view('admin.index', compact('dailyTransactionData', 'totalProfit', 'totalOriginalPrice', 'totalProductSold', 'totalTransaction', 'totalProduct', 'totalCustomer', 'totalCashier', 'totalMerk', 'topProducts'));
    }
}
