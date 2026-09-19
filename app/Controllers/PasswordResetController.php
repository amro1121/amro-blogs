<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PasswordResetTokenModel;
use CodeIgniter\I18n\Time;

class PasswordResetController extends BaseController
{
    public function forgotPassword()
    {
        if ($this->request->is('post')) {
            $rules = ['email' => 'required|valid_email'];
            
            if ($this->validate($rules)) {
                $email = $this->request->getPost('email');
                $userModel = new UserModel();
                $user = $userModel->where('email', $email)->first();

                if ($user) {
                    $token = bin2hex(random_bytes(32));
                    $tokenModel = new PasswordResetTokenModel();
                    
                    // Remove any old tokens for this email
                    $tokenModel->where('email', $email)->delete();
                    
                    // Save new token valid for 1 hour
                    $tokenModel->save([
                        'email'      => $email,
                        'token'      => $token,
                        'expires_at' => Time::now()->addHours(1)->toDateTimeString()
                    ]);

                    $resetLink = site_url("reset-password/{$token}");
                    
                    // For local development, display the link directly on the screen
                    return redirect()->back()->with('success', "For local testing, click here to reset: <a href='{$resetLink}' class='alert-link'>Reset Link</a>");
                }
                
                return redirect()->back()->with('success', 'If the email exists, a reset link was sent.');
            }
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        return view('auth/forgot_password');
    }

    public function resetPassword($token = null)
    {
        $tokenModel = new PasswordResetTokenModel();
        $resetRecord = $tokenModel->where('token', $token)->first();

        // Validate the reset token
        if (!$resetRecord || Time::parse($resetRecord['expires_at'])->isBefore(Time::now())) {
            return redirect()->to('/forgot-password')->with('error', 'Invalid or expired password reset token.');
        }

        if ($this->request->is('post')) {
            $rules = [
                'password'         => 'required|min_length[8]',
                'password_confirm' => 'required|matches[password]'
            ];

            if ($this->validate($rules)) {
                $userModel = new UserModel();
                $user = $userModel->where('email', $resetRecord['email'])->first();

                if ($user) {
                    // Update user's password
                    $userModel->update($user['id'], [
                        'password_hash' => $this->request->getPost('password')
                    ]);
                    
                    // Delete the token so it cannot be used again
                    $tokenModel->where('email', $resetRecord['email'])->delete();

                    return redirect()->to('/login')->with('success', 'Your password has been changed successfully. You can now log in.');
                }
            }
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        return view('auth/reset_password', ['token' => $token]);
    }
}