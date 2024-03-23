<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking Interface</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff; /* Background color for the container */
            border: 2px solid #3498db; /* Border color */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            position: relative;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        h2 {
            color: #333;
        }

        .accountant {
            color: #008080; /* Teal color */
            font-size: 18px;
            margin-bottom: 10px;
        }

        .options {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .balance {
            margin-top: 20px;
            color: #4CAF50; /* Green color */
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        .transfer {
            display: flex;
            flex-direction: column;
        }

        .logout-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 8px 12px;
            background-color: #e74c3c; /* Red color */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>


<!-- user logout  -->

<button class="logout-btn" onclick="window.location.href='{{ route('user.logout')}}'">Logout</button>

    <h1>Welcome, {{$user['name']}}</h1>

    <div class="container">
        <h2>Banking Interface</h2>
        
        <div class="accountant">
            Accountant: {{$user['name']}}
        </div>

        <!-- action to be performed on money add and  sending userdata to controller-->
        <form action="{{ route('user.AddMoneyForm', $user) }}" method="post">
         @csrf
         <div class="options">
            <button class="button">Add Money</button>
        </div>
        </form>

        <form action="{{ route('user.WithdrawMoneyForm', $user) }}" method="post">
         @csrf
         <div class="options">
            <button class="button">Withdraw Money</button>
        </div>
        </form>

        <form action="{{ route('user.TransferMoneyForm', $user) }}" method="post">
         @csrf
         <div class="options">
            <button class="button">Transfer Money</button>
        </div>
        </form>

        <form action="{{ route('user.history', $user) }}" method="post">
         @csrf
         <div class="options">
            <button class="button">History</button>
        </div>
        </form>

        


        <div class="balance" id="balance">
            Balance: ₹{{$user['Balence']}} <!-- Replace with actual balance -->
        </div>

        <div class="transfer" id="transferForm" style="display: none;">
            <label for="recipient">Recipient:</label>
            <input type="text" id="recipient" placeholder="Enter recipient">

            <label for="amount">Amount:</label>
            <input type="number" id="amount" placeholder="Enter amount">

            <button class="button">Confirm Transfer</button>
        </div>
    </div>
</body>
</html>
