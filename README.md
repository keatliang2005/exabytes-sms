USAGE

.env Values:

EXABYTES_USERNAME = '' 
EXABYTES_PASSWORD = '' 
EXABYTES_SENDER_ID = '' 

Call method:

Exabytes::sendMessage($data);

Parameters for $data:
$data = [ 'to' => $request->mobile_number , 'msg' => $request->message ]


