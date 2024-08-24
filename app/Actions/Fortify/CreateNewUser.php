<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        $noKode = rand(111, 999);
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'no_tlp' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        // Mengubah format nomor telepon
        $no_tlp = $input['no_tlp'];
        $no_tlp = str_replace([' ', '-', '+'], '', $no_tlp);
        if (substr($no_tlp, 0, 1) === '0') {
            $no_tlp = '62' . substr($no_tlp, 1);
        }

        return User::create([
            'kode_pasien' => "PS-" . $noKode,
            'name' => $input['name'],
            'tgl_lahir' => $input['tgl_lahir'],
            'umur' => $input['umur'],
            'alamat' => $input['alamat'],
            'no_tlp' => $no_tlp, // Menggunakan nomor telepon yang telah diubah formatnya
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
