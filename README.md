# Queue Artisan commands in Laravel

Adds a method to place artisan commands in the queue.

# Usage

    Queue::artisan(command, optional array arguments)

For example

    // equivalent to php artisan migrate:refresh
    Queue::artisan('migrate:refresh') // for whatever reason you want to queue this command

    // equivalent for php artisan your-own-command:task parameter=value --optional=optionalValue
    Queue::artisan('your-own-command:task', array('parameter' => 'value', '--optional' => 'optionalValue'))

# Installation

Add to composer

    "aveley/artisan-queue": "dev-master"

Update your composer

    composer update

In app/config/app.php -> aliases change this line

    'Queue'           => 'Illuminate\Support\Facades\Queue',
to

    'Queue'           => 'Aveley\Artisanqueue\Queue',
