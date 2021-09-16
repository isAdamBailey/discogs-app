## Start Application

This Application uses [Laravel Sail](https://laravel.com/docs/sail) for a development environment, so you will need
to install and start Docker and configure the bash alias in the docs to perform the following commands.

To start the application, run `sail up`

To stop the application, run `sail stop`

For composer commands, use `sail composer`

For artisan commands, `sail artisan`. You get the picture.

For npm commands, use `sail npm` and whatever commands are available in `package.json`

For hot reloading, run `sail npm run hot`

## Mailhog

Sail will already have [mailhog configured](https://laravel.com/docs/sail#previewing-emails) and working in your 
dev environment. To access the emails, visit http://localhost:8025 in your browser.
