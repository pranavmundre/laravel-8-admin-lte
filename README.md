# Admin LTE integration with laravel 8

this is the core project for user and admin authentication 


to add admin use tinker 
```
$ php artisan tinker 
>>> $model = new App\Models\Admin;
=> App\Models\Admin {#3581}
>>> $model->firstname = 'Admin'
=> "Admin"
>>> $model->email = 'admin@gmail.com'
=> "admin@gmail.com"
>>> $model->mobile_no = '987654321'
=> "987654321"
>>> $model->password = Hash::make('admin123')
=> "$2y$10$FDu7iDKnfta6E/m1yZnDxOHINoPtTym89Z49SEDPe5ks33eJ0LeNW"
>>> $model->save();
```

Thank you.
