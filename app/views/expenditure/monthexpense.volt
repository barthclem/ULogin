<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("expenditure/month", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Weekly Expenditure on {{ expense_name }}
    </h1>
</div>

{{ content() }}


<div class="row">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Week</th>
            <th>Amount</th>

        </tr>
        </thead>
        <tbody>
        {%- set index = 0 %}
        {%- set amount = 0 %}
        {% for name,week in weeks %}
        {%- set index = index + 1 %}
        {%- set amount = amount +  week['total'] %}
        <tr>
            <td>{{ index }}</td>
            <td> {{ link_to("expenditure/weekrecord/"~ expense_name~-week['weekId'],"Week "~index ) }} </td>
            <td>{{ week['total'] }}</td>
        </tr>
        {% endfor %}
        <tr><td></td>
            <td> Total </td>
            <td>{{ amount }}</td>
            <td></td></tr>



        </tbody>
    </table>
</div>

