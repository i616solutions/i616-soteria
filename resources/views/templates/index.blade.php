<html>
<body>
<h1>Templates Index</h1>
<a href="/template/create">Create Template</a><br />
<hr />
@foreach ($templates as $template)

<a href="/template/{{$template->id}}">{{ $template->name}}</a> <a href="/template/{{$template->id}}/edit">Edit</a> <br />

@endforeach
