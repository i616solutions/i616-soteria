<html>
<body>
<h1>Template Show</h1>

<a href="/template/{{$template->id}}/edit">Edit</a><br />

<b>Name:</b> {{ $template->name}}<br />
<b>Id:</b> {{ $template->id}}<br />
<b>Created:</b> {{ $template->created_at}}<br />
<b>Updated:</b> {{ $template->updated_at}}<br />

<br />
<br />
<h2>Fields</h2>
<a href="/template/{{$template->id}}/templateField/create">Add Field</a>
<hr />
<table>
    <tr>
        <th>Order</th>
        <th>Name</th>
        <th>type</th>
        <th>Secret</th>
        <th>Actions</th>
    </tr>
@foreach ($template->fields()->orderBy('field_order')->get() as $field)
<tr>
<td>{{$field->field_order}}
    <td><a href="/template/{{$template->id}}/templateField/{{$field->id}}">{{$field->displayname}}</a></td>
    <td>{{$field->field_type}}</td>
    <td>{{$field->is_secret}}</td>
    <td><a href="/template/{{$template->id}}/templateField/{{$field->id}}/edit">Edit</a>
<a  href="{{ route('templateField.destroy', ['template' => $template->id, 'templateField' => $field->id ]) }}"
    onclick="event.preventDefault();
    document.getElementById('delete-form-{{ $field->id }}').submit();">
    Delete
</a>

<form id="delete-form-{{ $field->id }}" action="{{ route('templateField.destroy', ['template' => $template->id,'templateField' => $field->id ]) }}"
     method="POST" style="display: none;">
    @method('DELETE')
    @csrf
</form>
    </td>
</tr>
@endforeach
</table>
