# INSTALLATION
```code
composer require premgthb/exabytes-sms
```

# USAGE

Publish config files:
```code
php artisan vendor:publish --provider="Premgthb\ExabytesSms\ExabytesServiceProvider"
```

.env Values:

```env
EXABYTES_SMS_USERNAME = Your account username
EXABYTES_SMS_PASSWORD = Your account password
```

Set up Notification class in your Laravel application using

```code
php artisan make:notification ExabytesSmsNotification
```

and copy the code as follows

```php
<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Premgthb\ExabytesSms\Notifications\ExabytesSmsChannel;

class ExabytesSmsNotification extends Notification
{
    use Queueable;

    public $content;

    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable)
    {
        return [ExabytesSmsChannel::class];
    }

     /**
      * Get SMS Message content
      */
    public function toExabytes($notifiable)
    {
       return $this->message;
    }
}
```

In your User.php model:

```php
public function routeNotificationForExabytes()
{
   return preg_replace('/\D+/', '', '6'.$this->mobile_number);
}
```

Finally use the following snippet in your controllers to trigger the Notification

```php
Notification::route('exabytes', $mobileNumber)->notify(new ExabytesSmsNotification($yourMessage));
```

You are good to go!

# ADDITIONAL

To generate 4 digit OTP code, in your controller:

```php

use Exabytes;

$otp = Exabytes::generateOtp();
```

To Send SMS without Queue:

```php
$data = [ 'to' => $request->mobile_number , 'msg' => $request->message ]

Exabytes::sendMessage($data);
```
