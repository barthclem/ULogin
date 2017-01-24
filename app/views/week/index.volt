<div class="page-header">
    <h1>
        List Of Weeks
    </h1>
</div>

{{ content() }}


<div class="row">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Total</th>
            <th>Month</th>
            <th>Year</th>


            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {%- set index = 0 %}
        {% for week in page.items %}
        {% set index = index+1 %}
        <tr>
            <td>{{ index }}</td>
            <td>{{ link_to("week/view/"~week.id , week.name) }}</td>
            <td> {{ week.totalAmount }} </td>
            <td>{{ week.month }}</td>
            <td>{{ week.year }}</td>


            <td>{{ link_to("week/edit/"~week.id, "Edit") }}</td>
            <td>{{ link_to("week/delete/"~week.id, "Delete") }}</td>
        </tr>
        {% endfor %}
        {% endif %}
        </tbody>
    </table>
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
                <li>{{ link_to("week/search", "First") }}</li>
                <li>{{ link_to("week/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("week/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("week/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
