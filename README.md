# Data
[![Build Status](https://travis-ci.org/Neoflow/Session.svg?branch=master&service=github)](https://travis-ci.org/Neoflow/Data)
[![Coverage Status](https://coveralls.io/repos/github/Neoflow/Data/badge.svg?branch=master&service=github)](https://coveralls.io/github/Neoflow/Data?branch=master)
[![Latest Stable Version](https://poser.pugx.org/neoflow/data/v?service=github)](https://packagist.org/packages/neoflow/data)
[![Total Downloads](https://poser.pugx.org/neoflow/data/downloads?service=github)](//packagist.org/packages/neoflow/data)
[![License](https://poser.pugx.org/neoflow/data/license?service=github)](https://packagist.org/packages/neoflow/data)

Data handler for arrays and ArrayAccess-implementations.

## Table of Contents
- [Requirement](#requirement)
- [Installation](#installation)
- [Usage](#usage)
- [Contributors](#contributors)
- [License](#license)

## Requirement
* PHP >= 7.3

## Installation
You have 2 options to install this library.

Via Composer:
```bash
composer require neoflow/data
```

Or manually add this line to the `require` block in your `composer.json`:
```json
"neoflow/data": "^0.0.1"
```

## Usage
Examples how to use the data handler.
```php
// Create new data handler.
$data = new Data([
    // Initial data
]);

// Get value by key from data.
$value = $data->getValue('key');

// Delete value by key from data.
$data->deleteValue('key');

// Check whether value exists by key in data.
$valueExists = $data->hasValue('key');
   
// Count number of values in data.
$numberOfValues = $data->countValues();
   
// Set value by key into data.
$overwrite = true; // Set FALSE to prevent overwrite existing value
$data = $data->setValue('key', 'value', $overwrite);

// Merge data. Existing values with similar keys will be overwritten.
$recursive = true; // Set FALSE to prevent recursive merge
$data = $data->mergeData([
    // Data to merge
], $recursive);

// Set data. Existing data will be overwritten.
$data = $data->set([
    // Data to set
]);

// Set referenced data. Existing data will be overwritten.
$newData = [
    // Data to set as reference
];
$data = $data->setReference($newData);

// Get data as array.
$array = $data->toArray();
```

## Contributors
* Jonathan Nessier, [Neoflow](https://www.neoflow.ch)

If you would like to see this library develop further, or if you want to support me or show me your appreciation, please
 donate any amount through PayPal. Thank you! :beers:
 
[![Donate](https://img.shields.io/badge/Donate-paypal-blue)](https://www.paypal.me/JonathanNessier)

## License

Licensed under [MIT](LICENSE). 

*Made in Switzerland with :cheese: and :heart:*
