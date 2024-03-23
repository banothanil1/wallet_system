<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transfer Money Form</title>
    <!-- Add your CSS styling or link to a stylesheet if needed -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<form action="{{ route('user.TranferMoney',$user) }}" method="post">
    @csrf
    
    <label for="amount">Transfer Amount</label>
    <input type="numeric" id="amount" name="amount" placeholder="Enter the amount" >
    <span class="text-danger">@error('amount') {{$message}} @enderror</span><br>

    <label for="recipientName">Recipient's Name</label>
    <input type="text" id="recipientName" name="recipientName" placeholder="Enter recipient's name" >
    <span class="text-danger">@error('recipientName') {{$message}} @enderror</span>

    <label for="recipientPassword">Recipient's Password</label>
    <input type="password" id="recipientPassword" name="recipientPassword" placeholder="Enter recipient's password" >
    <span class="text-danger">@error('recipientPassword') {{$message}} @enderror</span>

    <button type="submit">Transfer Money</button>
</form>

</body>
</html>
