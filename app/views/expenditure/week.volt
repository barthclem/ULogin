<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("record", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        The Expenses For {{ weekId }}
    </h1>
</div>

{{ content() }}


<div class="row">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Expenses</th>
            <th>Amount</th>

        </tr>
        </thead>
        <tbody>
        {%- set index = 0 %}
        {% for name,expense in expenditures %}
        {%- set index = index + 1 %}

        <tr>
            {% if loop.last %}
            <td></td>
            <td>{{ name }}</td>
            <td>{{ expense['total'] }}</td>
            {% else %}
            <td>{{ index }}</td>
            <td>{{ link_to("expenditure/weekrecord/"~name~-expense['weekId'],name) }}</td>
            <td>{{ expense['total'] }}</td>
            {% endif %}
        </tr>
        {% endfor %}



        </tbody>
    </table>
</div>

