<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Laporan Penjualan - MIE AYAM WENGI'57</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: Arial, sans-serif; font-size: 11px; color: #333; line-height: 1.5; padding: 40px 35px; }
        .header { text-align: center; margin-bottom: 30px; padding-bottom: 20px; border-bottom: 3px solid #2563eb; }
        .header h1 { color: #2563eb; font-size: 24px; margin-bottom: 5px; }
        .header p { color: #666; font-size: 12px; }
        .period { background: #eff6ff; padding: 15px 20px; border-radius: 8px; margin-bottom: 25px; text-align: center; border: 1px solid #bfdbfe; }
        .period strong { color: #2563eb; }
        .summary-box { background: #2563eb; color: white; padding: 25px; border-radius: 10px; margin-bottom: 25px; text-align: center; }
        .summary-box h2 { font-size: 32px; margin-bottom: 5px; font-weight: bold; }
        .summary-box p { font-size: 12px; opacity: 0.9; }
        .stats-grid { display: table; width: 100%; margin-bottom: 30px; border-collapse: collapse; }
        .stats-grid tr td { width: 33.33%; padding: 15px; background: #f9fafb; border: 1px solid #e5e7eb; text-align: center; }
        .stats-grid tr td:first-child { border-left: none; }
        .stats-grid tr td:last-child { border-right: none; }
        .stats-grid .value { font-size: 18px; font-weight: bold; color: #2563eb; }
        .stats-grid .label { font-size: 11px; color: #666; margin-top: 5px; }
        .section { margin-bottom: 30px; }
        .section h3 { color: #2563eb; font-size: 14px; margin-bottom: 15px; padding-bottom: 8px; border-bottom: 2px solid #2563eb; }
        .table { width: 100%; border-collapse: collapse; margin-bottom: 15px; }
        .table th { background: #2563eb; color: white; padding: 12px 15px; text-align: left; font-size: 11px; }
        .table td { padding: 12px 15px; border-bottom: 1px solid #e5e7eb; font-size: 11px; }
        .table tr:nth-child(even) { background: #f9fafb; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .badge { display: inline-block; padding: 4px 12px; border-radius: 4px; font-size: 10px; font-weight: bold; }
        .badge-tunai { background: #dcfce7; color: #166534; }
        .badge-qris { background: #dbeafe; color: #1e40af; }
        .footer { margin-top: 40px; padding-top: 20px; border-top: 1px solid #e5e7eb; text-align: center; color: #666; font-size: 10px; }
        .empty { text-align: center; color: #999; padding: 30px; font-style: italic; font-size: 11px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>MIE AYAM WENGI'57</h1>
        <p>Laporan Penjualan</p>
    </div>

    <div class="period">
        <strong>Periode:</strong> {{ $from->translatedFormat('d F Y') }} s/d {{ $to->translatedFormat('d F Y') }}
    </div>

    <div class="summary-box">
        <h2>Rp {{ number_format($revenue, 0, ',', '.') }}</h2>
        <p>Total Pendapatan</p>
    </div>

    <table class="stats-grid">
        <tr>
            <td>
                <div class="value">{{ $count }}</div>
                <div class="label">Total Transaksi</div>
            </td>
            <td>
                <div class="value">{{ $itemsSold }}</div>
                <div class="label">Item Terjual</div>
            </td>
            <td>
                <div class="value">Rp {{ number_format($average, 0, ',', '.') }}</div>
                <div class="label">Rata-rata Transaksi</div>
            </td>
        </tr>
    </table>

    <div class="section">
        <h3>Pendapatan per Metode Pembayaran</h3>
        @if($paymentMethods->isNotEmpty())
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 30%;">Metode</th>
                    <th class="text-center" style="width: 35%;">Jumlah Transaksi</th>
                    <th class="text-right" style="width: 35%;">Total Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($paymentMethods as $method)
                <tr>
                    <td>
                        @if($method->payment_method === 'Tunai')
                            <span class="badge badge-tunai">TUNAI</span>
                        @else
                            <span class="badge badge-qris">QRIS</span>
                        @endif
                    </td>
                    <td class="text-center">{{ $method->transactions_count }} transaksi</td>
                    <td class="text-right">Rp {{ number_format($method->revenue, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="empty">Tidak ada data pembayaran</div>
        @endif
    </div>

    <div class="section">
        <h3>Menu Terlaris</h3>
        @if($bestSellers->isNotEmpty())
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center" style="width: 10%;">#</th>
                    <th style="width: 45%;">Nama Menu</th>
                    <th class="text-center" style="width: 20%;">Terjual</th>
                    <th class="text-right" style="width: 25%;">Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bestSellers as $index => $menu)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $menu->name }}</td>
                    <td class="text-center">{{ $menu->quantity }} item</td>
                    <td class="text-right">Rp {{ number_format($menu->revenue, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="empty">Tidak ada data menu</div>
        @endif
    </div>

    <div class="section">
        <h3>Ringkasan Harian</h3>
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 50%;">Tanggal</th>
                    <th class="text-right" style="width: 50%;">Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $day)
                <tr>
                    <td>{{ $day['label'] }}</td>
                    <td class="text-right">Rp {{ number_format($day['revenue'], 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="footer">
        <p>Dicetak pada {{ now()->translatedFormat('d F Y, H:i') }} WIB</p>
        <p>MIE AYAM WENGI'57 - Restaurant Management System</p>
    </div>
</body>
</html>
