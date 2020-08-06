# Data
[![Build Status](https://travis-ci.org/Neoflow/Session.svg?branch=master&service=github)](https://travis-ci.org/Neoflow/Data)
[![Coverage Status](https://coveralls.io/repos/github/Neoflow/Data/badge.svg?branch=master&service=github)](https://coveralls.io/github/Neoflow/Data?branch=master)
[![Latest Stable Version](https://poser.pugx.org/neoflow/data/v?service=github)](https://packagist.org/packages/neoflow/data)
[![Total Downloads](https://poser.pugx.org/neoflow/data/downloads?service=github)](//packagist.org/packages/neoflow/data)
[![License](https://poser.pugx.org/neoflow/data/license?service=github)](https://packagist.org/packages/neoflow/data)

Data handler for arrays.

## Table of Contents
- [Requirement](#requirement)
- [Installation](#installation)
- [Usage](#usage)
- [Limitations](#limitations)
- [Contributors](#contributors)
- [License](#license)

## Requirement
* PHP >= 7.3

## Installation
Install package of the data handler via Composer...
```bash
composer require neoflow/data
```
...or manually download the latest release from [here](https://github.com/Neoflow/Data/releases/).

## Usage
```php
use Neoflow\Data\Data;

// Create new data handler.
$data = new Data([
    // Array with key/value pairs
]);

// Get value by key.
$default = null; // Default value, when key doesn't exists
$value = $data->getValue('key', $default);
   
// Pull value by key and delete it afterwards.
$default = null; // Default value, when key doesn't exists
$value = $data->pullValue('key', $default);

// Set value by key.
$overwrite = true; // Set FALSE to prevent overwrite existing value
$data = $data->setValue('key', 'value', $overwrite);

// Check whether value exists by key.
$valueExists = $data->hasValue('key');
   
// Delete value by key.
$data->deleteValue('key');

// Count number of values.
$numberOfValues = $data->countValues();

// Get values as array.
$array = $data->getValues();

// Iterate trough values.
$data->eachValue(function ($value, string $key) {
    // Callback for each key/value pair
});

// Clear values.
$data = $data->clearValues();

// Replace values. Existing values with similar keys will be overwritten.
$recursive = true; // Set FALSE to prevent recursive merge
$data = $data->replaceValues([
    // Array with key/value pairs
], $recursive);

// Set array as values. Existing data will be overwritten.
$data = $data->setValues([
    // Array with key/value pairs
]);

// Set referenced array as values. Existing data will be overwritten.
$values = [
    // Array with key/value pairs
];
$data = $data->setReferencedValues($values);
```

## Limitations
* Only string as key supported
* Only array as key/value pairs supported
* No dot notation implementation
* No type check for values

## Contributors
* Jonathan Nessier, [Neoflow](https://www.neoflow.ch)

If you would like to see this library develop further, or if you want to support me or show me your appreciation, please
 donate any amount through PayPal. Thank you! :beers:
 
[![Donate](https://img.shields.io/badge/Donate-paypal-blue)](https://www.paypal.me/JonathanNessier)

## License
Licensed under [MIT](LICENSE). 

*Made in Switzerland with :cheese: and :heart:*
