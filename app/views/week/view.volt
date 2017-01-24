<div class="page-header">
    <h1>
        List Of Records in {{ weekName }}
    </h1>
</div>
<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("week", "Go Back") }}</li>
        </ul>
    </nav>
</div>


{{ content() }}


<div class="row">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Total Amount</th>
            <th>Day</th>
            <th>Month</th>

            <th></th>

        </tr>
        </thead>
        <tbody>
        {% if records is defined %}
        {% set index=0 %}
        {% for record in records %}
        {% set index = index +1 %}
        <tr>
            <td>{{ index }}</td>
            <td>{{ link_to("record/view/"~record.id,record.name ) }}</td>
            <td>{{ record.totalAmount }}</td>
            <td>{{ record.day }}</td>
            <td>{{ record.month }}</td>

            <td>{{ link_to("record/delete/"~record.id, "Delete") }}</td>
        </tr>

        {% endfor %}
        {% endif %}
        <tr></tr>
        <tr>
        <td></td><td>Total</td><td>{{ total }}<td></td><td></td><td></td></tr>

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
