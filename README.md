<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Installation

Crudify was designed to work with a clean Laravel 8 install.

Install Laravel:

    laravel new vehicle-app

Configure the database in your `.env` file:

    DB_DATABASE=vehicle_app
    DB_USERNAME=root
    DB_PASSWORD=

Now, install Crudify via composer:

    composer require redbastie/crudify

Then, run the Crudify install command:

    php artisan crudify:install

All done. The only thing left to do is create a user, either via `tinker` or the `DatabaseSeeder`.

## Usage Example

Generate CRUD for a new model e.g. a `Vehicle`

    php artisan make:crud Vehicle

This will generate your controller, data table, model, factory, views, nav item, and auto route.

Modify the `migration` method inside the new `Vehicle` model class:

    public function migration(Blueprint $table)
    {
        $table->id();
        $table->timestamps();
        $table->string('name');
        $table->string('brand');
    }

You can also specify the factory definition and rules in the model:

    public static function definition(Generator $faker)
    {
        return [
            'name' => $faker->name,
            'brand' => $faker->company,
        ];
    }
    
    public static function rules(Vehicle $vehicle = null)
    {
        return [
            'name' => ['required', Rule::unique('vehicles')->ignore($vehicle->id ?? null)],
            'brand' => ['required'],
        ];
    }

Specify a `Vehicle` seeder in the `DatabaseSeeder` class:

    \App\Models\User::factory()->create([
        'email' => 'admin@example.com',
    ]);

    \App\Models\Vehicle::factory(100)->create();

Note that I've added a `User` seeder here as well, which we will use to log in with using the password `password` after.

Add some data table columns in the `VehicleDataTable` class:

    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('brand'),
            Column::make('created_at'),
            Column::computed('action')->title(''),
        ];
    }

Add form fields in the `vehicles/form.blade.php` view file:

    <x-form-input label="{{ __('Name') }}" name="name"/>
    <x-form-input label="{{ __('Brand') }}" name="brand"/>

Run a fresh automatic migration command with seeding:

    php artisan migrate:auto --fresh --seed

You can specify `--fresh` and/or `--seed` in the `migrate:auto` command in order to run fresh migrations and/or seed afterwards.

Now you should be able to login to your app and click on the `Vehicles` link in the navbar to perform CRUD operations on the seeded data.

To get an idea how the automatic routing works, check out the `VehicleController`. After updating controller methods, use `php artisan route:list` to see your route info.
