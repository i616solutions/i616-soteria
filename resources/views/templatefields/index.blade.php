<html>
<body>
<h1>Templates Index</h1>
<a href="/template/create">Create Template</a><br />

@foreach ($templates as $template)

<a href="/template/{{$template->id}}">{{ $template->name}}</a> <a href="">Edit</a> <a href="">Delete</a> <br />

@endforeach
