Dear {{ $user->username }}, <br><br>

We would like to invite you to our team <a href="{{ url('/teams/'.$team->name.'/dashboard') }}">{{$team->name}}</a> <br>
Click on the link above to access our dashboard. <br></br>;

<b><i>The Pibbble Team<i><b>