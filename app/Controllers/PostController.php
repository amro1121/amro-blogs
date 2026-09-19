<?php
namespace App\Controllers;

use App\Models\PostModel;

class PostController extends BaseController
{
    public function create()
    {
        return view('posts/create');
    }

    public function store()
    {
        //dd($this->request->getFile('featured_image'));

        $rules = [
            'title'          => 'required|max_length[255]',
            'body'           => 'required',
            'status'         => 'required|in_list[draft,published]',
            'featured_image' => 'permit_empty|is_image[featured_image]|max_size[featured_image,2048]'
        ];

        if ($this->validate($rules)) {
            $file = $this->request->getFile('featured_image');
            $imagePath = null;
            
            // If a file was uploaded (Error 4 means no file was selected)
            if ($file && $file->getError() !== 4) {
                if ($file->isValid() && !$file->hasMoved()) {
                    // Auto-create the folder if it does not exist
                    $uploadPath = FCPATH . 'uploads/posts';
                    if (!is_dir($uploadPath)) {
                        mkdir($uploadPath, 0777, true);
                    }

                    $newName = $file->getRandomName();
                    $file->move($uploadPath, $newName);
                    $imagePath = 'uploads/posts/' . $newName;
                } else {
                    // If the upload failed (e.g., too big, wrong format), stop and show the error
                    return redirect()->back()->withInput()->with('errors', [$file->getErrorString()]);
                }
            }

            $model = new \App\Models\PostModel();
            $model->save([
                'user_id'        => session()->get('userData')['id'],
                'title'          => $this->request->getPost('title'),
                'body'           => $this->request->getPost('body'),
                'status'         => $this->request->getPost('status'),
                'featured_image' => $imagePath,
                'published_at'   => $this->request->getPost('status') === 'published' ? date('Y-m-d H:i:s') : null
            ]);

            return redirect()->to('/dashboard')->with('success', 'Post created successfully!');
        }

        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
}