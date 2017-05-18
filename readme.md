# Larevel starter project

[Installation instructions](#installation)

## What is installed by default in this project

- [Laravel Dusk](#laravel-dusk)
- [Laravel Debugbar](#laravel-debugbar)
- [Laravel IDE Helper](#laravel-ide-helper)
- [Laravel Env Sync](#laravel-env-sync)
- [Laravel Lang](#laravel-lang)
- [Laravel Backup](#laravel-backup)
- [Jens Segers Date](#jenssegers-date)
- [Laravel Menu](#laravel-menu)
- [Laravel Permissions](#laravel-permissions)
- [Redis](#redis)
- [Beanstalk](#beanstalk)

<a name="installation"></a>
## Installation

- `git clone https://github.com/KonnectIT/laravel-starter my-project` and `cd` into it.
- Copy `.env.example` to `.env`
- `composer install` to install the packages
- `php artisan key:generate`
- Check all settings within this new file (`.env`)
- `php artisan passport:keys` (otherwise you're gettings failures with `php artisan route:list`)
- `php artisan migrate --seed` (make sure your database settings are filled within the `.env` file)
- `npm install` or `yarn`

## Default settings

Users created:

email | password
--- | ---
admin@example.com | admin
moderator@example.com | moderator


## Todo

- API / Presenters / Rest / JSON / auth / token

## Installed (and configured) packages

<a name="laravel-dusk"></a>
### Laravel Dusk

Laravel Dusk provides an expressive, easy-to-use browser automation and testing API. Docs can be found [here](https://laravel.com/docs/master/dusk).

Usage:

```bash
php artisan dusk
```

<a name="laravel-debugger"></a>
### Laravel Debugbar

This is a package to integrate PHP Debug Bar with Laravel 5. It includes a ServiceProvider to register the debugbar and attach it to the output.

[Docs here](https://github.com/barryvdh/laravel-debugbar)

<a name="laravel-ide-helper"></a>
### Laravel IDE Helper

This package generates a file that your IDE understands, so it can provide accurate autocompletion. Generation is done based on the files in your project, so they are always up-to-date.

[Docs here](https://github.com/barryvdh/laravel-ide-helper)

<a name="laravel-env-sync"></a>
### Laravel Env Sync

Keep your `.env` in sync with your `.env.example` or vice versa.

It reads the `.env.example` file and makes suggestions to fill your `.env` accordingly.

```bash
# check you .env file with
php artisan env:check

# sync you file with the .env.example
php artisan env:sync
```

[Docs here](https://github.com/JulienTant/Laravel-Env-Sync)

<a name="laravel-lang"></a>
### Laravel Lang

52 languages support for Laravel 5 application based on caouecs/Laravel-lang.

```bash
# publish you language files like this:
php artisan lang:publish nl
```

[Docs here](https://github.com/overtrue/laravel-lang)

<a name="laravel-backup"></a>
### Laravel Backup

This Laravel package creates a backup of your application. The backup is a zipfile that contains all files in the directories you specify along with a dump of your database. The backup can be stored on any of the filesystems you have configured in Laravel 5.

Feeling paranoid about backups? Don't be! You can backup your application to multiple filesystems at once.

Once installed, making a backup of your files and databases is very easy. Just run this artisan command:

	php artisan backup:run

In addition to making the backup, the package can also clean up old backups, monitor the health of the backups, and show an overview of all backups.

Also installed `guzzlehttp/guzzle` to send notifications to Slack. Also configure you webhook for Slack in you `.env`.

Default schedules added:

| Command | When |
| :--- | :--- |
| backup:clean | daily at 01:00 |
| backup:run | daiyli at 02:00 |

[Docs here](https://docs.spatie.be/laravel-backup/v4/introduction)

<a name="jenssegeres-date"></a>
### Jenssegers Data

This date library extends `Carbon` with multi-language support. Methods such as `format`, `diffForHumans`, `parse`, `createFromFormat` and the new `timespan`, will now be translated based on your locale.

[Docs here](https://github.com/jenssegers/date)

<a name="laravel-activity"></a>
### Laravel Activity

Log the activities of your users

```php
activity()->log('Look mum, I logged something');

$lastActivity = Activity::all()->last(); //returns the last logged activity
$lastActivity->description; //returns 'Look mum, I logged something';

activity()
   ->causedBy($userModel)
   ->performedOn($someContentModel)
   ->withProperties(['key' => 'value'])
   ->log('edited');
   
$lastActivity = Activity::all()->last(); //returns the last logged activity
   
$lastActivity->getExtraProperty('key') //returns 'value';  

```

[Docs here](https://docs.spatie.be/laravel-activitylog/v1/installation-and-setup)

<a name="laravel-menu"></a>
### Laravel Menu

```php
Menu::make('MyNavBar', function($menu){

  $menu->add('Home');
  $menu->add('About',    'about');
  $menu->add('services', 'services');
  $menu->add('Contact',  'contact');

});

{!! $MyNavBar->asUl() !!}

# or

{!! Menu::get('MyNavBar')->asUl() !!}
```

This will render like so:

```html
<ul>
  <li><a href="http://yourdomain.com">Home</a></li>
  <li><a href="http://yourdomain.com/about">About</a></li>
  <li><a href="http://yourdomain.com/services">Services</a></li>
  <li><a href="http://yourdomain.com/contact">Contact</a></li>
</ul>
```

[Docs here](https://github.com/lavary/laravel-menu)

<a name="laravel-permissions"></a>
### Laravel Permissions

Once installed you can do stuff like this:

```php
// adding permissions to a user
$user->givePermissionTo('edit articles');

// adding permissions via a role
$user->assignRole('writer');
$user2->assignRole('writer');

$role->givePermissionTo('edit articles');
```

You can test if a user has a permission with Laravel's default can-function.

```php
$user->can('edit articles');
```

[Docs here](https://github.com/spatie/laravel-permission)

<a name="redis"></a>
### Redis (predis)

[Docs here](https://laravel.com/docs/5.4/redis)

<a name="beanstalk"></a>
### Beanstalk

[Docs here](https://laravel.com/docs/5.4/queues)
