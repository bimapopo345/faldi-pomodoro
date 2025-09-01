<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
        }
        .header {
            background-color: #333;
            color: #fff;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h1 {
            margin: 0;
        }
        .sidebar {
            background-color: #f4f4f4;
            width: 250px;
            height: calc(100vh - 60px); /* 60px is header height */
            padding: 1rem;
            float: left;
        }
        .content {
            padding: 1rem;
            margin-left: 270px; /* 250px sidebar width + 20px margin */
        }
        .logout-form {
            margin: 0;
        }
        .logout-btn {
            background: none;
            border: none;
            color: #fff;
            cursor: pointer;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Dashboard</h1>
        <form class="logout-form" action="/logout" method="POST">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
    <div class="sidebar">
        <h2>Menu</h2>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Profile</a></li>
        </ul>
    </div>
    <div class="content">
        <h2>Welcome, {{ auth()->user()->name }}!</h2>
        <p>You are logged in as {{ auth()->user()->email }}.</p>
    </div>
</body>
</html>