# Data handler
[![Build Status](https://github.com/jnessier/data-handler/workflows/Tests/badge.svg)](https://github.com/neoflow/data/actions?query=branch:4.x)
[![Latest Stable Version](https://poser.pugx.org/jnessier/data-handler/v?service=github)](https://packagist.org/packages/jnessier/data-handler)
[![Total Downloads](https://poser.pugx.org/jnessier/data-handler/downloads?service=github)](https://packagist.org/packages/jnessier/data-handler)
[![License](https://poser.pugx.org/jnessier/data-handler/license?service=github)](https://packagist.org/packages/jnessier/data-handler)

Data handler for arrays.

## Table of Contents
- [Requirement](#requirement)
- [Installation](#installation)
- [Usage](#usage)
- [Limitations](#limitations)
- [Contributors](#contributors)
- [License](#license)

## Requirement
* PHP >= 8

## Installation
Install package of the data handler via Composer...
```bash
composer require jnessier/data-handler
```
...or manually download the latest release from [here](https://github.com/jnessier/DataHandler/releases/).

## Usage
```php
use DataHandler\Data;

// Create new data handler.
$data = new Data([
    // Array with key/value pairs
]);

// Get value by key.
$default = null; // Default value, when key doesn't exists
$value = $data->get('key', $default);
   
// Pull value by key and delete it afterward.
$default = null; // Default value, when key doesn't exists
$value = $data->pull('key', $default);

// Set value by key.
$overwrite = true; // Set FALSE to prevent overwrite existing value
$data = $data->set('key', 'value', $overwrite);

// Check whether value exists by key.
$valueExists = $data->has('key');
   
// Delete value by key.
$data->delete('key');

// Count number of values.
$numberOfValues = $data->count();

// Get all values as array.
$array = $data->getAll();

// Iterate trough values.
$data->each(function ($value, string $key) {
    // Callback for each key/value pair
});

// Clear values.
$data = $data->clear();

// Replace values. Existing values with similar keys will be overwritten.
$recursive = true; // Set FALSE to prevent recursive merge
$data = $data->replace([
    // Array with key/value pairs
], $recursive);

// Set array as values. Existing data will be overwritten.
$data = $data->setAll([
    // Array with key/value pairs
]);

// Set referenced array as values. Existing data will be overwritten.
$values = [
    // Array with key/value pairs
];
$data = $data->setAllReferenced($values);
```

## Limitations
* Only string as key supported
* Only array as key/value pairs supported
* No dot notation implementation
* No type check for values

## Contributors
* Jonathan Nessier (jnessier)

If you would like to see this library develop further, or if you want to support me or show me your appreciation, please
 donate any amount through PayPal. Thank you! :beers:
 
[![Donate](https://img.shields.io/badge/Donate-paypal-blue)](https://www.paypal.me/JonathanNessier)

## License
Licensed under [MIT](LICENSE). 

*Made in Switzerland with :cheese: and :heart:*