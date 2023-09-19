## Test task for a Laravel Livewire developer position

## Context

There is a form for entering card data and processing it. It is outdated and requires improvement, since the service has learned to process not only card payments, but also other types of payments.

## Task

1. Modify the form so that you can choose a payment method based on the methods available to the merchant:
    - Bank Card (Payer must enter the card number, card expiration date and cvc code)
    - Qiwi (Payer must enter the phone number)
    - Yoomoney (Payer must enter the Yoomoney account number that present of 14-16 digits)
    
    Implement data entry, masking and validation for each form. Please note that additional payment methods may be available in the future.

2. Add an additional request for data before making the payment itself, but after entering the data: 
    - if the payer has chosen to pay by Bank Card, he could be asked for a phone number.
    - if the payer has chosen to pay by Qiwi, he could be asked for a e-mail.
    - if the payer has chosen to pay by Yoomoney, he couldn't be asked for anything.

    The data request is carried out depending on the response of a certain internal service, which can be replaced with the `rand()` function as part of the test task.

## Expected Result

A payment page that can accept not only payments with Bank Card, but also with Qiwi and Yoomoney. At the same time, it should be expandable for further business requests if we have a new payment method. Also, this form can request additional necessary data depending on business requirements.

## Start Project

For a start project, you need run these commands:

- `composer install`
- `npm install`
- `npm run dev`
- `php artisan serve`

By the way, you don't need a DB connection for this task