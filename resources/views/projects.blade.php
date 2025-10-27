<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/project.css') }}">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Delius&display=swap");

        * {
            font-family: "Delius", cursive;
            font-weight: 400;
            font-style: normal;

        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="list">List of Projects</h1>
        <a href="/projects/create" class="btn btn-primary my-4">
            Add Project
        </a>
        <table class="table table-hover table-bordered"">
            <thead>
                <th>No.</th>
                <th>Project Name</th>
                <th>Budget (THB)</th>
                <th>Lab abbreviation</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($project as $pj)
                    <tr>
                        <td>{{ $pj->id }}</td>
                        <td>{{ $pj->project_name }}</td>
                        <td>{{ $pj->budget, 2 }}</td>
                        <td>{{ $pj->labs->abbreviation }}</td>
                        <td>
                            <a href="projects/{{ $pj->id }}" class="btn btn-outline-primary">Edit</a>
                            <a href="{{ route('projects.destroy', ['id' => $pj->id] ) }}"
                                onclick="return confirm('Are you sure?')" class="btn btn-outline-primary">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <form action="/restore" method="get">
                <input type="submit" value="restore" class="btn btn-outline-primary">
            </form>
        </div>
    </div>
</body>

</html>
