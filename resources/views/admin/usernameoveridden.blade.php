<div style="width: 100%;">
    <h2>Hello, {!! $user->str_name !!}</h2>
    <p>
        Our administrators have had to reject your username as it appears that it is linked to a business.
    </p>
    <p>
        In the spirit of fair competition, we cannot allow business names or email addresses to be used in usernames for Couriers Connect as this would provide some people with an unfair advantage.
    </p>
    <p>
        In the meantime, you have been assigned a temporary username {!! $user->str_user !!}. If you wish to change your username to something more memorable, you can do so by accessing the <a href="https://couriersconnect.com/Login">My Account</a> section of the website.
    </p>
    <p>
        Regards, the Couriers Connect team.
    </p>
</div>