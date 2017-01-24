<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("week", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Create week
    </h1>
</div>

{{ content() }}

{{ form("week/create", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldName" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
        {{ text_field("name", "size" : 30, "class" : "form-control", "id" : "fieldName") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldUserid" class="col-sm-2 control-label">UserID</label>
    <div class="col-sm-10">
        {{ text_field("userID", "type" : "numeric", "class" : "form-control", "id" : "fieldUserid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldMonthid" class="col-sm-2 control-label">MonthId</label>
    <div class="col-sm-10">
        {{ text_field("monthId", "type" : "numeric", "class" : "form-control", "id" : "fieldMonthid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldYear" class="col-sm-2 control-label">Year</label>
    <div class="col-sm-10">
        {{ text_field("year", "type" : "numeric", "class" : "form-control", "id" : "fieldYear") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldMonth" class="col-sm-2 control-label">Month</label>
    <div class="col-sm-10">
        {{ text_field("month", "size" : 30, "class" : "form-control", "id" : "fieldMonth") }}
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Save', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
