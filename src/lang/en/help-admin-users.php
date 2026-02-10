<?php

return [
    'header' => [
        'title' => 'Users and Administrators Management',
        'subtitle' => 'Complete guide for managing user and administrator accounts in the system',
        'role_guide' => [
            'title' => 'In this guide you will learn:',
            'items' => [
                'users' => 'Standard Users Management',
                'admins' => 'Administrators Management (Superadmin only)',
                'permissions' => 'Permission differences',
                'practices' => 'Best practices',
            ],
        ],
    ],
    'section_users' => [
        'title' => 'Standard Users Management',
        'lead' => 'Standard users are people who can create tickets and check the status of their requests. As an administrator, you can manage their accounts from the admin panel.',
        'access' => [
            'title' => 'How to access',
            'intro' => 'To access user management:',
            'steps' => [
                'From the left sidebar, find the <strong>"Manage All Users"</strong> section',
                'Click on <strong>"Manage Users"</strong>',
                'The main screen will open with the list of all registered users',
            ],
            'important' => '<strong>Important:</strong> This feature is only available for <strong>superadministrators</strong>. Regular administrators cannot manage users.',
        ],
        'screen_list' => [
            'title' => 'The User List Screen',
            'intro' => 'When accessing this section, you will see a complete table with all system users:',
            'columns_title' => 'Table columns',
            'table_headers' => [
                'col' => 'Column',
                'show' => 'What it shows',
                'use' => 'What it is for',
            ],
            'table_rows' => [
                'id' => ['col' => 'ID', 'show' => 'Unique user identifier', 'use' => 'Technical reference of the user in the system'],
                'name' => ['col' => 'Name', 'show' => 'User full name', 'use' => 'Visually identify the user'],
                'email' => ['col' => 'Email', 'show' => 'Access email address', 'use' => 'Contact and login credential'],
                'created' => ['col' => 'Creation Date', 'show' => 'When the user registered', 'use' => 'Know account age'],
                'actions' => ['col' => 'Actions', 'show' => 'Management buttons', 'use' => 'Edit or delete the user'],
            ],
        ],
        'tools' => [
            'title' => 'Table Tools',
            'search' => [
                'title' => 'Search',
                'intro' => 'In the top right corner you will find a search field.',
                'title_how' => '<strong>How to use it:</strong>',
                'steps' => [
                    'Type the name or email of the user you are looking for',
                    'The table filters automatically as you type',
                    'Clear the text to see all users again',
                ],
                'example' => '<strong>Example:</strong> Type "mary" to find Mary Smith or mary@example.com',
            ],
            'sort' => [
                'title' => 'Sorting',
                'intro' => 'Click on any column header to sort:',
                'title_options' => '<strong>Options:</strong>',
                'options_list' => [
                    '<strong>First click:</strong> Ascending order (A→Z, 1→9)',
                    '<strong>Second click:</strong> Descending order (Z→A, 9→1)',
                    '<strong>Indicator:</strong> Arrow showing current order',
                ],
                'useful' => '<strong>Useful for:</strong> Sorting by creation date to see newest users',
            ],
            'pagination' => [
                'title' => 'Pagination and Records per Page',
                'selector_title' => '<strong>Selector "Show [number] entries":</strong>',
                'selector_list' => [
                    'Located in the top left corner',
                    'Options: 10, 25, 50 or 100 users per page',
                    'Defaults to 10',
                ],
                'controls_title' => '<strong>Pagination controls:</strong>',
                'controls_list' => [
                    'At the bottom of the table',
                    'Buttons: "Previous", page numbers, "Next"',
                    'Indicator: "Showing 1 to 10 of 45 entries"',
                ],
            ],
        ],
    ],
    'section_create_user' => [
        'title' => 'Create New User',
        'step1' => [
            'title' => 'Step 1: Access the creation form',
            'text1' => 'On the user list screen, at the top right, you will find a green button:',
            'image_alt' => 'Button to create a user.',
            'text2' => 'Click on it to open the creation form.',
        ],
        'step2' => [
            'title' => 'Step 2: Fill in the form',
            'intro' => 'The user creation form contains the following fields:',
            'fields' => [
                'name' => ['label' => 'Full Name', 'placeholder' => 'Ex: John Doe', 'small' => 'The name the user will see in their profile and you will see in the list.'],
                'email' => ['label' => 'Email Address', 'placeholder' => 'Ex: john.doe@company.com', 'small' => 'Will be their username for logging in. Must be unique in the system.'],
                'password' => ['label' => 'Password', 'placeholder' => 'Minimum 8 characters', 'small' => 'Must be at least 8 characters. The user can change it later.'],
                'confirm' => ['label' => 'Confirm Password', 'placeholder' => 'Repeat password', 'small' => 'Type the same password to confirm there are no errors.'],
            ],
            'alert_required' => 'Fields marked with <span class="text-danger">*</span> are mandatory. The form will not submit if they are missing.',
        ],
        'step3' => [
            'title' => 'Step 3: Save the user',
            'intro' => 'Once the form is completed correctly:',
            'list' => [
                'Check that all data is correct',
                'Click the green <strong>"Create User"</strong> button at the end of the form',
                'The system will validate data automatically',
            ],
            'success_card' => [
                'title' => 'If everything is correct',
                'text1' => 'You will see a success message at the top:',
                'alert' => 'User created successfully',
                'text2' => 'You will be redirected to the user list and the new user will appear in the table.',
            ],
            'error_card' => [
                'title' => 'If there are errors',
                'intro' => 'The system will show specific error messages below each problematic field:',
                'list' => [
                    '<strong>"The name field is required"</strong> - Missing name',
                    '<strong>"The email has already been taken"</strong> - That email already exists in the system',
                    '<strong>"The password confirmation does not match"</strong> - Password and confirmation are different',
                    '<strong>"The password must be at least 8 characters"</strong> - Password too short',
                ],
                'footer' => 'Correct the indicated errors and click "Create User" again.',
            ],
        ],
    ],
    'section_edit_user' => [
        'title' => 'Edit Existing User',
        'when' => [
            'title' => 'When to edit a user',
            'intro' => 'You may need to edit a user when:',
            'list' => [
                'The user changed name (e.g. marriage)',
                'The email address is no longer valid and needs updating',
                'The user forgot their password and you need to reset it',
                'There are typos in user data',
            ],
        ],
        'step1' => [
            'title' => 'Step 1: Locate the user',
            'list' => [
                'In the user list, find the user you want to edit (use search if needed)',
                'In the "Actions" column for that row, you will see two buttons',
                'Click on the <strong>yellow button with pencil icon</strong> (Edit)',
            ],
            'image_alt' => 'User action buttons section, <strong>edit (yellow)</strong> and delete (red).',
        ],
        'step2' => [
            'title' => 'Step 2: Modify data',
            'intro' => 'A form pre-filled with current user data will open. You can modify:',
            'table_headers' => ['field' => 'Field', 'can_change' => 'Can change?', 'considerations' => 'Considerations'],
            'table_rows' => [
                'name' => ['field' => 'Name', 'can_change' => 'Yes', 'considerations' => 'No restrictions'],
                'email' => ['field' => 'Email', 'can_change' => 'Yes', 'considerations' => 'Must be unique (not used by another user)'],
                'password' => ['field' => 'Password', 'can_change' => 'Optional', 'considerations' => 'Leave blank if you DO NOT want to change it. Fill only if you want to set a new one.'],
                'confirm' => ['field' => 'Confirm Password', 'can_change' => 'Optional', 'considerations' => 'Only if changing password'],
            ],
            'alert_password' => '<strong>Important about password:</strong> If you leave password fields blank, the user\'s current password will NOT be modified. Only fill these fields if you want to change it.',
        ],
        'step3' => [
            'title' => 'Step 3: Save changes',
            'list' => [
                'Check that all changes are correct',
                'Click the <strong>"Update User"</strong> button',
                'If everything is correct, you will see a success message and be redirected to the list',
            ],
            'success_alert' => 'User updated successfully',
        ],
    ],
    'section_delete_user' => [
        'title' => 'Delete User',
        'alert_caution' => '<strong>CAUTION!</strong> Deleting a user is a <strong>permanent and irreversible</strong> action. All user data will be lost.',
        'when' => [
            'title' => 'When to delete a user',
            'intro' => 'You should only delete a user when:',
            'list' => [
                'The user has left the organization and no longer needs access',
                'A test account was created and is no longer needed',
                'A duplicate account was detected by mistake',
                'The user expressly requests it (right to be forgotten)',
            ],
        ],
        'note_orphans' => '<strong>Note:</strong> When deleting a user, all their tickets will remain in the system but will become orphaned (no visible owner). This is intentional to keep history.',
        'step1' => [
            'title' => 'Step 1: Request confirmation',
            'list' => [
                'In the user list, locate the user you want to delete',
                'In the "Actions" column, click the <strong>red button with trash icon</strong>',
            ],
            'image_alt' => 'User action buttons section, edit (yellow) and <strong>delete (red)</strong>.',
        ],
        'step2' => [
            'title' => 'Step 2: Confirmation screen',
            'intro' => 'A new screen will open with a clear warning message:',
            'image_alt' => 'User deletion confirmation modal.',
        ],
        'step3' => [
            'title' => 'Step 3: Confirm or cancel',
            'list' => [
                '<strong>If you click "Cancel":</strong> You will return to the list without deleting anything',
                '<strong>If you click "Yes, delete user":</strong> The user will be permanently deleted',
            ],
            'success_alert' => 'User deleted successfully',
        ],
    ],
    'section_admins' => [
        'title' => 'Administrators Management (Superadmin Only)',
        'alert_access' => '<strong>Restricted Access:</strong> Only <strong>superadministrators</strong> can access this feature. Regular administrators will not see this option in the menu.',
        'lead' => 'Administrators are special users who can manage tickets, users, and the system in general. Administrator management works very similarly to user management, but with some key differences.',
        'access' => [
            'title' => 'How to access',
            'list' => [
                'From the left sidebar, find the <strong>"Manage All Users"</strong> section',
                'Click on <strong>"Manage Admins"</strong>',
                'The screen with the list of administrators will open',
            ],
            'image_alt' => 'Example of administrators table.',
        ],
        'differences' => [
            'title' => 'Differences from User Management',
            'table_headers' => ['feature' => 'Feature', 'users' => 'Standard Users', 'admins' => 'Administrators'],
            'table_rows' => [
                'access' => ['feature' => 'System Access', 'users' => 'User Panel (/user)', 'admins' => 'Admin Panel (/admin)'],
                'create_tickets' => ['feature' => 'Can create tickets', 'users' => 'Yes', 'admins' => 'No'],
                'manage_tickets' => ['feature' => 'Can manage tickets', 'users' => 'No', 'admins' => 'Yes'],
                'extra_field' => ['feature' => 'Extra field in form', 'users' => 'None', 'admins' => 'Checkbox "Is Superadmin?"'],
                'quantity' => ['feature' => 'Recommended quantity', 'users' => 'Unlimited (as needed)', 'admins' => 'Limited (support staff only)'],
            ],
        ],
        'superadmin' => [
            'title' => 'Special Field: "Is Superadmin?"',
            'intro' => 'When creating or editing an administrator, you will see an additional field that does NOT exist for standard users:',
            'image_alt' => '"Is superadmin?" option in administrator form.',
            'cards' => [
                'no_check' => [
                    'title' => 'If you do NOT check the box',
                    'intro' => 'The administrator will be "regular" and can:',
                    'list' => ['View tickets assigned to them', 'Comment on tickets', 'Change ticket statuses', 'View notifications', 'View event history'],
                ],
                'yes_check' => [
                    'title' => 'If you check the box',
                    'intro' => 'The administrator will be "super" and can do ALL the above, plus:',
                    'list' => ['Create, edit and delete users', 'Create, edit and delete administrators', 'Manage ticket types', 'View ALL system tickets', 'No restrictions of any kind'],
                ],
            ],
            'alert_security' => '<strong>Security Tip:</strong> Only assign the superadmin role to highly trusted people. Too many superadmins can compromise system security.',
        ],
        'process' => [
            'title' => 'Complete Management Process',
            'intro' => 'Administrator management follows exactly the same steps as user management:',
            'create' => [
                'title' => 'Create Administrator',
                'steps' => [
                    'Click the green <strong>"Create New Admin"</strong> button',
                    'Fill in the form:
                        <ul>
                            <li>Full Name</li>
                            <li>Email (unique)</li>
                            <li>Password (minimum 8 characters)</li>
                            <li>Confirm password</li>
                            <li><strong>Check or uncheck "Is Superadmin?" box</strong></li>
                        </ul>',
                    'Click <strong>"Create Admin"</strong>',
                    'If everything is correct, you will see the success message and the new admin will appear in the list',
                ],
            ],
            'edit' => [
                'title' => 'Edit Administrator',
                'steps' => [
                    'Locate the administrator in the list',
                    'Click the yellow <strong>"Edit"</strong> button',
                    'Modify the fields you need:
                        <ul>
                            <li>Name</li>
                            <li>Email</li>
                            <li>Password (optional, leave blank if you don\'t want to change it)</li>
                            <li><strong>Change superadmin status</strong> (check/uncheck box)</li>
                        </ul>',
                    'Click <strong>"Update Admin"</strong>',
                    'Changes will be applied immediately',
                ],
                'note' => '<strong>Important:</strong> You can convert a regular administrator into a superadmin (or vice versa) at any time simply by checking or unchecking the box.',
            ],
            'delete' => [
                'title' => 'Delete Administrator',
                'steps' => [
                    'Locate the administrator in the list',
                    'Click the red <strong>"Delete"</strong> button',
                    'Read the confirmation screen carefully',
                    'If you are sure, click <strong>"Yes, delete admin"</strong>',
                    'The administrator will be permanently deleted',
                ],
                'warning' => '<strong>WARNING:</strong> You cannot delete your own administrator account while logged in. Nor can you delete the last superadministrator in the system.',
            ],
        ],
    ],
    'section_permissions' => [
        'title' => 'Permissions Matrix',
        'intro' => 'This table summarizes what each account type can do in the system:',
        'table_headers' => ['action' => 'Action', 'user' => 'Standard User', 'admin' => 'Regular Admin', 'superadmin' => 'Superadmin'],
        'table_rows' => [
            'create_own' => ['action' => 'Create own tickets', 'user' => '✓', 'admin' => '✗', 'superadmin' => '✗'],
            'view_all' => ['action' => 'View all tickets', 'user' => '✗', 'admin' => 'Only assigned', 'superadmin' => '✓ All'],
            'comment' => ['action' => 'Comment on tickets', 'user' => 'Own only', 'admin' => '✓', 'superadmin' => '✓'],
            'change_status' => ['action' => 'Change ticket status', 'user' => '✗', 'admin' => '✓', 'superadmin' => '✓'],
            'assign' => ['action' => 'Assign tickets', 'user' => '✗', 'admin' => '✓', 'superadmin' => '✓'],
            'notifications' => ['action' => 'View notifications', 'user' => '✓', 'admin' => '✓', 'superadmin' => '✓'],
            'events' => ['action' => 'View event history', 'user' => '✗', 'admin' => '✓', 'superadmin' => '✓'],
            'manage_users' => ['action' => 'Manage users', 'user' => '✗', 'admin' => '✗', 'superadmin' => '✓'],
            'manage_admins' => ['action' => 'Manage administrators', 'user' => '✗', 'admin' => '✗', 'superadmin' => '✓'],
            'manage_types' => ['action' => 'Manage ticket types', 'user' => '✗', 'admin' => '✗', 'superadmin' => '✓'],
        ],
    ],
    'section_practices' => [
        'title' => 'Best Practices',
        'recommendations' => [
            'title' => 'Recommendations',
            'list' => [
                '<strong>Use corporate emails</strong> for administrators, not personal ones',
                '<strong>Set strong passwords</strong> (8+ chars, letters, numbers, symbols)',
                '<strong>Limit superadministrators</strong> to 2-3 trusted people',
                '<strong>Document important changes</strong> (who created/deleted which account)',
                '<strong>Periodically review</strong> the user list to detect inactive accounts',
                '<strong>Clearly name</strong> users (full name, not nicknames)',
            ],
        ],
        'errors' => [
            'title' => 'Avoid These Errors',
            'list' => [
                '<strong>Do not create test users</strong> in the production system',
                '<strong>Do not use simple passwords</strong> like "12345678" or "password"',
                '<strong>Do not give superadmin permissions</strong> to all administrators',
                '<strong>Do not delete users</strong> without confirming with your team first',
                '<strong>Do not share credentials</strong> between multiple people',
                '<strong>Do not ignore duplicate emails</strong> when creating accounts',
            ],
        ],
        'advice' => [
            'title' => 'Advice',
            'text' => 'Keep an external list (document or spreadsheet) updated with all active administrators, their roles, and creation date. This will help with security audits.',
        ],
    ],
];
