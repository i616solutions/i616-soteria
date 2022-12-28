<html>
<body>
<h1>Secrets Show</h1>

<a href="/vault/{{$vault->id}}/secret/{{$secret->id}}/edit">Edit</a><br />

<b>Name:</b> {{ $secret->name}}<br />
<b>Id:</b> {{ $secret->id}}<br />
<br />
@foreach ($template->fields()->orderBy('field_order')->get() as $field)
@if ($field->is_secret != true)
<b>{{ $field->displayname }}:</b> @if (array_key_exists($field->name ,$fields ))  {{$fields[$field->name]}} @endif<br />
@else
<b>{{ $field->displayname }}:</b> ******* <a href=""><img
    src="data:image/png;base64,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"
    height="16px" width="16px"/></a><br />
@endif
@endforeach
<br />
<b>Created:</b> {{ $secret->created_at}}<br />
<b>Updated:</b> {{ $secret->updated_at}}<br />

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
