<?php

use App\Models\ApplicationSettings;



// view()->share('settings', ApplicationSettings::firstWhere('name', 'application'));

// Developer Settings view

view()->share('application', ApplicationSettings::firstWhere('name', 'application'));
view()->share('page', ApplicationSettings::firstWhere('name', 'page'));
view()->share('developer', ApplicationSettings::firstWhere('name', 'developer'));
view()->share('logo', ApplicationSettings::firstWhere('name', 'logo'));


// App Settings view
view()->share('default_layout', ApplicationSettings::firstWhere('name', 'default layout'));
view()->share('default_action', ApplicationSettings::firstWhere('name', 'default action'));
view()->share('default_message', ApplicationSettings::firstWhere('name', 'default message'));
view()->share('default_front_end_layout', ApplicationSettings::firstWhere('name', 'default front end layout'));


// Blood Bank Settings
view()->share('default_front_end_blood_bank_layout', ApplicationSettings::firstWhere('name', 'default front end blood bank layout'));
