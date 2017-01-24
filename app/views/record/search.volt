<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("record/index", "Go Back") }}</li>
            <li class="next">{{ link_to("record/new", "Create ") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>Search result</h1>
</div>

{{ content() }}

<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
            <th>Name</th>
            <th>Day</th>
            <th>User</th>
            <th>Week</th>
            <th>Month</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for record in page.items %}
            <tr>
                <td>{{ record.id }}</td>
            <td>{{ record.name }}</td>
            <td>{{ record.total_spending }}</td>
            <td>{{ record.day }}</td>
            <td>{{ record.week_id }}</td>
            <td>{{ record.month_id }}</td>

                <td>{{ link_to("record/edit/"~record.id, "Edit") }}</td>
                <td>{{ link_to("record/delete/"~record.id, "Delete") }}</td>
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
            <ul class="pagination">
                <li>{{ link_to("record/search", "First") }}</li>
                <li>{{ link_to("record/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("record/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("record/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
