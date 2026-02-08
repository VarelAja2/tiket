<!DOCTYPE html>
<html>

<head>
    <title>Export Data Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            margin: 0;
            color: #333;
        }

        .header p {
            margin: 5px 0;
            color: #666;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background-color: #f3f4f6;
            text-align: left;
            padding: 10px;
            border: 1px solid #d1d5db;
        }

        td {
            padding: 10px;
            border: 1px solid #d1d5db;
        }

        .total {
            font-weight: bold;
            background-color: #f9fafb;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Laporan Data Booking</h1>
        <p>Tanggal Export: {{ now()->format('d F Y H:i') }}</p>
        <p>Total Data: {{ $bookings->count() }} booking</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Booking</th>
                <th>Nama Pemesan</th>
                <th>Event</th>
                <th>Tanggal Event</th>
                <th>Jumlah Tiket</th>
                <th>Total (Rp)</th>
                <th>Status</th>
                <th>Tanggal Booking</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $booking->booking_code }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->event->title }}</td>
                    <td>{{ $booking->event->event_date->format('d/m/Y') }}</td>
                    <td>{{ $booking->ticket_count ?? 1 }}</td>
                    <td>{{ number_format($booking->total_amount, 0, ',', '.') }}</td>
                    <td>{{ ucfirst($booking->status) }}</td>
                    <td>{{ $booking->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
            @if ($bookings->isNotEmpty())
                <tr class="total">
                    <td colspan="5">TOTAL</td>
                    <td>{{ $bookings->sum('ticket_count') }}</td>
                    <td>{{ number_format($bookings->sum('total_amount'), 0, ',', '.') }}</td>
                    <td colspan="2"></td>
                </tr>
            @endif
        </tbody>
    </table>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>

</html>
