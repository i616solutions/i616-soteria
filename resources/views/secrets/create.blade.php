<html>
<body>
<h1>Secrets Create</h1>

<form method="POST" action="/vault/{{$vault->id}}/secret">
    @csrf
    @method('POST')

<b>Name:</b> <input name="name" id="name" /> <br />

@foreach ($template->fields()->orderBy('field_order')->get() as $field)
<b>{{ $field->displayname }}</b>
@if ($field->field_type == "input")
<input type="input" name="{{$field->name}}" id="{{$field->name}}" />
@endif
@if ($field->field_type == "textarea")
<textarea name="{{$field->name}}" id="{{$field->name}}"></textarea>
@endif
@if ($field->field_type == "password")
<input type="password" name="{{$field->name}}" id="{{$field->name}}" />
@endif
<br />
@endforeach
<br />
<br />
<input type="submit" />
</form>
