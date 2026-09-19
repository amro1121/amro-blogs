<?php
namespace App\Controllers;

use App\Models\PostModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $postModel = new PostModel();
        $userId = session()->get('userData')['id'];

        $data = [
            'user'           => session()->get('userData'),
            'totalPosts'     => $postModel->where('user_id', $userId)->countAllResults(),
            'publishedPosts' => $postModel->where('user_id', $userId)->where('status', 'published')->countAllResults(),
            'draftPosts'     => $postModel->where('user_id', $userId)->where('status', 'draft')->countAllResults(),
            'recentPosts'    => $postModel->where('user_id', $userId)->orderBy('created_at', 'DESC')->findAll(5)
        ];
        
        return view('dashboard/index', $data);
    }
}