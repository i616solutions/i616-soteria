<html>
    <head>
        <style>
fieldset {
    margin: 0 0 20px 0; }

fieldset legend {
    font-weight: bold;
    font-size: 16px;
    padding: 0 0 10px 0;
    color: #214062; }

fieldset label {
    width: 170px;
    float: left;
    margin-right:10px;
    vertical-align: top; }

fieldset ol {
    list-style:none;
    margin: 0;
    padding: 0;}

fieldset ol li {
    float:left;
    width:100%;
    padding-bottom:7px;
    padding-left: 0;
    margin-left: 0; }

fieldset ol li input,
fieldset ol li select,
fieldset ol li textarea {
    margin-bottom: 5px; }

form fieldset div.inputWrapper {
    margin-left: 180px; }

.note {
    font-size: 0.9em; color: #666; }

.error{
    color: #d00; }
        </style>
    </head>
<body>
<h1>Template Field Edit</h1>

<form method="POST" action="/template/{{ $template->id }}/templateField/{{ $templateField->id }}">
    @csrf
    @method('PUT')
    <fieldset>
        <legend>Fields</legend>
        <ol>
            <li><label class='SotLabel' for="name">Name:</label> <input type="text" name="name" id="name" value="{{$templateField->name}}"  class='SotInput' /></li>
            <li><label class='SotLabel' for="displayname">Display Name:</label> <input type="text" name="displayname" id="displayname" value="{{$templateField->displayname}}"  class='SotInput' /></li>
            <li><label class='SotLabel' for="description">Description:</label> <input type="text" name="description" id="description" value="{{$templateField->description}}"  class='SotInput' /></li>
            <li><label class='SotLabel' for="field_type">Field Type:</label><select type="text" name="field_type" id="field_type" class="SotSelect">
                <option value="text" @if($templateField->field_type == "text") SELECTED @endif>Text</option>
                <option value="textarea" @if($templateField->field_type == "textarea") SELECTED @endif>Text Area</option>
                <option value="password" @if($templateField->field_type == "password") SELECTED @endif>Password</option>
            </select></li>
            <li><label class='SotLabel' for="field_option">Field Options:</label> <input type="text" name="field_option" id="field_option" value="{{$templateField->field_option}}"  class='SotInput' /></li>
            <li><label class='SotLabel' for="field_order">Field Order:</label> <input type="text" name="field_order" id="field_order" value="{{$templateField->field_order}}"  class='SotInput' /></li>
            <li><label class='SotLabel' for="field_validation_rules">Field Validation Rules:</label> <input type="text" name="field_validation_rules" id="field_validation_rules" value="{{$templateField->field_validation_rules}}" class='SotInput' /></li>
            <li><label class='SotLabel' for="is_secret">Is Secret:</label><select type="text" name="is_secret" id="is_secret" class="SotSelect"></li>
                <option value="0" @if($templateField->is_secret == 0) SELECTED @endif>False</option>
                <option value="1" @if($templateField->is_secret == 1) SELECTED @endif>True</option>
            </select></li>
        </ol>
    </fieldset>
    <br />
    <br />
    <input type="submit" class="SotSelect" style="width:150px;" /> <input type="button" value="Cancel" onclick="history.back()" style="width:150px;"/>
</form>


