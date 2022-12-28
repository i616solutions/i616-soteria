<html>
<body>
<h1>Vault Index</h1>
<a href="/vault/create">Create Vault</a><br />
<hr />
@foreach ($vaults as $vault)

<a href="/vault/{{$vault->id}}">{{ $vault->name}}</a> <br />

@endforeach
