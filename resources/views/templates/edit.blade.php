<html>
<body>
<h1>Template Edit</h1>

<form method="POST" action="/template/{{$template->id}}">
    @csrf
    @method('PUT')

<b>ID:</b> {{$template->id}} <br />
<b>Name:</b> <input name="name" id="name" value="{{$template->name}}" /> <br />


<br />
<br />
<input type="submit" />
</form>

