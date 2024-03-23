<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Money Form</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f0f0f0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    .add-money-form {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .form-input {
      width: 80%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .add-money-btn {
      background-color: #4caf50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    .add-money-btn:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

  <div class="add-money-form">
    <h2>Add Money</h2>
    <form action="{{route('user.AddMoney',$user)}}" method="post">
        @csrf
      <input type="text" class="form-input" placeholder="Enter money" name="amount" ><br>
      <!-- error messaged on screen -->
      <span class="text-danger">@error('amount') {{$message}} @enderror</span><br>
      <button type="text" class="add-money-btn">Add</button>
    </form>
    
  </div>
</body>
</html>
