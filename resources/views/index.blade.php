<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>
    <h2>Generated Form</h2>
    <p><a href="{{url('/list')}}">View Forms</a><p>
    <br/>
    <form action="{{url('/generateForm')}}" method="post" >
        @csrf
        Enter any number<br>
        <input required name="rows" type="number" min="1" >
        <button type="submit" >Generate Form</button>
    </form>
</body>
</html>