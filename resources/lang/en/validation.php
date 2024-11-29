<?php

return [
    'required' => 'The :attribute field is required.',
    'email' => 'The :attribute must be a valid email address.',
    'min' => [
        'string' => 'The :attribute must be at least :min characters.',
    ],
    'numeric' => 'The :attribute must be a valid number.',
    'between' => 'The :attribute must be between :min and :max.',
    'date_format' => 'The :attribute does not match the required format of :format.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'exists' => 'The selected :attribute is invalid.',
    'in' => 'The selected :attribute is not valid.',
    'captcha' => 'CAPTCHA verification failed.',
    'unique' => 'The :attribute has already been taken.',

    'custom' => [
        'first_name' => [
            'required' => 'Please enter your first name.',
            'min' => 'Your first name must be at least 2 characters long.',
        ],
        'last_name' => [
            'required' => 'Please enter your last name.',
            'min' => 'Your last name must be at least 2 characters long.',
        ],
        'email' => [
            'required' => 'Please enter your email address.',
            'email' => 'Please provide a valid email address.',
            'unique' => 'The email address you entered is already registered.',
        ],
        'password' => [
            'required' => 'Please enter a password.',
            'confirmed' => 'The passwords do not match.',
            'min' => 'Your password must be at least 6 characters long and contain a mix of uppercase letters, numbers, and symbols.',
        ],
        'password_confirmation' => [
            'required' => 'Please confirm your password.',
        ],
        'g-recaptcha-response' => [
            'required' => 'Please verify that you are not a robot.',
            'captcha' => 'CAPTCHA verification failed. Please try again.',
        ],
        'amount' => [
            'required' => 'Please enter the amount.',
            'numeric' => 'The amount must be a valid number.',
            'between' => 'The amount must be between 0 and 999,999.99.',
        ],
        'type' => [
            'required' => 'Please select a type.',
            'min' => 'The type must be at least 3 characters long.',
        ],
        'category' => [
            'required' => 'Please select a category.',
            'in' => 'The selected category is not valid. Please choose from the available options.',
        ],
        'start_date' => [
            'required' => 'Please select a start date.',
            'date_format' => 'The start date must be in the format YYYY-MM-DD.',
        ],
        'end_date' => [
            'required' => 'Please select an end date.',
            'date_format' => 'The end date must be in the format YYYY-MM-DD.',
            'after_or_equal' => 'The end date must be the same as or after the start date.',
        ],
        'date' => [
            'required' => 'Please select a date.',
            'date_format' => 'The date must be in the format YYYY-MM-DD.',
        ],
    ],

    'attributes' => [
        'email' => 'email address',
        'first_name' => 'first name',
        'last_name' => 'last name',
        'password' => 'password',
        'amount' => 'amount',
        'type' => 'type',
        'category' => 'category',
        'start_date' => 'start date',
        'end_date' => 'end date',
        'date' => 'date',
    ],
];
