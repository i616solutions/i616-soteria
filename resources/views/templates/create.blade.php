<html>
<body>
<h1>Template Create</h1>

<form method="POST" action="/template">
    @csrf
    @method('POST')

<b>Name:</b> <input name="name" id="name" /> <br />


<br />
<br />
<input type="submit" />
</form>
