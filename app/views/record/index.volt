<div class="page-header">
    <h1>
        Records
    </h1>

</div>

{{ content() }}

{{ form("record/search", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="row">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Total Amount</th>
            <th>Day</th>
            <th>Week</th>
            <th>Month</th>

            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% set index=0 %}
        {% for record in page.items %}
        {% set index = index + 1 %}
        <tr>
            <td>{{ index }}</td>
            <td>{{ link_to("record/view/"~record.id,record.name ) }}</td>
            <td>{{ record.totalAmount }}</td>
            <td>{{ record.day }}</td>
            <td>{{ record.weekId }}</td>
            <td>{{ record.month }}</td>

            <td>{{ link_to("record/edit/"~record.id, "Edit") }}</td>
            <td>{{ link_to("record/delete/"~record.id, "Delete") }}</td>
        </tr>
        {% endfor %}
        {% endif %}
        </tbody>
    </table>
</div>
<div class="row">
    <div class="nav pull-right">

        {{ link_to("record/new", "Fill record") }}

    </div>
</div>

<div class="row">
    <div class="col-sm-1">
        <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
            {{ page.current~"/"~page.total_pages }}
        </p>
    </div>
    <div class="col-sm-11">
        <nav>
            <ul class="pager">
                <li>{{ link_to("record/search", "First") }}</li>
                <li>{{ link_to("record/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("record/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("record/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>

</form>
