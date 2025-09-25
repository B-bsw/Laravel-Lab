<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Lab Management</h1>
    <table border>
        <thead>
            <th>ID</th>
            <th>Lab Name</th>
            <th>Lab Abbreviation</th>
            <th>lacation</th>
        </thead>
        <tbody>
            @foreach ($labs as $db )
            <tr>
                <td>{{ $db->id }}</td>
                <td>{{ $db->lab_name }}</td>
                <td>{{ $db->abbreviation }}</td>
                <td>{{ $db->location }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>