<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #007bff;
            color: #ffffff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            color: #007bff;
        }
    </style>
</head>
<body>
    <h1>History</h1>
    <table>
        <thead>
            <tr>
                <th>Transaction_id</th>
                <th>Name</th>
                <th>Credit_from</th>
                <th>Credit_Amount</th>
                <th>Debit_to</th>
                <th>Debit_Amount</th>
                <th>Existing_Amount</th>
                <th>Total_Balance</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>

        @foreach ($userHistory as $user)
            <tr>
                <td>{{$user->Transaction_id}}</td>
                <td>{{$user->Name}}</td>
                <td>{{$user->Credit_from ?? '-'}}</td>
                <td>₹{{$user->Credit_Amount ?? '-'}}</td>
                <td>{{$user->Debit_to ?? '-'}}</td>
                <td>₹{{$user->Debit_Amount ?? '-'}}</td>
                <td>₹{{$user->Existing_Amount}}</td>
                <td>₹{{$user->Total_Balance}}</td>
                <td>{{$user->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
