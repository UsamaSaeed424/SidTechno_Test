<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>

<body>
    @if (session('message'))
    <h2>Saved Form List - {{ session('message') }}</h2>
    @else
    <h2>Saved Form List</h2>
    @endif
    <div>
        <a href="{{url('/')}}">Create New Form</a>
    </div>
    <table border="-1">
        <thead>
            <tr style="text-align: center;">
                <td>Form Name</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($forms as $form)
            <tr>
                <td>{{$form->name}}</td>
                <td><a href="{{url('edit',['id'=>$form->id])}}">Click to Edit Form</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>