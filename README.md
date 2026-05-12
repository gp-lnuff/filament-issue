0.1) `git clone` and set up the reproduction repository by `install`ing `composer`  and `npm` dependencies
0.2) `php artisan serve` the application, log into the precompiled user and navigate to the `Users` `Resource`

- Changing dynamic `Select` `options()` does not change `Select` `$state` (expected/intended(?))

1) Create a new `User`
2) Select an email from the dropdown
3) Select a password from the dropdown
4) "Create" to dump the form's raw state - make a note of the password field's value
5) Select the other email from the dropdown - make a note of the password field's shown selected option
6) "Create" to dump the form's raw state - observe unchanged password field's value

As an aside, the reproduction repository uses the form's `rawState()` because validation from `getState()` would catch that the unchanged password field's value is not valid.

- Manually managing `Select` `$state` keeps consistency between the `$state` and the shown selected option **when the dynamic options are different**

1) In `app/Filament/Resources/Users/Schemas/UserForm.php`, uncomment lines `30-33`
2) Create a new `User`
3) Select an email from the dropdown
4) "Create" to dump the form's raw state
5) Select the other email from the dropdown - make a note of the password field's shown selected option
6) "Create" to dump the form's raw state - observe that state matches shown selected option
7)  In `app/Filament/Resources/Users/Schemas/UserForm.php`, comment lines `30-33` again for the next steps

- Manually managing `Select` `$state` does **not**  keep consistency between the `$state` and the shown selected option **when the dynamic options have a common value that shouldn't change**

1) In `app/Filament/Resources/Users/Schemas/UserForm.php`, uncomment lines `29`, `42` and `45`
2) Create a new `User`
3) Select an email from the dropdown
4) "Create" to dump the form's raw state
5) Select the other email from the dropdown - observe that the selected option changes
6) "Create" to dump the form's raw state - observe that state does **not** match shown selected option

This is naturally due to the fact that `$set`ting the `Select`'s `$state` to the common option when that is already the selected option is not a proper "update" and chances are some internals are not firing. I have confirmed that the `$shouldCallUpdatedHooks` on the `$set()` has no bearing on this.
This case's behaviour is identical to the first case's behaviour - in fact, commenting line `29` again has no impact (granted the common option is manually selected the first time)
