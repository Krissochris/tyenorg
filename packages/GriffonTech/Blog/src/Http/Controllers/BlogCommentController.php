<?php

namespace GriffonTech\Blog\Http\Controllers;

use GriffonTech\Blog\Repositories\BlogCommentRepository;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{

    protected $_config;

    protected $blogCommentRepository;

    public function __construct(
        BlogCommentRepository $blogCommentRepository
    )
    {

        $this->_config = request('_config');

        $this->blogCommentRepository = $blogCommentRepository;
    }


    public function index()
    {
        $comments = $this->blogCommentRepository
            ->with(['user:id,name', 'blog:id,title'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view($this->_config['view'])->with(compact('comments'));
    }


    public function edit($id)
    {
        $comment = $this->blogCommentRepository
            ->with(['user:id,name'])
            ->findOrFail($id);

        return view($this->_config['view'])->with(compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $comment = $this->blogCommentRepository->update($request->only(['comment', 'status']), $id);

        if ($comment) {
            session()->flash('success', 'Comment was successfully updated');
        } else {
            session()->flash('error', 'Comment could not be updated. Try again');
        }
        return redirect()->route($this->_config['redirect'], $id);
    }



    public function destroy($id)
    {
        $commentDeleted = $this->blogCommentRepository->delete($id);

        if ($commentDeleted) {
            session()->flash('success', 'Comment was successfully deleted');
        } else {
            session()->flash('error', 'Comment could not be deleted');
        }
        return redirect()->route($this->_config['redirect']);
    }
}