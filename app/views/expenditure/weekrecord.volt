<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("expenditure/week", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Daily Expenditure on {{ expense_name }}
    </h1>
</div>

{{ content() }}


<div class="row">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Day</th>
            <th>Amount</th>

        </tr>
        </thead>
        <tbody>
        {%- set index = 0 %}
        {%- set amount = 0 %}
        {% for name,record in records %}
        {%- set index = index + 1 %}
        {%- set amount = amount + record['amount'] %}
        <tr>
            <td>{{ index }}</td>
            <td>{{ record['day'] }}</td>
            <td>{{ record['amount'] }}</td>
        </tr>
        {% endfor %}
        <tr><td></td>
            <td> Total </td>
            <td>{{ amount }}</td>
            <td></td></tr>



        </tbody>
    </table>
</div>

