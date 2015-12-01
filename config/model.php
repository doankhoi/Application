<?php
    
    /**
    * How to call: config('model.users.name')
    */
    return [
        'user_info' => [
            'gender' => [
                1 => 'Nam',
                2 => 'Nữ',
                3 => 'Không xác định',
            ],
            'path_folder_photo_user' => '/assets/images/users/',
            'photo_default' => 'noavatar.png'
        ],
        'posts' => [
            'type' => [
                1 => 'Bài đăng thông thường',
                2 => 'Bài đăng được ghim',
                3 => 'Bài đăng với video',
                4 => 'Bài đăng với tiêu đề'
            ],
            'path_folder_photo_post' => '/assets/images/posts/'
        ],
        'admin' => [
            'path_folder_photo_website' => '/assets/images/website/'
        ]
    ];