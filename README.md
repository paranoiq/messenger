
# Messenger

A PHP library to interact with [Facebook Messenger Platform](https://www.messenger.com/)

This is a fork of https://github.com/ker0x/messenger with some, but not yet all changes from Messenger API v4.0

## Installation

You can install Messenger using Composer:

```
composer require kerox/messenger
```

You will then need to:
* run ``composer install`` to get these dependencies added to your vendor directory
* add the autoloader to your application with this line: ``require('vendor/autoload.php');``

## Basic usage

```php
use Kerox\Messenger\Messenger;

$messenger = new Messenger($appSecret, $verifyToken, $pageToken)
$messenger->send()->message(<USER_ID>, 'Hello world!');
```

## Advance usage

Please, refer to the [wiki](https://github.com/ker0x/messenger/wiki) to learn how to use this library

## Features

### API

- [x] Broadcast
- [x] Code
- [x] Insights
- [x] Nlp
- [x] Persona
- [x] Profile
- [x] Send
- [x] Tag
- [x] Thread
- [x] User
- [x] Webhook

### Templates

- [x] Airline Boarding Pass
- [x] Airline Check In
- [x] Airline Itinerary
- [x] Airline Update
- [x] Buttons
    - [x] Account Link
    - [x] Account Unlink
    - [x] Nested
    - [x] Payment
    - [x] Phone Number
    - [x] Postback
    - [x] Share
    - [x] Web Url
- [x] Generic
- [x] List
- [x] Media
- [x] Receipt

### Callback

- [x] Account Linking
- [x] AppRoles
- [x] Checkout Update
- [x] Delivery
- [x] GamePlay
- [x] Message
- [x] Message Echo
- [x] Optin
- [x] PassThreadControl
- [x] Payment
- [x] Policy Enforcement
- [x] Postback
- [x] Pre Checkout
- [x] Read
- [x] Referral
- [x] RequestThreadControl
- [x] TakeThreadControl
