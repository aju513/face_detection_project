**********************\*\*\*\***********************BASIC COMMANDS**********************************\***********************************

Generate Model,controller,migration table, repository,UI :
-> php artisan generate:model

Generate Permission :
-> php artisan generate:permission

Generate Menu :
-> php artisan generate:menu

Generate Setting :
-> php artisan generate:setting

Generate Super-User :
-> php artisan generate:super-user

Run Migrations :
-> php artisan generate:migration

************************\*************************Naming Conventions********************************\*********************************

1. Model : eg; User , UserEducation
2. Controller : eg; UserController , UserEducationController
3. Repository/UI : eg; UserRepository , UserEducationRepository, UserUI,UserEducationUI
4. Migration : eg; create_users_table , create_user_educations_table
5. Permission : eg; Manage Users , Manage User Educations
6. Menu : eg; Users , User Educations
7. Requests : eg; UserRequest , UserEducationRequest
8. Controller functions : eg; getAllUser() , storeUserEducation()
9. variables : $user_educations or $userEducations
10. Route : eg; Route::get('users', 'UserController@getAllUser');
11. View : eg; For file : user.blade.php , user-education.blade.php
    For folder : users, user-educations

************************\*************************Basic CRUD Steps********************************\*********************************
Laravel works on MVC Architecture , so you must have basic knowledge of MVC pattern.

    Suppose we want to do CRUD operation for ` Department ` model , then we have to start with following steps :

    1.  Generate Model, Controller , Repository ,UI , view folder , database
            Syntax :  php artisan generate:model

            Follow the steps carefully with proper naming conventions
    2.  Create a route in routes/admin.php
        eg: Route::resource('departments','DepartmentController')
         route name must be plural

    3.  Make Permissions on file config/permissions.php
        eg; 'Manage Departments',
            'Create Departments',
            'Edit Departments',
            'Delete Departments',

    4.  Make Menu on file config/menus.php

        eg;
        [
            'name' => "departments",
            "display_name" => "Departments",
            "icon" => "bi bi-house",
            "order" => 1,
            "permission" => "Manage Departments",
            "route" => "admin.departments.index"
        ],

    5. Go to migrations table and add database columns

    6. Go to app/Models/Department file and add table name and fields like below

        eg;
        protected $table = "departments";

        protected $fillable = [
            'name',    'code',
        ];

    7. Go to app/Http/Controllers/Admin/DepartmentController and add view folder name and title
        eg;
        $this->view = "roles";
        $this->title = "Roles";

    8. Go to app/UI/DepartmentUI and add like below :
        eg;
        //route name

        public $route = 'departments';

        // for table columns
        public $columns = [
            'name' => 'Name',
            'code' => 'Code',
        ];

        // for permission
        public $permissions = [
            'index' => 'Manage Departments',
            'create' => 'Create Departments',
            'edit' => 'Edit Departments',
            'store' => 'Create Departments',
            'update' => 'Edit Departments',
            'destroy' => 'Delete Departments',
            'status' => 'Edit Departments'
        ];


        //for validation

        public $rules = [
            'store' => [
                'name' => 'required|max:255',
                'code' => 'nullable|string|max:255',
            ],
            'update' => [
                'name' => 'required|max:255',
                'code' => 'nullable|max:255',
            ]
        ];

    9. Go to resources/views/admin/departments/form.blade.php and edit your form



    10. Upto step 9 basic crud operation is completed

Notes :

1. For static values in dropdowns , we place them in config/dropdown.php
   eg;
   'gender' => [
   1 => 'Male',
   2 => 'Female',
   3 => 'Other'
   ],

2. To overwrite store() and update() function, go to Repository of your Model in app/Repositories/<your_model>Repository and write code there
