<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>

<body>
    <h1>{{ $settings['app_name'] }}</h1>
    <h1>{{ $settings['page_title_prefix'] }}</h1>
    @foreach (Auth::user()->userSettings as $userSetting)
        {{ $userSetting->user_value }}-{{ $userSetting->settings->key }} <br>
    @endforeach

    <h4>Active Users</h4>
    @foreach ($users as $user)
        {{ $loop->count }} of {{ $loop->remaining }} ******* {{ $loop->iteration }}-{{ $user->name }}<br>
    @endforeach


</body>

</html>
