0.1) `git clone` and set up the reproduction repository by `install`ing `composer`  and `npm` dependencies
0.2) `php artisan serve` the application, log into the precompiled user and navigate to the `Morphables` `Resource`

- Ordering by "qualified" parent-child description through joins throws error on save

1) Create a new `Morphable`
2) Select `Bar` from the `Type` dropdown
3) Select any record
4) Fill any `value`
5) Hit the "Create" button
6) An error is thrown

Here is what I have understood so far by checking the stack trace and debugging:

- The error is thrown during validation, when `getInValidationRuleValues()` for the `Select` tries to retrieve the option's label.
- `vendor/filament/forms/src/Components/MorphToSelect/Type.php:176` defines a `getOptionLabelUsing()` `Closure` that adds a `where()` constraint to the query (line 179):

```php
$query->where($query->getModel()->getKeyName(), $value); // This where clause results in the unqualified "where `id` = ?" in the final query
```

