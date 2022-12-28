<html>
<body>
<h1>Template Field Show</h1>

<b>Name:</b> {{ $templateField->name }}<br />
<b>Display Name:</b>{{ $templateField->displayname }} <br />
<b>Description:</b> {{ $templateField->description }}<br />
<b>Field Type:</b> {{ $templateField->field_type }}<br />
<b>Field Options:</b> {{ $templateField->field_options }}<-- text area<br />
<b>Field Order:</b> {{ $templateField->field_order }}<br />
<b>Field Validation Rules:</b> {{ $templateField->field_validation_rules }}<br />
<b>Is Secret:</b> {{ $templateField->is_secret }} <-- boolean<br />
<br />
<br />
