<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Auth;
use App\Models\AuthToken;
use App\Models\Configuration;
use App\Models\Merchant;
use App\Models\Message;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $merchant = Merchant::create([
            'active' => 1,
            'code' => 'WQAXBPWKAQQU',
            'created_at' => '2025-06-05 09:27:09.651459',
            'name' => 'REGIDESO',
            'own_config' => 1,
            'sms_from' => 'REGIDESO',
            'sms_login' => 'NCV4Y7JS',
        ]);

        $auth = Auth::create([
            'active' => 1,
            'code' => 'AMJTGTNTWSDHOYM5TSNNA9GVOKUIQKESDEMP65LCFJT8UKJXJQ',
            'created_at' => '2025-06-05 09:27:09.728313',
            'password' => '$2a$10$HhCW16Nvflj8EpTqvpNDweKxu0Gwx1E3FJ/OVMEQwHJkHRJL1giHK',
            'token' => null,
            'username' => 'PDHCIH6FKWWX27ATJY37KDAGZYKM1OAIIQZZFUGJ5PICHCIBIH',
            'merchant_id' => $merchant->id,
        ]);

        AuthToken::create([
            'id' => hex2bin('0a50058cf23f1f34f9ed3f40ddae0000'),
            'active' => 0,
            'code' => 'MYQ9XZ05QN36SJB8DJ6MBJFSYSCAWT',
            'created_at' => '2025-06-05 09:41:27.432795',
            'expires_at' => '2025-06-05 10:41:27.423454',
            'token' => 'eyJhbGciOiJIUzI1NiJ9...wTVSRV_drnqDFcSGpsvfJeEFcgYMsUBUgrrh938QaNQ',
            'auth_id' => $auth->id,
        ]);

        Configuration::create([
            'active' => 1,
            'code' => 'UA5FW3BSFMYT',
            'created_at' => '2025-06-05 09:27:09.627432',
            'schedule_date_format' => 'dd/MM/yyyy hh:mm:ss a',
            'schedule_date_value' => '02/06/2025 05:00:00 AM',
            'sms_from' => 'FLEXPAY',
            'sms_login' => 'NCV4Y7JS',
            'sms_url' => 'https://api.keccel.com/sms/v2/message.asp',
            'sms_url_check' => 'https://api.keccel.com/sms/v2/delivery.asp',
        ]);

        User::create([
            'code' => 'USR1234567890',
            'created_at' => now(),
            'email' => 'test@example.com',
            'enabled' => 1,
            'password' => bcrypt('password'),
            'phone_number' => '243999999999',
            'username' => 'testuser',
        ]);

        Message::create([
            'id' => hex2bin('0a50058cf23f1f34f9ed3f40dea20001'),
            'closed' => 0,
            'content' => 'Hello FlexSMS at 1737560928180',
            'created_at' => '2025-06-05 09:41:53.093166',
            'delivered' => 0,
            'nb_trial_check' => 2,
            'notification' => null,
            'phone_number' => '243815877848',
            'reference' => '16620c03-e7f4-4b40-8c1e-e6ba98da253e',
            'response' => 'SENT, 16620c03-e7f4-4b40-8c1e-e6ba98da253e, Message submitted to the mobile operator',
            'sent' => 1,
            'sms_from' => 'REGIDESO',
            'sms_login' => 'NCV4Y7JS',
            'auth_id' => $auth->id,
            'merchant_id' => $merchant->id,
        ]);
    }
}
