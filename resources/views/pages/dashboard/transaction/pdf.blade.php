<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
        <style>
        table {
        font-family: times-new-roman, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #eee;
        }
        </style>
</head>
<body>

        <table class="table-auto w-full">
            <tbody>
                <tr>
                    <th class="border px-6 px-4 text-right">Nama</th>
                    <td class="border px-6 py-4">{{ $transaction->user->name }}</td>
                </tr>
                <tr>
                    <th class="border px-6 px-4 text-right">Email</th>
                    <td class="border px-6 py-4">{{ $transaction->user->email }}</td>
                </tr>
                <tr>
                    <th class="border px-6 px-4 text-right">Alamat Lengkap</th>
                    <td class="border px-6 py-4">{{ $transaction->address }}</td>
                </tr>
                <tr>
                    <th class="border px-6 px-4 text-right">Total</th>
                    <td class="border px-6 py-4">Rp. {{ number_format($transaction->total_price + $transaction->shipping_price) }}</td>
                </tr>
                <tr>
                    <th class="border px-6 px-4 text-right">Status</th>
                    <td class="border px-6 py-4">{{ $transaction->status }}</td>
                </tr>
            </tbody>
        </table>

            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table border="1">
                        <thead>
                            <tr>
                                <th colspan="1">Barang yang dibeli :    </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaction->items as $row )
                            <tr>
                                <td>{{ $row->product->name }}</td>
                                <td>{{ $row->quantity }} pcs</td>  
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</body>
</html>