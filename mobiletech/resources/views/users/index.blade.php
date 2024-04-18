<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Users Index</title>
</head>
<body>
    <h1>Users Index</h1>
    <table>
    <tr><th>ID</th><th>Meno</th><th>Email</th></tr>
    @foreach($usersList as $user)
    <tr>
    <td>{{ $user->id }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    </tr>
    @endforeach
</table>
</body>
</html>