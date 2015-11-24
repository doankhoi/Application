<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Models\User;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Mail\Mailer;

class SendMail extends Job implements SelfHandling
{
    /**
     * Model User
     * @var $user
     */
    protected $_user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->_user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $data = [
            'title' => 'ChickenElectric-Xác nhận người dùng.',
            'intro' => 'Cảm ơn bạn vì đã đăng ký làm thành viên của ChickenElectric. Chúng tôi sẽ gửi tới bạn các thông tin mới nhất về các bài viết. Để active tài khoản hãy truy cập vào đường link sau.',
            'register_token' => $this->_user->register_token 
        ];

        $mailer->send('email.auth.verify', $data, function($message) {
            $message->to($this->_user->email, 'doankhoi')
                    ->subject('ChickenElectric');
        });
    }
}
