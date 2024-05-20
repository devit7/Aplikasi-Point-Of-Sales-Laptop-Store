<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Merk;
use App\Models\Product;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        $totalTransaction = sizeof($transactions);
        $totalProduct = Product::count();
        $totalCustomer = Customers::count();
        $totalCashier = User::where('role', 'kasir')->count();
        $totalMerk = Merk::count();
        // $topFiveProduct = Transaksi::with('product')
        // ->;
        // dd(User::where('role', 'kasir')->count());
        // dd($sellingPrice, $originalPrice, $profit, $totalProfit, $totalOriginalPrice, $totalProductSold, $totalProduct, $totalTransaction);
        // dd($totalOriginalPrice);

        // dd($transactions);

        // dd($dailyTransactionCounts);
        return view('admin.index', compact('dailyTransactionData', 'totalProfit', 'totalOriginalPrice', 'totalProductSold', 'totalTransaction', 'totalProduct', 'totalCustomer', 'totalCashier', 'totalMerk'));
    }
}
