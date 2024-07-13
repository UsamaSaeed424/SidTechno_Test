<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>
    <h2>Generated Form</h2>
    <form action="form" method="post" >
        @csrf
        @for ($i=0;$i < $noOfRows; $i++)
        <div>
            <label for="firstName_{{ $i }}">First Name</label>
            <input type="text" name="rows[{{ $i }}][firstName]" id="firstName_{{ $i }}" required>

            <label for="lastName_{{ $i }}">Last Name</label>
            <input type="text" name="rows[{{ $i }}][lastName]" id="lastName_{{ $i }}" required>

            <label for="qualification_{{ $i }}">Qualification</label>
            <select required name="rows[{{ $i }}][qualification]" id="qualification_{{ $i }}">
                <option selected value="N/A">--select--</option>
                <option value="master">Master</option>
                <option value="bachelor">Bachelor</option>
                <option value="o_Level">O Level</option>
            </select>

            <label for="dob_{{ $i }}">Date of Birth</label>
            <input type="date" name="rows[{{ $i }}][dob]" id="dob_{{ $i }}" required>
        </div>
        <br>
        @endfor
        Form Name <input type="text" name="formName" required >
        <button type="submit" >Save</button>
    </form>
</body>
</html>