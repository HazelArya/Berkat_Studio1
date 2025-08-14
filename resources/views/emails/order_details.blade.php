<!DOCTYPE html>
<html>
<head>
    <title>Detail Pesanan</title>
</head>
<body>
    <h2>Pesanan Anda Telah Dikonfirmasi!</h2>
    <p>Berikut adalah detail pesanan Anda:</p>
    <table>
        <tr>
            <th>Order ID:</th>
            <td>{{ $booking->id }}</td>
        </tr>
        <tr>
            <th>Package:</th>
            <td>
                @switch($booking->package_id)
                    @case(1)
                        Wedding Portrait Package
                        @break
                    @case(2)
                        Family Portrait Package
                        @break
                    @case(3)
                        Graduation Portrait Package
                        @break
                    @case(4)
                        Product Portrait Package
                        @break
                    @default
                        Unknown Package
                @endswitch
            </td>
        </tr>
        <tr>
            <th>Booking Date:</th>
            <td>{{ $booking->booking_date }}</td>
        </tr>
        <tr>
            <th>Time Slot:</th>
            <td>{{ $booking->time_slot }}</td>
        </tr>
        <tr>
            <th>Price:</th>
            <td>{{ number_format($booking->price, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Phone Number:</th>
            <td>{{ $booking->no_telp }}</td>
        </tr>
    </table>
</body>
</html>
