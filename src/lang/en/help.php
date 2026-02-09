<?php

return [
    'title' => 'Help · Ticket Management',
    'header' => 'Ticket Management',
    'breadcrumbs' => [
        'help' => 'Help',
        'tickets' => 'Tickets',
    ],
    'intro' => [
        'title' => 'What is a Ticket?',
        'text' => 'A "Ticket" is the digital record of your request, issue, or question. It is like a file that contains all the problem information, the conversation with the technician, and the current resolution status.',
    ],
    'create' => [
        'title' => '1. How to create a new Ticket?',
        'step1' => 'Follow these steps to report an issue:',
        'list' => [
            '1' => [
                'title' => 'Go to the Tickets section:',
                'text' => 'In the left sidebar menu, click on',
            ],
            '2' => [
                'title' => 'Create Button:',
                'text' => 'Click on the button',
                'suffix' => 'located at the top right of the table.'
            ],
            '3' => [
                'title' => 'Complete the Form:',
                'li1' => [
                    'text' => '(Required) Write a brief and clear summary of the problem (e.g. "Error printing invoice"). Avoid generic titles like "Help" or "Problem".'
                ],
                'li2' => [
                    'text' => '(Required) Explain what is happening. Include error messages if any.',
                    'alert' => '<strong>Important:</strong> This field has a limit of <strong>255 characters</strong>.<br>If you need to elaborate more, create the ticket with a brief summary and add all necessary details using a <strong>Comment</strong> (which allows unlimited text) once created.'
                ],
                'li3' => [
                    'text' => 'Select how urgent it is. <i>Use responsibly</i>; marking everything as "High" can delay management.'
                ],
                'li4' => [
                    'text' => 'Choose the category that best fits (e.g. Technical Issue, Inquiry, etc.).'
                ],
                'note' => '<strong>Note on Files:</strong> Currently, it is not possible to attach files directly. Please describe the content or use external links if necessary.',
            ],
            '4' => [
                'title' => 'Submit:',
                'text' => 'Click the <strong>Save</strong> button. The system will redirect you to the ticket list and you will see a confirmation message.'
            ]
        ],
        'img_caption' => 'Example of the form to create a new ticket'
    ],
    'list' => [
        'title' => '2. View and Search my Tickets',
        'intro' => 'On the main "Tickets" screen, you will see a list of all your created tickets, ordered from newest to oldest.',
        'img_caption' => 'Example of the table listing the tickets',
        'table_title' => 'The Ticket Table',
        'table_intro' => 'Each row represents a ticket and includes key columns:',
        'columns' => [
            'id' => '<strong>ID:</strong> Unique identification number of the ticket (useful for references).',
            'title' => '<strong>Title:</strong> The subject of the ticket.',
            'status' => '<strong>Status:</strong> Current process status (see Status section).',
            'priority' => '<strong>Priority and Type:</strong> Ticket classification.',
            'actions' => '<strong>Actions:</strong> Buttons to interact with the ticket.'
        ],
        'search_title' => 'Search',
        'search_text' => 'If you have many tickets, use the search bar at the top of the list. Type a keyword from the title (e.g. "printer") and press "Enter" or the search button. This will filter the list to show only matches.'
    ],
    'states' => [
        'title' => '3. Ticket Lifecycle and Statuses',
        'intro' => 'A ticket goes through several states from birth to closing. Understanding them is vital to know what is expected of you:',
        'open' => 'Open / Pending',
        'open_desc' => 'The ticket has been created and sent to the system correctly. Administrators can see it, but have not yet started working on it or are in the triage and assignment process.',
        'progress' => 'In Progress / Assigned',
        'progress_desc' => 'An administrator has been assigned to your case and is working on it. You will likely receive comments requesting more information. Check your notifications.',
        'resolved' => 'Resolved',
        'resolved_desc' => 'The administrator indicates that the problem has been solved.',
        'resolved_action' => '<strong>YOUR TURN!</strong> At this point, your confirmation is required.',
        'resolved_list' => [
            '1' => 'If it works: You must use the <strong>"Validate"</strong> option to close the ticket.',
            '2' => 'If it does NOT work: You must comment indicating that the failure persists so the administrator can continue working.'
        ],
        'closed' => 'Closed',
        'closed_desc' => 'The process has ended. The ticket is saved in your history for reference, but no further changes, comments, or edits are allowed.'
    ],
    'detail' => [
        'title' => '4. Detail Screen: Full Structure',
        'intro' => 'The ticket detail screen is designed to keep everything at hand. It is divided into three main areas (Left, Right, and Bottom). Below we explain each:',
        'img_caption' => '<em>General view: Left (Info), Right (New message), Bottom (History).</em>',
        'zone_a' => [
            'title' => 'A. Left Zone: Information and Validation',
            'text' => 'This panel contains the "technical sheet" of your issue:',
            'list' => [
                '1' => '<strong>Title and Description:</strong> The problem as you reported it.',
                '2' => '<strong>Status and Priority:</strong> Colored badges indicating current status.',
                '3' => '<strong>Dates:</strong> Creation and last update.'
            ],
            'validation' => [
                'title' => 'Validation Area (Important!)',
                'text' => 'Only appears when the status is <strong>Resolved</strong>.',
                'validate' => '<span class="badge badge-success"><i class="fas fa-check"></i> Validate</span>: Confirms the solution works. The ticket will close (Closed).',
                'reject' => '<span class="badge badge-danger"><i class="fas fa-times"></i> Reject</span>: Indicates it does NOT work. The ticket will go back to "Pending".'
            ]
        ],
        'zone_b' => [
            'title' => 'B. Right Zone: Add Comments',
            'text' => 'Use this form to communicate with support. It is the official channel to add information.',
            'usage' => 'When to use it?',
            'list' => [
                '1' => 'To answer technician questions.',
                '2' => 'To attach new data or errors.',
                '3' => 'To ask "How is my case going?".'
            ],
            'footer' => 'Simply type and click <strong>"Add Comment"</strong>.'
        ],
        'zone_c' => [
            'title' => 'C. Bottom Zone: Conversation History',
            'text' => 'Below the top panels, you will see the <strong>Timeline</strong>. Here lies the entire history of the ticket.',
            'list' => [
                '1' => '<strong>All in one place:</strong> You will see your messages and admin responses interleaved by date.',
                '2' => '<strong>Identification:</strong>',
                'sublist' => [
                    '1' => 'Your messages have <i class="fas fa-edit text-primary"></i> Edit and <i class="fas fa-trash text-danger"></i> Delete buttons.',
                    '2' => 'Admin responses appear with their name and distinctive header.'
                ]
            ],
            'img_caption' => 'Example of conversation in the ticket'
        ]
    ],
    'advanced' => [
        'title' => '5. Edit and Delete (Advanced Management)',
        'intro' => 'You may need to correct initial information or cancel a request by mistake. Here we explain how these critical processes work.',
        'edit' => [
            'title' => 'A. Edit a Ticket',
            'subtitle' => 'Available as long as the ticket is not <strong>Closed</strong>.',
            'step1' => 'Click the <span class="badge badge-warning"><i class="fas fa-pencil-alt"></i> Edit</span> button in the main table.',
            'step2' => 'A form similar to creation will open, but with your data loaded.',
            'step2_list' => '<em>You can modify:</em> Title, Description, Priority, and Type.',
            'step3' => 'Clicking <strong>Update</strong> will return you to the list.',
            'success_title' => 'Success Confirmation:',
            'success_text' => 'You will see a green message at the top:<br><em>"Ticket updated successfully."</em>',
            'img_caption' => 'Example of the confirmation message after editing a ticket'
        ],
        'delete' => [
            'title' => 'B. Delete a Ticket',
            'warning' => '<strong><i class="fas fa-exclamation-triangle"></i> Warning!</strong> This action is irreversible. The ticket will disappear from your history and the admin panel.',
            'step1' => 'Click the <span class="badge badge-danger"><i class="fas fa-trash"></i> Delete</span> button.',
            'step2' => '<strong>Security Step:</strong> The browser will show a pop-up window asking:<br><em>"Are you sure you want to delete this ticket?"</em>',
            'step3' => 'If you accept, the following will happen:',
            'step3_list' => [
                '1' => 'An alert will appear confirming: <em>"Ticket deleted"</em>.',
                '2' => 'The table will update automatically and the row will disappear.'
            ],
            'img_caption' => 'Example of the confirmation message'
        ]
    ],
    'introduction_page' => [
        'title' => 'Help · Introduction',
        'header' => 'Introduction and First Steps',
        'breadcrumbs' => 'Help',
        'welcome' => [
            'title' => 'Welcome to the User Portal',
            'text1' => 'Welcome to the incident management and support platform (Tickets). This tool has been designed to centralize, organize, and streamline all communication between you and the technical support/administration team.',
            'text2' => 'Through this portal, you can report problems, make service requests, check the status of your previous requests, and maintain direct and recorded communication with those responsible for resolving your issues.',
            'can_do' => [
                'title' => 'What you CAN do:',
                'list' => [
                    'create' => '<strong>Create Tickets:</strong> Open new support requests detailing your problem or requirement.',
                    'history' => '<strong>Consult History:</strong> View all tickets you have created, filter them, and search by keywords.',
                    'comment' => '<strong>Comment:</strong> Dialogue with agents through a comment thread within each ticket.',
                    'notifications' => '<strong>Receive Notifications:</strong> Stay aware of updates, status changes, or responses on your tickets.',
                    'validate' => '<strong>Validate Solutions:</strong> Confirm if the solution proposed by the agent has resolved your problem.',
                    'edit' => '<strong>Edit/Delete:</strong> Modify your ticket information or delete them (under certain conditions).'
                ]
            ],
            'cannot_do' => [
                'title' => 'What you CANNOT do:',
                'list' => [
                    'view_others' => 'View other users\' tickets (for privacy and security).',
                    'assign' => 'Assign tickets to specific administrators (the system or admins handle assignment).',
                    'modify_closed' => 'Modify a ticket once it has been closed (although you can consult it).'
                ]
            ]
        ],
        'dashboard' => [
            'title' => 'User Control Panel (Dashboard)',
            'text' => 'Upon logging in, you will immediately access your <strong>Control Panel</strong>. This is your "home base".',
            'img_caption' => 'Example of the User Control Panel',
            'green_box' => [
                 'title' => 'Open Tickets',
                 'desc' => 'In <strong>Green</strong>. Active tickets being attended to.'
            ],
            'blue_box' => [
                 'title' => 'Resolved Tickets',
                 'desc' => 'In <strong>Blue</strong>. Solved but pending your validation.'
            ],
            'yellow_box' => [
                 'title' => 'Pending Tickets',
                 'desc' => 'In <strong>Yellow</strong>. Tickets awaiting action.'
            ],
            'components' => [
                'title' => 'Panel Components:',
                'summary_dt' => 'Status Summary',
                'summary_dd' => 'Three colored cards (Green, Blue, Yellow) giving you a quick glance at how many tickets you have in each situation.',
                'latest_dt' => 'Latest Tickets',
                'latest_dd' => 'A list at the bottom with tickets that have had recent activity. Includes quick buttons to <span class="badge badge-primary"><i class="fas fa-eye"></i> View</span> and <span class="badge badge-warning"><i class="fas fa-edit"></i> Edit</span>.',
                'create_dt' => 'Quick Create',
                'create_dd' => 'A button at the top right of the main card to open a new incident instantly.'
            ]
        ],
        'profile' => [
            'title' => 'My Profile',
            'text1' => 'You can access your profile by clicking your name in the top right corner and selecting the <strong><i class="fas fa-user fa-2x mb-2"></i></strong> icon or by clicking on <strong>your name in the side menu</strong>.',
            'text2' => 'In this section, you can view your data registered in the system:',
            'list' => [
                'name' => 'Full Name.',
                'email' => 'Associated Email.',
                'date' => 'Registration Date.'
            ],
            'note' => '<strong>Important Note:</strong> For security reasons, editing sensitive data (like email) is restricted. If you need to correct erroneous data, please create a ticket requesting it from an administrator.',
            'img1_caption' => 'Example of the options menu',
            'img2_caption' => 'Example of profile access from the side menu'
        ],
        'support' => [
            'title' => 'Need more help?',
            'text' => 'This help section is divided into three fundamental parts. We recommend reading them to master the tool:',
            'buttons' => [
                'intro' => 'Introduction',
                'tickets' => 'Tickets',
                'notifications' => 'Notifications',
                'profile' => 'My Profile'
            ]
        ]
    ],
    'notifications_page' => [
        'title' => 'Documentation - Notifications',
        'header' => 'User Notifications',
        'breadcrumbs' => 'My Notifications',
        'intro' => [
            'title' => 'What are notifications?',
            'text' => 'The notification system keeps you automatically informed about any important changes to your tickets. You do not need to check each ticket manually: the application alerts you when something happens.',
        ],
        'access' => [
            'title' => 'How to access your notifications',
            'subtitle' => 'There are <strong>two ways</strong> to view your notifications:',
            'option1' => [
                'title' => 'Option 1: From the bell icon',
                'text' => 'In the <strong>top right</strong> of the screen, next to the language selector and your profile picture, you will find a bell icon.',
                'alert_title' => 'New notification indicator:',
                'list' => [
                    '1' => 'If you have unread notifications, a <strong>yellow circle with a number</strong> appears, indicating how many new notifications you have.',
                    '2' => 'Example: If you see a "5" on the bell, it means you have 5 notifications pending review.'
                ],
                'action' => '<strong>To access:</strong> Click the bell icon and you will be redirected to the full notifications page.'
            ],
            'option2' => [
                'title' => 'Option 2: From the side menu',
                'text' => 'In the left sidebar menu, find the <strong>"Notifications"</strong> option (with a bell icon). Click there to access.'
            ]
        ],
        'screen' => [
            'title' => 'The notifications screen',
            'intro' => 'When you enter this section, you will see:',
            'location' => [
                'title' => 'Location in the system',
                'text' => 'At the top appears a path showing you where you are:',
                'path' => 'Home / My Notifications',
                'note' => 'You can click "Home" to return to the main dashboard.'
            ],
            'table' => [
                'title' => 'The notification table',
                'intro' => 'All your notifications are shown in an <strong>organized table</strong> with <strong>4 columns</strong>:',
                'headers' => [
                    'col' => 'Column',
                    'what' => 'What it shows',
                    'example' => 'Example'
                ],
                'columns' => [
                    'type' => 'Type',
                    'type_desc' => 'The type of event that occurred',
                    'type_example' => 'Comment, Status, Created',
                    'content' => 'Content',
                    'content_desc' => 'A summary of what happened',
                    'content_example' => '"A new comment has been added to your ticket"',
                    'date' => 'Date',
                    'date_desc' => 'When the event occurred',
                    'date_example' => '06/12/2025 11:53',
                    'actions' => 'Actions',
                    'actions_desc' => 'Buttons to interact',
                    'actions_example' => 'View details, Mark as read'
                ],
            ]
        ],
        'types' => [
            'title' => 'Types of notifications you can receive',
            'comment' => [
                'title' => 'New Comment',
                'when' => '<strong>When you receive it:</strong> When an administrator writes a comment on one of your tickets.',
                'what' => '<strong>What it says:</strong> "A new comment has been added to your ticket"',
                'why' => '<strong>Why it is useful:</strong> It alerts you that someone responded to your request without having to check all your tickets one by one.'
            ],
            'status' => [
                'title' => 'Status Change',
                'when' => '<strong>When you receive it:</strong> When an administrator changes the status of your ticket (e.g., from "Pending" to "In Progress" or "Resolved").',
                'what' => '<strong>What it says:</strong> "The ticket with ID [number] has been updated"',
                'why' => '<strong>Why it is useful:</strong> You know immediately that your ticket is being attended to or has already been resolved.'
            ],
            'created' => [
                 'title' => 'Ticket Created',
                 'when' => '<strong>When you receive it:</strong> When you successfully create a new ticket.',
                 'what' => '<strong>What it says:</strong> "New ticket created with ID [number]"',
                 'why' => '<strong>Why it is useful:</strong> It confirms that your request was correctly registered in the system.'
            ],
            'closed' => [
                 'title' => 'Ticket Closed',
                 'when' => '<strong>When you receive it:</strong> When an administrator marks your ticket as closed.',
                 'what' => '<strong>What it says:</strong> "The ticket has been closed"',
                 'why' => '<strong>Why it is useful:</strong> It informs you that the problem is considered resolved and the ticket is no longer active.'
            ],
            'reopened' => [
                 'title' => 'Ticket Reopened',
                 'when' => '<strong>When you receive it:</strong> When a ticket that was closed is reopened (by you or an administrator).',
                 'what' => '<strong>What it says:</strong> "The ticket has been reopened"',
                 'why' => '<strong>Why it is useful:</strong> You know that the problem is being reviewed again.'
            ]
        ],
        'tools' => [
            'title' => 'Table tools',
            'intro' => 'The table includes various functions that help you organize and find information:',
            'search' => [
                'title' => 'Search',
                'text' => 'In the top right corner there is a field that says <strong>"Search:"</strong>',
                'list' => [
                    '1' => 'Type any word (for example, "comment" or a ticket name)',
                    '2' => 'The table automatically filters and shows only matching notifications',
                    '3' => 'Clear the text to see all notifications again'
                ]
            ],
            'records' => [
                'title' => 'Number of records per page',
                'text' => 'In the top left corner you will see <strong>"Show 10 records"</strong> (with a dropdown). You can change how many notifications to see on each page:',
                'list' => [
                    '10' => '10 records (default)',
                    '25' => '25 records',
                    '50' => '50 records',
                    '100' => '100 records'
                ],
                'note' => 'This is useful if you have many notifications and want to see them all without constantly changing pages.'
            ],
            'pagination' => [
                'title' => 'Pagination',
                'text' => 'If you have more notifications than fit on one page, you will see at the bottom:',
                'example' => 'Showing 1 to 10 of 25 records [Previous] [1] [2] [3] [Next]',
                'list' => [
                    'nav' => '<strong>Previous/Next:</strong> Navigate between pages',
                    'jump' => '<strong>Numbers:</strong> Jump directly to a specific page',
                    'info' => '<strong>Indicator:</strong> Shows you how many technical notifications there are in total'
                ]
            ],
            'sort' => [
                'title' => 'Sort columns',
                'text' => 'Click on the header of any column (Type, Content or Date) to sort the notifications:',
                'list' => [
                    'asc' => '<strong>First click:</strong> Sorts ascending (A→Z, oldest→newest)',
                    'desc' => '<strong>Second click:</strong> Sorts descending (Z→A, newest→oldest)',
                    'visual' => '<strong>Visual indicator:</strong> An arrow appears showing the current order'
                ]
            ]
        ],
        'actions' => [
            'title' => 'Action buttons',
            'intro' => 'Each notification has <strong>two buttons</strong> in the "Actions" column:',
            'details' => [
                'title' => 'View Details (blue button with eye icon)',
                'what' => '<strong>What it does:</strong> Opens a popup window with all the complete information of the notification.',
                'when' => '<strong>When to use it:</strong> When you want to know exactly what happened, who made the change, and more details.'
            ],
            'mark' => [
                'title' => 'Mark as read / Mark as unread',
                'desc' => 'This button changes depending on whether the notification has already been read or not:',
                'unread_state' => [
                    'title' => 'If the notification has NOT been read:',
                    'list' => [
                        'visual' => 'A <strong>blue</strong> button with a check icon appears',
                        'hover' => 'Says "Mark as read" (on hover)',
                        'action' => '<strong>What it does:</strong> Clicking it marks the notification as read. The number on the bell decreases.'
                    ]
                ],
                'read_state' => [
                    'title' => 'If the notification has ALREADY been read:',
                    'list' => [
                        'visual' => 'A <strong>gray</strong> button with an X icon appears',
                        'hover' => 'Says "Mark as unread" (on hover)',
                        'action' => '<strong>What it does:</strong> Clicking it marks the notification as unread again. The number on the bell increases.'
                    ]
                ]
            ]
        ],
        'modal' => [
            'title' => 'Details Window (Modal)',
            'intro' => 'This is the popup window that appears when you click <strong>"View Details"</strong>.',
            'look' => [
                'title' => 'How it looks',
                'desc' => 'The window appears <strong>in the center of the screen</strong>, with a darkened background behind it. It is divided into three parts:',
                'part1' => [
                    'title' => '1. Top part (Title)',
                    'text' => 'Shows the <strong>main message</strong> of the notification. For example: "Notification". In the top right corner there is an <strong>X</strong> to close the window.'
                ],
                'part2' => [
                    'title' => '2. Center part (Detailed content)',
                    'text' => 'Here complete information is shown which varies according to the notification type:'
                ],
                'accordion' => [
                    'comment' => 'If it is a Comment',
                    'comment_content' => "A new comment has been added to your ticket\n\n────────────────────────────────────────\n\nComment by: Ivan\nIn ticket: \"Test Ticket 3\"\nComment: \"This is an example comment from the administrator\"\n\n────────────────────────────────────────\n\nDate: 06/13/2025 11:20     [View Ticket]",
                     'status' => 'If it is a Status Change',
                     'status_content' => "The ticket with ID 22 has been updated\n\n────────────────────────────────────────\n\nTicket: \"Cannot login\"\nNew status: In Progress\nPriority: High\nUpdated by: Admin Ivan\n\n────────────────────────────────────────\n\nDate: 06/12/2025 09:30     [View Ticket]",
                     'created' => 'If it is a Ticket Created',
                     'created_content' => "New ticket created with ID 29\n\n────────────────────────────────────────\n\nCreated by: Luis\nTicket: \"Error saving file\"\n\n────────────────────────────────────────\n\nDate: 06/10/2025 14:22     [View Ticket]",
                     'closed' => 'If it is a Ticket Closed',
                     'closed_content' => "The ticket has been closed\n\n────────────────────────────────────────\n\nClosed ticket: \"Database issue\"\nClosed by: Admin Carlos\n\n────────────────────────────────────────\n\nDate: 06/08/2025 16:45     [View Ticket]",
                     'reopened' => 'If it is a Ticket Reopened',
                     'reopened_content' => "The ticket has been reopened\n\n────────────────────────────────────────\n\nReopened ticket: \"Request for new feature\"\nReopened by: Luis\n\n────────────────────────────────────────\n\nDate: 06/09/2025 10:15     [View Ticket]"
                ],
                'part3' => [
                    'title' => '3. Bottom part (Buttons)',
                    'text' => 'There is always a <strong>"Close"</strong> button (gray) that closes the window and returns you to the notification table. If the notification is related to a specific ticket, a <strong>"View Ticket"</strong> button also appears taking you directly to that ticket.'
                ]
            ]
        ],
        'example' => [
            'title' => 'Full usage example',
            'intro' => 'Imagine this situation step by step:',
            'step1' => [
                'title' => '1. You receive a notification',
                'text' => 'An administrator comments on your ticket. Automatically: The bell icon at the top shows a number in a yellow circle (how many new ones you have).'
            ],
            'step2' => [
                'title' => '2. You open notifications',
                'text' => 'You click on the bell and arrive at the notifications table. You see a new row with: Type, Content, Date.'
            ],
            'step3' => [
                'title' => '3. You see details',
                'text' => 'You click on the blue button with the eye (View details). The popup window opens showing all the detailed information.'
            ],
            'step4' => [
                'title' => '4. You go to the ticket',
                'text' => 'You click on <strong>"View Ticket"</strong> in the popup window. It takes you directly to the ticket page (where you can read and respond).'
            ],
            'step5' => [
                'title' => '5. You mark as read',
                'text' => 'You return to notifications and click the blue check button (Mark as read). Now the button turns gray with an X and the bell counter decreases.'
            ]
        ],
        'empty' => [
            'title' => 'If you have no notifications',
            'text' => 'When you enter this section and occupy no notifications, you will see a message:<br><br><i class="fas fa-info-circle"></i> You have no notifications.<br><br>This means everything is quiet: there have been no changes to your tickets recently.'
        ],
        'language' => [
            'title' => 'Change language',
            'text' => 'The entire notifications section is available in <strong>Spanish</strong> and <strong>English</strong>. To change the language, use the <strong>ES</strong> / <strong>EN</strong> selector in the top navigation bar. The texts that change include: Titles, Buttons, Messages, Search options.'
        ]
    ],
    'profile_page' => [
        'title' => 'Help · My Profile',
        'header' => 'Profile and Account Management',
        'breadcrumbs' => 'Profile',
        'info' => [
            'title' => 'View my Information',
            'text1' => 'To access your personal data registered in the application:',
            'step1' => 'Click on your <strong>Name</strong> in the top right corner (top bar).',
            'step2' => 'Select the <strong>"My Profile"</strong> option from the dropdown menu.',
            'text2' => 'On this screen you can view:',
            'list' => [
                'name' => '<strong>Full Name:</strong> As it appears in the system.',
                'email' => '<strong>Email:</strong> Your linked email address for notifications.',
                'tickets' => '<strong>Created Tickets:</strong> A historical counter of all your requests.'
            ]
        ],
        'edit' => [
            'title' => 'How do I edit my data?',
            'text1' => 'Currently, direct editing of name or email is disabled for security reasons and corporate data consistency.',
            'text2' => 'If you detect an error in your information or need to update your email, please <strong>create a ticket</strong> of type "Inquiry" or "Administrative" requesting the change to the support team.'
        ],
        'security' => [
            'title' => 'Security and Session',
            'logout_title' => 'Log Out',
            'logout_text' => 'If you use a shared or public computer, it is crucial that you log out when finished.',
            'logout_step1' => 'Click on the <strong>"Door"</strong> icon or "Log Out" in the top right bar.',
            'logout_step2' => 'Or expand the user menu and select "Exit".',
            'password_title' => 'Change Password',
            'password_text' => 'If you have forgotten your password or wish to change it, you must use the "Forgot your password?" link on the login screen, or contact an administrator to send you a reset link.'
        ],
        'language' => [
            'title' => 'Language',
            'text' => 'The application is available in several languages (Spanish and English). You can change the interface language at any time using the selector (flag icon) located in the top bar.'
        ]
    ],
    'admin_intro_page' => [
        'title' => 'Admin Manual · Introduction',
        'header' => '1. Introduction and Work Environment',
        'subtitle' => 'Detailed technical and operational reference manual for Service Desk system administration.',
        'toc' => [
            'header' => 'Manual Index',
            'intro' => '1. Introduction',
            'tickets' => '2. Ticket Management',
            'users' => '3. User Administration',
            'notifications' => '4. Notification System',
            'events' => '5. Auditing and Events',
            'doc_info' => 'Technical Documentation v2.2 - Extended Revision'
        ],
        'section_1' => [
            'title' => '1.1. Purpose and Security Architecture (Multi-Auth)',
            'text' => 'The administration module is the central component for technical support management ("Backend"). Unlike conventional admin panels, this system is built on a <strong>Dual Authentication (Multi-Auth)</strong> architecture and session isolation.',
            'text_2' => 'This implies that the administration environment is technically invisible and inaccessible to end users. It uses an independent security "Guard" (admin) and segregated database tables for credentials, ensuring that a user account vulnerability never compromises the control panel. Access is restricted exclusively to authorized and audited personnel.',
            'roles_box' => [
                'title' => 'RBAC Policies (Role-Based Access Control)',
                'text' => 'The system applies a "Least Privilege" policy through defined roles that determine what each operator can see and do:',
                'superadmin' => '<strong>Super Admin (Root):</strong> Total unrestricted access. It is the only role capable of creating other administrators, modifying system taxonomy (create/delete Ticket Types), purging records, and accessing global business analytics. This role should be limited to IT managers.',
                'admin' => '<strong>Standard Administrator (Agent):</strong> Role focused purely on daily operations. Has full control over ticket lifecycle (reply, close, reopen) and basic user management (edit client profiles). Cannot alter system structural configuration or view the global audit log.',
                'security_note' => 'Security: All critical actions (logins, status changes, deletions) are permanently logged with IP address and timestamp in the Event History for forensic auditing.'
            ]
        ],
        'section_2' => [
            'title' => '1.2. Landing Interface: The Navigation Hub',
            'text' => 'Upon authentication, the system does not direct the operator to a dashboard full of metrics, but to the <strong>Operational Navigation Hub</strong>. This design decision (UX) seeks to minimize initial cognitive load and focus the agent on immediate action.',
            'text_2' => 'From this central point, the workflow forks into two main paths depending on the user\'s role and intent:',
            'img_caption' => 'Navigation Hub Interface prioritizing workflows',
            'buttons' => [
                'assigned' => '<strong>Assigned Tickets (My Work Queue):</strong> This is the most frequent access. Directs the agent directly to the filtered list of tickets where they are responsible. Allows resuming pending work immediately without navigating menus.',
                'management' => '<strong>Global Management & Metrics (Dashboard):</strong> Reserved for Superadmins. Directs to the analytical dashboard to oversee service health, load volume, and team performance.'
            ]
        ],
        'section_3' => [
            'title' => '1.3. Management Dashboard (KPI Dashboard)',
            'subtitle' => 'Exclusive for Superadmins',
            'text' => 'The Dashboard provides a macroscopic view ("Helicopter View") of the service status in real-time. It is vital for data-driven decision making and early bottleneck detection.',
            'text_2' => 'Indicators are calculated live by querying the transactional database:',
            'kpis' => [
                'users' => [
                    'title' => 'Registered Users',
                    'desc' => 'Reach metric. Indicates the total size of the client base with access to the support portal.'
                ],
                'admins' => [
                    'title' => 'Operational Force',
                    'desc' => 'Available response capacity. Sum of active administrators and agents in the system.'
                ],
                'assigned' => [
                    'title' => 'Active Load',
                    'desc' => 'Tickets currently in process (Not closed) and having an assigned owner. A high number here may indicate team saturation.'
                ],
                'total' => [
                    'title' => 'Historical Volume',
                    'desc' => 'Accumulated total of incidents processed since system deployment. Useful for measuring long-term demand.'
                ]
            ],
            'events_widget' => [
                'title' => 'Live Security Monitor',
                'text' => 'In the lower area of the dashboard, the <strong>Latest System Events</strong> widget is displayed. This list updates with every critical action and allows the Superadmin to detect anomalous patterns, such as multiple failed login attempts, unauthorized admin creation, or massive ticket status changes.'
            ]
        ],
        'section_4' => [
            'title' => '1.4. Navigation Map (Sidebar)',
            'text' => 'The left sidebar is persistent and organizes tools into three large logical blocks:',
            'text_2' => 'Understanding this structure is key for fluid navigation:',
            'modules' => [
                'ops' => [
                    'title' => 'BLOCK 1: OPERATIONS (Day to Day)',
                    'dashboard' => '<strong>Dashboard / Home:</strong> Quick return to the Hub or Dashboard.',
                    'tickets' => '<strong>Ticket Management:</strong> The heart of the system. Unfolds submenus to filter tickets by status (Open, Closed) or view the global list.',
                    'users' => '<strong>Users:</strong> Light CRM to search clients, view their request history, and edit their contact data.'
                ],
                'sys' => [
                    'title' => 'BLOCK 2: SYSTEM (Configuration)',
                    'types' => '<strong>Types & Categories:</strong> Allows defining problem taxonomy (e.g., "Hardware", "Software"). Fundamental for accurate reporting.',
                    'events' => '<strong>Logs / Audit:</strong> Access to the complete and immutable historical record of actions. Allows filtering by date, user, and action type.',
                    'admins' => '<strong>Staff Management:</strong> (Superadmin Only) Creation, removal, and modification of other administrator accounts.'
                ],
                'personal' => [
                    'title' => 'BLOCK 3: PERSONAL',
                    'logout' => '<strong>Profile and Exit:</strong> In the lower area are the session controls and current profile display.'
                ]
            ]
        ]
    ],
    'admin_tickets_page' => [
        'title' => 'Technical Incident Management',
        'intro' => 'The ticket module is the operational heart of the Help Desk. Here client communication is centralized and resolution flows are executed. This guide details standard procedures to maximize efficiency and comply with Service Level Agreements (SLA).',
        'lifecycle' => [
            'title' => '2.1. Ticket Lifecycle & Statuses',
            'desc' => 'The system uses a strict state machine to manage workflow. Understanding these states is vital to keeping the inbox organized:',
            'status' => [
                'new' => '<strong>NEW:</strong> Initial automatic state upon creation. Indicates no one has reviewed the case yet. Action required: Immediate triage.',
                'open' => '<strong>OPEN:</strong> Assigned to an agent and currently being worked on. Resolution SLA timer is active.',
                'pending' => '<strong>PENDING:</strong> Agent has requested info from user and is awaiting reply. This state "freezes" the SLA timer until the client responds.',
                'solved' => '<strong>SOLVED:</strong> Agent has provided a definitive solution. System notifies user to confirm resolution.',
                'closed' => '<strong>CLOSED:</strong> Final immutable state. Ticket is archived and accepts no new replies. Read-only access for history.',
            ],
            'flow_title' => 'Recommended Workflow',
            'flow_text' => 'For efficient management, do not leave tickets in "New" for more than 1 hour. If resolution isn\'t immediate, change status to "Open" to indicate processing, or "Pending" if blocked by client side.'
        ],
        'triage' => [
            'title' => '2.2. Assignment & Triage Protocols',
            'desc' => 'Triage is the initial categorization and assignment process. A misassigned ticket dramatically increases Time to Resolution (TTR).',
            'manual' => '<strong>Direct Assignment (Push):</strong> A supervisor or dispatcher reviews "New" queue and manually assigns ticket to the most suitable specialist based on category (Hardware, Software, Network).',
            'claim' => '<strong>Self-Assignment (Pull):</strong> In agile teams, agents proactively pick tickets from global pool using "Assign to me" button.',
            'filters_title' => 'Queue Filtering',
            'filters_text' => 'Use top filters to toggle between "My Tickets" (your direct responsibility), "Unassigned Tickets" (work opportunities), and "All" (global oversight).'
        ],
        'sla' => [
            'title' => '2.3. Priority Matrix & SLA',
            'desc' => 'Priority defines ticket urgency and expected response times. System may send alerts if these times are violated.',
            'high' => [
                'tag' => 'HIGH (Critical)',
                'desc' => 'Incidents stopping critical business operation or affecting multiple users.',
                'time' => 'Target Times: Response < 1h | Resolution < 4h'
            ],
            'medium' => [
                'tag' => 'MEDIUM (Normal)',
                'desc' => 'Service degradation not stopping operation, or functional issues for a single user.',
                'time' => 'Target Times: Response < 4h | Resolution < 24h'
            ],
            'low' => [
                'tag' => 'LOW (Inquiry)',
                'desc' => 'Information requests, questions, or suggestions not affecting system functionality.',
                'time' => 'Target Times: Response < 24h | Resolution < 72h'
            ]
        ],
        'features' => [
            'title' => '2.4. Resolution Tools',
            'desc' => 'Inside ticket detail view, agent has a toolset to interact:',
            'reply' => '<strong>Public Reply:</strong> Sends email to client. Use to request data or provide solutions. supports rich formatting (bold, lists, links).',
            'notes' => '<strong>Internal Notes (Private):</strong> Allows leaving comments ONLY visible to other agents. Ideal for technical documentation, call logs, or asking colleagues for advice without alerting client.',
            'files' => '<strong>System Attachments:</strong> Upload logs, screenshots or PDFs. System scans and blocks dangerous extensions (.exe, .sh) automatically.'
        ]
    ],
    'admin_users_page' => [
        'title' => 'Identity and Access Management (IAM)',
        'intro' => 'User account control, roles, and system access permissions.',
        'types' => [
            'title' => '3.1. Account Typology',
            'desc' => 'The system strictly distinguishes between two actor types for security and operational reasons. Both have differentiated access and portals.',
            'client_title' => 'End User (Client)',
            'client_desc' => 'Employees or clients requiring technical assistance. They access exclusively the User Portal to create tickets.',
            'admin_title' => 'Administrator (Staff)',
            'admin_desc' => 'Technical staff responsible for resolving incidents. They access the Admin Panel (Backoffice) to manage operations.',
        ],
        'manage_users' => [
            'title' => '3.2. End User Management',
            'desc' => 'Standard administration operations for the client database.',
            'create' => [
                'title' => 'Register New User',
                'steps' => [
                    '1' => 'Navigate to <strong>Users > Create New</strong>.',
                    '2' => 'Complete required fields: Full Name and Corporate Email.',
                    '3' => 'Set a secure temporary password.',
                ]
            ],
            'password' => [
                'title' => 'Password Reset',
                'desc' => 'To reset, edit the user and type the new key. If you leave the field empty, the current one remains.'
            ]
        ],
        'superadmin' => [
            'title' => '3.3. Staff Management (Superadmin Only)',
            'desc' => 'Restricted area for privilege elevation and creation of new support agents.',
            'warning' => 'Granting administrator permissions allows access to sensitive ticket and user data. Proceed with caution.'
        ]
    ],
    'admin_notifications_page' => [
        'title' => 'Notification Center',
        'intro' => 'User manual for the alert management panel, interface, and distribution logic.',
        'interface' => [
            'title' => '1. Main Dashboard',
            'desc' => 'The notifications module features a tabular view (DataTables) allowing bulk filtering, searching, and management of alerts.',
            'table' => [
                'type' => '<strong>Type:</strong> Icon and event category (Ticket, Comment, System).',
                'content' => '<strong>Content:</strong> Brief summary of the message or alert.',
                'date' => '<strong>Date:</strong> Exact timestamp of generation (local format).',
                'actions' => '<strong>Actions:</strong> Interactive buttons to process the alert.'
            ],
            'actions' => [
                'view' => '<strong>View Detail (Eye):</strong> Opens a modal window with full information without leaving the page.',
                'read' => '<strong>Mark Read (Check):</strong> Archives the notification and reduces updates the bell counter.',
                'delete' => '<strong>Delete (Trash):</strong> Permanently removes the notice from the system.'
            ]
        ],
        'modal' => [
            'title' => '2. Detail Viewer (Modal)',
            'desc' => 'Clicking "View Detail" displays a floating window with full context. From here, you can navigate directly to the affected resource (e.g., go to Ticket) via embedded links.'
        ],
        'logic' => [
            'title' => '3. Distribution Logic (Backend)',
            'desc' => 'Technical reference on how the system decides who to notify:',
            'scenarios' => [
                'new_ticket' => [
                    'tit' => 'New Ticket Created',
                    'who' => 'Superadmins (Priority) or All Staff.',
                    'why' => 'Triage. notifies those responsible for assigning the ticket.'
                ],
                'client_reply_assigned' => [
                    'tit' => 'Client Reply (Assigned Ticket)',
                    'who' => 'Responsible Agent.',
                    'why' => 'Continuity. Only the agent handling the case is disturbed.'
                ],
                'client_reply_unassigned' => [
                    'tit' => 'Client Reply (Unassigned Ticket)',
                    'who' => 'All Administrators.',
                    'why' => 'General Alert. Requires immediate attention from anyone available.'
                ]
            ]
        ],
        'channels' => [
            'title' => 'Channels',
            'db' => 'Web Interface (Control Panel)',
            'mail' => 'Email (Asynchronous)'
        ],
        'tips' => [
            'title' => 'Operational Tip',
            'desc' => 'Keep your inbox clean by using the "Mark all as read" button after reviewing your daily tasks to avoid visual fatigue.'
        ]
    ],
    'admin_events_page' => [
        'title' => 'Event History',
        'intro' => 'The audit module acts as the system\'s "Black Box". Every critical action performed by users and administrators is permanently recorded here.',
        'interface' => [
            'title' => '1. Real-Time Audit',
            'desc' => 'Forensic control panel. Provides a detailed chronological list of all system operations.',
            'screenshot_alt' => 'Event history screenshot showing audit columns',
            'table_title' => 'Column Details',
            'table' => [
                'type' => '<strong>Event Type:</strong> Action identifier code (e.g., <code>TICKET_CREATED</code>, <code>STATUS_CHANGED</code>).',
                'desc' => '<strong>Description:</strong> Human-readable summary of what happened (e.g., "User X changed status of Y to Z").',
                'user' => '<strong>User (Actor):</strong> Identity of who executed the action. Shows name and role (Admin/User).',
                'date' => '<strong>Date:</strong> Exact timestamp of execution.'
            ],
            'search_title' => 'Forensic Filtering',
            'search_desc' => 'The search bar can find events by Ticket ID (e.g., "Ticket #504"), administrator name, or action type. Vital for investigating past incidents.'
        ],
        'concept' => [
            'title' => '2. Use Cases (Forensics)',
            'desc' => 'This record is immutable (cannot be deleted or edited), ensuring total traceability. Common use cases:',
            'scenarios' => [
                'case1' => [
                    'tit' => '"Missing Ticket" Investigation',
                    'desc' => 'If a ticket no longer appears in the list, search for the <code>TICKET_DELETED</code> event to identify which administrator deleted it and when.'
                ],
                'case2' => [
                    'tit' => 'SLA Audit',
                    'desc' => 'Compare the <code>TICKET_CREATED</code> date with the first <code>COMMENT_ADDED</code> to verify actual staff response times.'
                ],
                'case3' => [
                    'tit' => 'Access Control',
                    'desc' => 'Detect unusual activity spikes or unauthorized configuration changes by filtering by username.'
                ]
            ]
        ]
    ]
];
