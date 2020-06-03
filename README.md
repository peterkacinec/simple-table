# SimpleTable for Laravel

## Installation

- doplnit do suboru composer.json
```
"require": {
    ...,
    "peterkacinec/simple-table": "@dev"
},
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/peterkacinec/simple-table"
    }
],
```

- nasledne spustit prikaz `composer update`

## Nastavenie package

V cistej instalaci noveho projektu Laravel treba dodrzat tento postup:

- `laravel new NazovProjektu`
- `npm install`
- publishnutie assetov (ikonky buttonov z material icons) `php artisan vendor:publish --tag=public --force`
- vo vasom projekte do suboru `resources/js/app.js` treba nalinkovat komponentu pridanim riadku `Vue.component('simple-table-component', require('../../vendor/peterkacinec/simple-table/src/resources/js/components/SimpleTableComponent').default);`
- spustit prikaz `npm run dev` alebo `npm run watch`

## Example

Priklad blade templatu

````
@php
    $columns = [
        [
            'label' => __('user-management::user.Name'),
            'key' => 'name',
            'type' => 'text'
        ],
        [
            'label' => __('user-management::user.Surname'),
            'key' => 'surname',
            'type' => 'text',
        ],
        [
            'label' => __('user-management::user.Email'),
            'key' => 'email',
            'type' => 'text'
        ],
        [
            'label' => __('user-management::general.Created at'),
            'key' => 'created_at',
            'type' => 'date'
        ],
    ];

    $gridview = new \KornerBI\SimpleTable\SimpleTable($columns, $data, \App\User::ENTITY_ROUTE_PREFIX);
@endphp
@extends ('layouts.app')
@section ('content')
    <div class="card">
        <div class="card-header">{{__('user-management::user.User list')}}</div>
        <div class="card-body">
            <div class="form-group form-row">
                <a role="button" class="btn btn-primary btn-sm" href="{{ route(config('user-management.route-name').'users.create') }}">{{__('user-management::general.Create')}}</a>
            </div>
            <?= $gridview->render(); ?>
        </div>
    </div>
@endsection
````
## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## Authors

* **Billie Thompson** - *Initial work* - [PurpleBooth](https://github.com/PurpleBooth)

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Hat tip to anyone whose code was used
* Inspiration
* etc
