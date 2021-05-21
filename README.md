# USAGE

.env Values:

```env
EXABYTES_USERNAME = your account username
EXABYTES_PASSWORD = your account password
EXABYTES_SENDER_ID = your sender id 
```


Call method:
```php
Exabytes::sendMessage($data);
```

Parameters for $data:
```
$data = [ 'to' => $request->mobile_number , 'msg' => $request->message ]
```


