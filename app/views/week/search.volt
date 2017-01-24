<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("week/index", "Go Back") }}</li>
            <li class="next">{{ link_to("week/new", "Create ") }}</li>
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
            <th>UserID</th>
            <th>MonthId</th>
            <th>Year</th>
            <th>Month</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for week in page.items %}
            <tr>
                <td>{{ week.id }}</td>
            <td>{{ week.name }}</td>
            <td>{{ week.userID }}</td>
            <td>{{ week.monthId }}</td>
            <td>{{ week.year }}</td>
            <td>{{ week.month }}</td>

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
            <ul class="pagination">
                <li>{{ link_to("week/search", "First") }}</li>
                <li>{{ link_to("week/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("week/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("week/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
