<?php

if(!function_exists('classActivePath'))
{
    function classActivePath($path)
    {
        return Request::is($path) ? ' class=active' : '';
    }
}

if(!function_exists('classActiveSegment'))
{
    function classActiveSegment($segment, $value)
    {
        
    }
}

if(!function_exists('formatDate'))
{
    function formatDate($date)
    {
        return date('d', strtotime($date)).".".date('F', strtotime($date)).",".date('Y', strtotime($date));
    }
}

if(!function_exists('formatDateDiff'))
{
    function formatDateDiff($date)
    {
        $date1 = new DateTime($date);
        $date2 = new DateTime(date('Y-m-d H:i:s'));
        return date_diff($date1, $date2)->format('%d ngày %h giờ trước');
    }
}

if(!function_exists('getImageAvatar'))
{
    /**
     * Get src of avatar user
     * @param  App\Models\User $user
     * @return string
     */
    function getImageAvatar($user)
    {
        $default = asset(config('model.user_info.path_folder_photo_user').config('model.user_info.photo_default'));
        $imagePath = asset(config('model.user_info.path_folder_photo_user').$user->photo);
        return ($user->photo) ? $imagePath : $default;
    }
}