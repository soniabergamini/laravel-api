<h1>📩NEW CONTACT REQUEST</h1>

<hr>

<p>
    You have received a <strong>new contact request</strong>. Here is the user information and message for you: <br>
    <ul>
        <li>
            <span><strong>Name: </strong>{{ $lead['name'] }}</span>
        </li>
        <li>
            <span><strong>Email: </strong>{{ $lead['email'] }}</span>
        </li>
        <li>
            <span><strong>Message: </strong>{{ $lead['message'] }}</span>
        </li>
    </ul>
</p>

<hr>

<style>
    h1, p {
        font-family: Verdana, Geneva, Tahoma, sans-serif
    }
    h1 {
        text-align: center
    }
</style>
