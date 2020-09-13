# Volleyscores API wrapper

This package aims to simplify data collection from the Volleyadmin2 webservice.

- [Installation](#installation)
- [Usage](#usage)
    - [Endpoints](#endpoints)
- [Disclaimer](#disclaimer)

## Installation

Install this package via [Composer](https://getcomposer.org/).

```bash
composer require tdm/volleyscores
```

## Usage

Create a new Volleyscores object
```php
use TDM\VolleyScores\VolleyScores;

$volleyscores = new VolleyScores;
```

### Endpoints

**Series**

Get al series, this response can be filtered by province and/or club-number

```php
$volleyscores->series()->all([
    'province_id' => 5,        // optional
    'stamnummer'  => 'O-1112', // optional
]);
```

If you want series from multiple club-numbers you can provide them as an array. Behind the scenes multiple async request will be made to the api and the response will be a single merged response.
```php
$volleyscores->series()->all([
    'province_id' => 5,
    'stamnummer'  => ['O-1112', 'RO-RO0991'],
]);
```

**Calendar**

Get the calendar for a serie within a specific province

```php
$volleyscores->calendar()->get([
    'province_id' => 5,      // required
    'reeks'       => 'OHP3', // required
]);
```

**Competition**

Get the main ranking for a serie

```php
$volleyscores->competition()->main([
    'province_id' => 5,      // optional
    'reeks'       => 'OHP3', // required
]);
```

Get the reserve ranking if it exists for a serie
```php
$volleyscores->competition()->reserve([
    'province_id' => 5,      // optional
    'reeks'       => 'OHP3', // required
]);
```

## Disclaimer

This package is developed for educational purposes. It depends on a very limited and unofficial API that may break or cease to exist at anytime.
