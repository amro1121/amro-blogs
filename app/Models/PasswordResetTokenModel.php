<?php
namespace App\Models;

use CodeIgniter\Model;

class PasswordResetTokenModel extends Model
{
    protected $table = 'password_reset_tokens';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'token', 'expires_at', 'created_at'];
    protected $useTimestamps = true;
    protected $updatedField  = ''; // We do not need an updated_at column for tokens
}