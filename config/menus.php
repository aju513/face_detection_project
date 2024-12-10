<?php

return [
    [
        'name' => "dashboard",
        "display_name" => "Dashboard",
        "icon" => "bi bi-house",
        "order" => 1,
        "permission" => "View Dashboard",
        "route" => "admin.dashboard"
    ],
    [
        'name' => "user-managements",
        "display_name" => "User Managements",
        "icon" => "bi bi-people",
        "order" => 2,
        "permission" => "View Dashboard",
        "route" => "#"
    ],
    [
        "parent" => "user-managements",
        'name' => "users",
        "display_name" => "Users",
        "icon" => "bi bi-people",
        "order" => 1,
        "permission" => "Manage Users",
        "route" => "admin.users.index"
    ],
    [
        'parent' => "user-managements",
        'name' => "roles",
        "display_name" => "Roles",
        "icon" => "bi bi-check2-all",
        "order" => 2,
        "permission" => "Manage Roles",
        "route" => "admin.roles.index"
    ],

    [
        'name' => "activities",
        "display_name" => "Activities",
        "icon" => "bi bi-safe",
        "order" => 3,
        "permission" => "Manage Activities",
        "route" => "admin.activities.index"
    ],

    [
        'name' => "teachers",
        "display_name" => "Teacher",
        "icon" => "bi bi-safe",
        "order" => 4,
        "permission" => "Manage Teachers",
        "route" => "admin.teachers.index"
    ],
    [
        'name' => "students",
        "display_name" => "Students",
        "icon" => "bi bi-safe",
        "order" => 5,
        "permission" => "Manage Students",
        "route" => "admin.students.index"
    ],
];
