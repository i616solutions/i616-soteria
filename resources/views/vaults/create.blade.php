<html>
<body>
<h1>Vault Create</h1>

<form method="POST" action="/vault">
    @csrf
    @method('POST')

<b>Name:</b> <input name="name" id="name" /> <br />
<b>Company ID:</b> <input name="company_id" id="company_id" /><br />

<br />
<br />
<input type="submit" />
</form>
