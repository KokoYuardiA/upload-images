<!DOCTYPE html>
<html>
<head>
    <title>Unggah Berkas</title>
</head>
<body>

@if (session('path'))
    <p>Berkas berhasil diunggah. Path: {{ session('path') }}</p>
@endif

<form action="{{ route('file.upload') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" accept=".zip">
    <button type="submit">Unggah</button>
</form>

</body>
</html>
