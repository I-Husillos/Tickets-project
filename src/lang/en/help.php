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
        'title' => 'Help · Notifications',
        'header' => 'Notification System',
        'breadcrumbs' => 'Notifications',
        'explanation' => [
            'title' => 'How do they work?',
            'text1' => 'The notification system is designed to keep you informed in real-time about the activity of your tickets, without you having to check them one by one constantly.',
            'text2' => 'This functionality allows you to focus away from the application and return only when there are news requiring your attention.',
            'list_intro' => 'You will receive an automatic notification when:',
            'list' => [
                'reply' => 'An administrator <strong>replies</strong> to one of your tickets (New comment).',
                'status_change' => 'The <strong>status</strong> of your ticket changes (e.g., from "Pending" to "Resolved").',
                'assigned' => 'A specific action is assigned to you or your validation is required.',
                'event' => 'An important event related to your account is created.'
            ]
        ],
        'management' => [
            'title' => 'Manage my alerts',
            'bell_icon' => [
                'title' => '1. The Bell Icon',
                'text' => 'In the top bar of the application (top right), you will see a bell icon <i class="far fa-bell"></i>.',
                'img_caption' => 'Example of icon with alerts',
                'list' => [
                    'count' => 'If it has a red number <span class="badge badge-warning">3</span>, it indicates how many <strong>unread</strong> notifications you have.',
                    'preview' => 'Clicking on it expands a quick view of the latest alerts with a brief summary.',
                    'view_all' => 'From that dropdown, you can go to "View all notifications".'
                ]
            ],
            'notifications_screen' => [
                'title' => '2. The "My Notifications" Screen',
                'text' => 'Accessing from the side menu or "View all" in the bell, you will reach the full list.',
                'img_caption' => 'Example of "My Notifications" screen',
                'actions_intro' => 'Here you can perform the following actions to organize your inbox:',
                'actions' => [
                    'mark_read' => [
                        'dt' => 'Mark as Read',
                        'dd' => 'If you have already seen the alert, you can mark it as read. This will decrease the red counter and the notification will visually show as "seen" (usually with a white background instead of gray/blue).<br>Look for the button <i class="fas fa-check"></i> next to the notification.'
                    ],
                    'mark_unread' => [
                        'dt' => 'Mark as Unread',
                        'dd' => 'If you read a notification by mistake but want to leave it pending to review later calmly, you can mark it as "Unread".'
                    ],
                    'go_to_ticket' => [
                        'dt' => 'Go to Ticket',
                        'dd' => 'This is the most common action. Clicking on the text or link of the notification (e.g. "New comment on ticket #123"), the system will show a modal, which will display the notification information in detail along with a <strong>"View Ticket"</strong> option, which will take you directly to the corresponding ticket screen to see the update and respond.'
                    ]
                ],
                'modal_caption' => 'Example of modal when clicking on a notification'
            ]
        ],
        'tips' => [
            'title' => 'Usage Tips',
            'clean_inbox' => [
                'title' => 'Keep your inbox clean!',
                'text' => 'Try to mark notifications you have already attended to as read. This will help you quickly identify when something truly new and urgent arrives, preventing it from getting lost among old alerts.'
            ],
            'dont_ignore' => [
                'title' => 'Do not ignore them',
                'text' => 'If you receive a "Ticket Resolved" notification, it is very important that you enter to validate the solution. If you ignore these notifications, your tickets could remain "in limbo" without officially closing.'
            ]
        ],
        'faq' => [
            'title' => 'Frequently Asked Questions',
            'email_q' => 'Do I receive emails?',
            'email_a' => 'Yes, depending on the global system configuration, you will normally receive a copy of these alerts to your registered email so you find out even if you are not logged into the web.',
            'delete_q' => 'Can I permanently delete notifications?',
            'delete_a' => 'The system generally keeps the notification history so you can consult it in the future as an activity reference. Focus on using the "Read" status to organize yourself.'
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
        'subtitle' => 'Technical and operational reference manual for Service Desk administration.',
        'toc' => [
            'header' => 'Manual Index',
            'intro' => '1. Introduction',
            'tickets' => '2. Ticket Management',
            'users' => '3. User Administration',
            'notifications' => '4. Notification System',
            'events' => '5. Auditing and Events',
            'doc_info' => 'Technical Documentation v2.0'
        ],
        'section_1' => [
            'title' => '1.1. Purpose and Security Architecture',
            'text' => 'This administration module constitutes the core management ("Backend") of the support system. It has been designed under a <strong>Dual Authentication (Multi-Auth)</strong> architecture, meaning it operates in an environment totally isolated from the user portal.',
            'roles_box' => [
                'title' => 'Access Control and Roles (RBAC)',
                'text' => 'The system implements a strict permission policy based on roles:',
                'superadmin' => '<strong>Super Admin:</strong> Possesses "Root" level privileges. Can manage logical infrastructure (Ticket Types, Events), manage other administrator accounts, and view global metrics.',
                'admin' => '<strong>Standard Administrator:</strong> Operational role focused on resolution. Has full access to the ticket lifecycle and basic user management, but lacks permissions to alter system configuration.',
                'security_note' => 'All actions performed under these roles are audited and permanently recorded in the Event History.'
            ]
        ],
        'section_2' => [
            'title' => '1.2. Main Interface: Navigation Hub',
            'text' => 'Upon authentication in the panel, the system presents the <strong>Navigation Hub</strong>. Unlike a traditional dashboard, this interface prioritizes speed of access to work queues.',
            'img_caption' => 'View of the Administrator Navigation Hub',
            'buttons' => [
                'assigned' => '<strong>Assigned Tickets (Workflows):</strong> Direct access to your personal workload. This is the default view for daily work.',
                'management' => '<strong>Global Management (Superadmin Only):</strong> Access to the Analytical Dashboard (KPIs) and user management.'
            ]
        ],
        'section_3' => [
            'title' => '1.3. Management Dashboard (KPI Dashboard)',
            'subtitle' => 'Available for Superadmins',
            'text' => 'The analytical control panel provides a macroscopic view of the service status. It uses real-time data aggregation to show critical indicators.',
            'kpis' => [
                'users' => [
                    'title' => 'Registered Users',
                    'desc' => 'Total active client accounts in the database.'
                ],
                'admins' => [
                    'title' => 'Operational Force',
                    'desc' => 'Total administrators and support agents enabled.'
                ],
                'assigned' => [
                    'title' => 'Tickets in Management',
                    'desc' => 'Volume of tickets currently having an assigned agent and in progress.'
                ],
                'total' => [
                    'title' => 'Historical Volume',
                    'desc' => 'Global counter of tickets processed since the start of service.'
                ]
            ],
            'events_widget' => [
                'title' => 'Live Audit Widget',
                'text' => 'At the bottom of the dashboard is the <strong>Recent Event Monitor</strong>. This component shows the last 5 critical system actions (Logins, Admin Creation, Status Changes), allowing immediate security supervision.'
            ]
        ],
        'section_4' => [
            'title' => '1.4. System Navigation Structure',
            'text' => 'The sidebar organizes functional modules into logical categories to facilitate operation:',
            'modules' => [
                'ops' => [
                    'title' => 'Operations Module',
                    'dashboard' => '<strong>Dashboard:</strong> Return to primary Hub.',
                    'tickets' => '<strong>Ticket Management:</strong> Inbox and resolution tools.',
                    'users' => '<strong>Users:</strong> Basic client CRM.'
                ],
                'sys' => [
                    'title' => 'System Module',
                    'types' => '<strong>Types & Categories:</strong> Ticket taxonomy configuration.',
                    'events' => '<strong>System Logs:</strong> Forensic audit of actions.',
                    'admins' => '<strong>Staff Management:</strong> Agent account administration.'
                ]
            ]
        ]
    ],
    'admin_tickets_page' => [
        'title' => 'Technical Incident Management',
        'intro' => 'The ticket management module is the operational core of the platform. This section defines protocols for handling the incident lifecycle, from reception to definitive closure, ensuring Service Level Agreement (SLA) compliance.',
        'lifecycle' => [
            'title' => '2.1. Lifecycle & Statuses',
            'desc' => 'Each incident transitions through a finite state machine that determines its visibility and allowed actions.',
            'status' => [
                'new' => '<strong>NEW:</strong> Newly created ticket. Requires immediate triage. SLA clock starts.',
                'open' => '<strong>OPEN:</strong> Assigned to an agent and under diagnosis or resolution process.',
                'pending' => '<strong>PENDING:</strong> Awaiting response or additional info from the client. Temporarily pauses the resolution SLA.',
                'solved' => '<strong>SOLVED:</strong> Agent has proposed a solution. Client must confirm or reopen if the issue persists.',
                'closed' => '<strong>CLOSED:</strong> Definitive completion. Ticket enters read-only mode for audit purposes.',
            ]
        ],
        'triage' => [
            'title' => '2.2. Triage & Assignment Protocols',
            'desc' => 'Support efficiency relies on correct resource allocation. The system supports two modes:',
            'manual' => '<strong>Manual Assignment:</strong> Administrators can force-assign a ticket to any available agent via the control panel.',
            'claim' => '<strong>Self-Claim:</strong> Agents can proactively pick tickets from the global queue ("Pool").',
        ],
        'sla' => [
            'title' => '2.3. Priority Matrix (SLA)',
            'desc' => 'Priorities determine execution order and target response times (SLA).',
            'high' => '<strong>HIGH (Critical):</strong> Total service interruption or security issue. Target TTR: < 1 hour.',
            'medium' => '<strong>MEDIUM (Normal):</strong> Partial functionality affected or operational queries. Target TTR: < 4 hours.',
            'low' => '<strong>LOW (Inquiry):</strong> Suggestions, cosmetic changes, or non-urgent questions. Target TTR: < 24 hours.',
        ]
    ]
];
