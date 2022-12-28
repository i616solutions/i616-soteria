<html>
<body>
<h1>Vault Show</h1>

<b>Vault Name:</b> {{ $vault->name}} <br />
<b>Vault Id:</b>{{ $vault->id}} <br />
<b>Last Updated:</b>{{ $vault->updated_at}}<br />
<br />
<br />
<h2>Secrets</h2>
<a href="/vault/{{$vault->id}}/secret/create">Create</a>
<hr />
@foreach($vault->secrets as $secret)
<a href="/vault/{{$vault->id}}/secret/{{$secret->id}}">{{ $secret->name }}</a>
<a href="/vault/{{$vault->id}}/secret/{{$secret->id}}/edit">Edit</a>

<a  href="{{ route('secret.destroy', ['secret' => $secret->id]) }}"
    onclick="event.preventDefault();
    document.getElementById('delete-form-{{ $secret->id }}').submit();">
    Delete
</a>

<form id="delete-form-{{ $secret->id }}" action="{{ route('secret.destroy', ['secret' => $secret->id ]) }}"
     method="POST" style="display: none;">
    @method('DELETE')
    @csrf
</form>


<br />
@endforeach
