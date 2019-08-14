<html>
<body>

<form action="" method="post"
enctype="multipart/form-data">
{{csrf_field()}}
<label for="file">Filename:</label>
<input type="file" name="file" id="file" /> 
<br />
<label for="content">content:</label>
<textarea name="content" id="a" cols="30" rows="10"></textarea>
<br />
<input type="submit" name="submit" value="Submit" />
</form>
@foreach ($data as $item)
<p>@if ()
    
    
@endif</p>

@endforeach

</body>
</html>