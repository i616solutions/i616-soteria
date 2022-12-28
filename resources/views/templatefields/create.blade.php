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
<h1>Template Field Create</h1>

<form method="POST" action="/template/{{ $template->id }}/templateField"  class="form-fields">
    @csrf
    @method('POST')
    <fieldset>
        <legend>Fields</legend>
        <ol>
            <li><label class='SotLabel' for="name">Name:</label> <input type="text" name="name" id="name" class='SotInput' /></li>

            <li><label class='SotLabel' for="displayname">Display Name:</label> <input type="text" name="displayname" id="displayname" class='SotInput' />
            <li><label class='SotLabel' for="description">Description:</label> <input type="text" name="description" id="description" class='SotInput'/>
            <li><label class='SotLabel' for="field_type">Field Type:</label> <select type="text" name="field_type" id="field_type" class="SotSelect">
                <option value="text">Text</option>
                <option value="textarea">Text Area</option>
                <option value="password">Password</option>
            </select></li>
            <li><label class='SotLabel' for="field_option"><b>Field Options:</label> <input type="text" name="field_option" id="field_option" class='SotInput'/></li>
            <li><label class='SotLabel' for="field_order">Field Order:</label> <input type="text" name="field_order" id="field_order" class='SotInput'/></li>
            <li><label class='SotLabel' for="field_validation_rules">Field Validation Rules:</label> <input type="text" name="field_validation_rules" id="field_validation_rules" class='SotInput' /></li>
            <li><label class='SotLabel' for="is_secret">Is Secret:</label> <select type="text" name="is_secret" id="is_secret" class="SotSelect"></li>
                    <option value="0">False</option>
                    <option value="1">True</option>
                </select>
            </li>
        </ol>
    </fieldset>
<br />
<br />
<input type="submit" class="SotSelect" style="width:150px;" /> <input type="button" value="Cancel" onclick="history.back()" style="width:150px;"/>
</form>


</body>
</html>
