<div class="page-header">
    <h1>List Of Registered Users</h1>
</div>

{{ content() }}

<div class="row">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>

            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for user in page.items %}
        <tr>
            <td>{{ user.id }}</td>
            <td>{{ user.name }}</td>
            <td>{{ user.username }}</td>
            <td>{{ user.email }}</td>


            <td>{{ link_to("user/edit/"~user.id, "Edit") }}</td>
            <td>{{ link_to("user/delete/"~user.id, "Delete") }}</td>
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
                <li>{{ link_to("user/search", "First") }}</li>
                <li>{{ link_to("user/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("user/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("user/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
