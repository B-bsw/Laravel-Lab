<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url("{{ asset('css/project.css') }}");
    </style>
</head>

<body>
    <h1>{{ $title }} Project</h1>

    @if($title === "Add")
    <form action="/projects/create" method="post">
        @else
        <form action="/projects/edit/{{ $projects->id }}" method="post">
            @endif
            @csrf
            @if ($title === 'Add')
            <div>Project Name: <input type="text" name="name" required></div>
            <div>Budget (THB): <input type="number" name="budget" required></div>
            <div>Lab Abbreviation: <select name="labAb">
                    @foreach ($labs as $lab)
                    <option value={{ $lab->id }}>{{ $lab->abbreviation }}</option>
                    @endforeach
                </select>
            </div>
            @else
            <div>Project Name: <input class="edit_input" type="text" name="name" value="{{ $projects->project_name }}" required></div>
            <div>Budget (THB): <input type="number" class="edit_input" name="budget" value="{{ $projects->budget }}" required></div>
            <div>Lab Abbreviation: <select name="labAb" class="edit_input">
                    @foreach ($labs as $lab)
                    @if ($projects->lab_id == $lab->id)
                    <option value={{ $lab->id }} selected>{{ $lab->abbreviation }}</option>
                    @else
                    <option value={{ $lab->id }}>{{ $lab->abbreviation }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            @endif
            <div>
                @if($title === "Add")
                <input class="submit" type="submit" value="บันทึกข้อมูล">
                @else
                <input class="submit" type="submit" value="แก้ไขข้อมูล">
                @endif
            </div>
        </form>
</body>

</html>