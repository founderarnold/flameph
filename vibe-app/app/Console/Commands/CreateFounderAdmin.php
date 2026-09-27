<?php

namespace App\Console\Commands;

use App\Models\AdminAccount;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateFounderAdmin extends Command
{
    protected $signature = 'admin:create-founder';

    protected $description = 'Create the initial FLAME PH founder admin account securely';

    public function handle(): int
    {
        if (AdminAccount::query()->where('role', 'founder')->exists()) {
            $this->components->error('A founder admin account already exists.');
            return self::FAILURE;
        }

        $name = trim((string) $this->ask('Founder full name'));
        $email = strtolower(trim((string) $this->ask('Founder email')));
        $password = (string) $this->secret('Choose a strong password (12+ characters)');
        $confirmation = (string) $this->secret('Confirm password');

        if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 12 || !hash_equals($password, $confirmation)) {
            $this->components->error('Invalid name/email, passwords do not match, or password is shorter than 12 characters. No account was created.');
            return self::FAILURE;
        }

        if (AdminAccount::query()->where('email', $email)->exists()) {
            $this->components->error('That email is already assigned to an admin account.');
            return self::FAILURE;
        }

        AdminAccount::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => 'founder',
            'active' => true,
        ]);

        $this->components->info('Founder admin account created. Sign in at /about#admin-access.');

        return self::SUCCESS;
    }
}
