<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            [
                'name' => 'Administrator',
                'email' => 'admin@admin.com',
                'gender' => 'male',
                'is_admin' => '1',
                'signature' => '/assets/img/sigexe.png',
                'agent_referral' => 'admin',
                'invite_id' => '1',
                'invite_code' => 'qwerty21',
                'password' => bcrypt('890121'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Agency Master',
                'email' => 'agent@agent.com',
                'gender' => 'male',
                'is_admin' => '2',
                'signature' => '/assets/img/sigexe.png',
                'agent_referral' => 'agent01',
                'invite_id' => '1',
                'invite_code' => 'qwerty21',
                'password' => bcrypt('890121'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Paihz Stranger',
                'email' => 'user@user.com',
                'gender' => 'male',
                'is_admin' => '0',
                'signature' => '/assets/img/sigexe.png',
                'agent_referral' => 'master',
                'invite_id' => '2',
                'invite_code' => 'qwerty21',
                'password' => bcrypt('890121'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]

        ]);
        DB::table('agents')->insert([
                'user_id' => 2,
                 'ref_agent_name' => 'master',
                 'company_name' => 'ara mutiara',
                'address' => '221 jalan klang baru',
                'ssm_no' => '123-123-21321kl',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('lotshares')->insert([
            'lotshare' => '6000',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
