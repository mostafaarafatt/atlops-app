# Green Apple System™

## Requirements

* PHP 7.4 or higher
* Database (eg: MySQL, PostgreSQL, SQLite)
* Web Server (eg: Apache, Nginx)
* FFmpeg Installed on server ([FFmpeg](https://ffmpeg.org/))

[//]: # (* [Other libraries]&#40;'To Be Added'&#41;)

## Framework

Green Apple System uses [Laravel](http://laravel.com), the best existing PHP framework, as the foundation framework
and [Module](https://nwidart.com/laravel-modules/v6/introduction) package for Apps.

## Installation

* Install [Composer](https://getcomposer.org/download) and [Npm](https://nodejs.org/en/download)
* Clone the repository:
* if you want to change dashboard colors ?
* before running: `npm run dev`
  change `DASHBOARD_CHOSEN_COLOR, MIX_DASHBOARD_CHOSEN_COLOR` and
  set your desired color without `#`
* Install dependencies: `composer install ; npm install ; npm run dev`
* Create new MySQL database for this application
* Install Scaffolding:

simply visit this url `{{app_url}}/installer` and follow instructions

* Or :

If you use valet or linux system just execute the init.sh file to configure your environment automatically.


```bash
sh init.sh
```

* Or :

If you use Windows system just execute the init.bat file to configure your environment automatically.

```bash
init.bat
```

[comment]: <> (* Or :)

[comment]: <> (```bash)

[comment]: <> (php artisan install)

[comment]: <> (```)

[comment]: <> (* Or :)

[comment]: <> (```bash)

[comment]: <> (php artisan install --db-name="scaffolding" --db-username="root" --db-password="" --admin-name="admin" --admin-email="admin@demo.com" --admin-phone="987654321" --admin-password="password")

[comment]: <> (```)

[comment]: <> (* Create sample data &#40;optional&#41;:)

[comment]: <> (```bash)

[comment]: <> (php artisan sample-data:seed)

[comment]: <> (```)

[comment]: <> (* Or if you want a specific number)

[comment]: <> (```bash)

[comment]: <> (php artisan sample-data:seed --count="your count here")

[comment]: <> (```)

