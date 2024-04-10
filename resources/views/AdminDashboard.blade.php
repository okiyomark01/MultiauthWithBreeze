<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dash</title>
</head>
<body>
  <h1>This is admin dashborad</h1>

  <h1>Welcome {{ Auth::guard('admin')->user()->name }}</h1>
  <h1>Your email is -  {{ Auth::guard('admin')->user()->email }}</h1>
</body>
</html>