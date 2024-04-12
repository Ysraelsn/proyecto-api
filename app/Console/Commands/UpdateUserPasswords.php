<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class UpdateUserPasswords extends Command
{
    protected $signature = 'users:update-passwords';
    protected $description = 'Update passwords of all users with Bcrypt algorithm';

    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            $user->password = bcrypt($user->password);
            $user->save();
        }

        $this->info('Passwords updated successfully.');
    }
}
