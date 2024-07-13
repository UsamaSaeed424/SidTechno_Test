<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>

<body>
    <h2>Edit Form - {{$form->name}}</h2>
    <form action="{{url('/update')}}" method="post">
        <input hidden value="{{$form->id}}" type="text" name="form_id">
        @csrf
        @foreach ($rows as $i=>$row)
        <div>
            <input hidden value="{{$row->id}}" type="text" name="rows[{{ $i }}][rowId]" >
            <label for="firstName_{{ $i }}">First Name</label>
            <input value="{{$row->first_name}}" type="text" name="rows[{{ $i }}][firstName]" id="firstName_{{ $i }}" required>

            <label for="lastName_{{ $i }}">Last Name</label>
            <input value="{{$row->last_name}}" type="text" name="rows[{{ $i }}][lastName]" id="lastName_{{ $i }}" required>

            <label for="qualification_{{ $i }}">Qualification</label>
            <select required name="rows[{{ $i }}][qualification]" id="qualification_{{ $i }}">
                <option value="N/A" {{ $row['qualification'] == 'N/A' ? 'selected' : '' }}>--select--</option>
                <option value="master" {{ $row['qualification'] == 'master' ? 'selected' : '' }}>Master</option>
                <option value="bachelor" {{ $row['qualification'] == 'bachelor' ? 'selected' : '' }}>Bachelor</option>
                <option value="o_Level" {{ $row['qualification'] == 'o_Level' ? 'selected' : '' }}>O Level</option>
            </select>
            <label for="dob_{{ $i }}">Date of Birth</label>
            <input value="{{$row->dob}}" type="date" name="rows[{{ $i }}][dob]" id="dob_{{ $i }}" required>
        </div>
        <br>
        @endforeach
        Form Name <input value="{{$form->name}}" type="text" name="formName" required>
        <button type="submit">Save</button>
    </form>
</body>

</html>