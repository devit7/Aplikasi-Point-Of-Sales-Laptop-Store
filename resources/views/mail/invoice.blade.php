<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
</head>

<body style="background-color: #1C1D42; width: 100%; font-family: 'Poppins', sans-serif; padding: 2rem;">
    <div style="width: 400px; margin-left: auto; margin-right: auto; padding: 1.5rem; background-color: #fff; border-radius: 0.375rem; border-color: #cbd5e0;">
        <div style="text-align: center;">
            <img src="{{ asset('storage/logos/' . $details['toko']['logo_toko']) }}" alt="product"
                 style="width: 2.5rem; height: 2.5rem; margin-left: auto; margin-right: auto;">
            <p style="font-size: 1.125rem; font-weight: 600;">{{ $details['toko']['nama_toko'] }}</p>
            <p style="font-size: 0.875rem;">{{ $details['toko']['alamat'] }}</p>
            <p style="font-size: 0.875rem;">{{ $details['toko']['no_hp'] }}</p>
        </div>
        <div style="padding-bottom: 0.5rem; margin-top: 1rem; border-bottom: 1px dashed #cbd5e0;">
            <table width="100%">
                <tr>
                    <td>{{ \Carbon\Carbon::parse($details['created_at'])->format('d M Y') }}</td>
                    <td align="right">{{ \Carbon\Carbon::parse($details['created_at'])->format('H:i') }}</td>
                </tr>
                <tr>
                    <td>Transaksi</td>
                    <td align="right">{{ $details['invoice'] }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td align="right">Sukses</td>
                </tr>
            </table>
        </div>
        <div style="text-align: center; font-weight: 600; margin-top: 1rem;">
            Tipe Pesanan
        </div>
        <div style="padding-bottom: 0.5rem; margin-top: 0.5rem; border-bottom: 1px dashed #cbd5e0;">
            <table width="100%">
                <tr>
                    <td>Daftar Produk</td>
                </tr>
                @foreach ($details['product'] as $item)
                    <tr>
                        <td>{{ $item['product_name'] }}</td>
                    </tr>
                    <tr>
                        <td align="right">{{ $item['pivot']['quantity'] }} x Rp. @currency($item['harga_jual'])</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div style="padding-bottom: 0.5rem; margin-top: 1rem;">
            <table width="100%">
                <tr>
                    <td>Total</td>
                    <td align="right">Rp. @currency($details['total_semua'])</td>
                </tr>
                <tr>
                    <td>Metode Pembayaran</td>
                    <td align="right">{{ $details['payment']['payment_name'] }}</td>
                </tr>
            </table>
        </div>
        <div style="text-align: center; font-weight: 600; margin-top: 2.5rem;">
            <p>Terima Kasih</p>
            <p style="font-weight: 500;">Terus Laris Bersama {{ $details['toko']['nama_toko'] }}</p>
        </div>
    </div>
</body>

</html>
