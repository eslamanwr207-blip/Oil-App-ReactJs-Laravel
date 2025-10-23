<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Supported Locales
    |--------------------------------------------------------------------------
    |
    | These are the locales your application supports for translations.
    |
    */
    'locales' => [
        'en',
        'ar',
    ],

    /*
    |--------------------------------------------------------------------------
    | Locale Separator
    |--------------------------------------------------------------------------
    |
    | This is used when generating keys for translatable validation rules.
    |
    */
    'locale_separator' => '-',

    /*
    |--------------------------------------------------------------------------
    | Locale Key
    |--------------------------------------------------------------------------
    |
    | This key is used in the translation tables to indicate the locale.
    |
    */
    'locale_key' => 'locale',

    /*
    |--------------------------------------------------------------------------
    | Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale to use when a translation is missing.
    | null uses the app.fallback_locale config value.
    |
    */
    'fallback_locale' => null,

    /*
    |--------------------------------------------------------------------------
    | Translation Suffix
    |--------------------------------------------------------------------------
    |
    | Define the default translation model suffix (default is 'Translation').
    |
    */
    'translation_suffix' => 'Translation',

    /*
    |--------------------------------------------------------------------------
    | Automatically Load Translations
    |--------------------------------------------------------------------------
    |
    | When using ->toArray() or ->toJson(), this determines if translations
    | are always loaded.
    |
    */
    'to_array_always_loads_translations' => true,

    /*
    |--------------------------------------------------------------------------
    | Rule Factory Configuration
    |--------------------------------------------------------------------------
    |
    | Settings for generating validation rules for each language.
    |
    */
    'rule_factory' => [
        'enabled' => true,
        'locale_key' => '%locale%',
        'fallback_key' => '',
    ],
];
