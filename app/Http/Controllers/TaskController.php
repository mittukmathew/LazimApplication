<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use App\Interface\BlogRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
  /**
 * @OA\Info(
 *   title="Your API",
 *   version="1.0",
 *   description="Description of your API"
 * )
 */
    public function getBlog(Request $request,BlogRepositoryInterface $blogRepository)
    {
        $titleFilter = $request->input('filter', '');

        $blogs = $blogRepository->getBlog($titleFilter);
        $blogsWithImages = $blogs->map(function ($blog) {
            // Get the full path to the image if it exists
            $imagePath = $blog->uploadedimage ? url('images/' . $blog->uploadedimage) : null;
            // Add the image_path to the blog object
            $blog->uploadedimage = $imagePath;
            return $blog;
        });
     
        return response()->json( $blogsWithImages, 201);
    }

    public function createBlog(Request $request)
    {
        $uuid = Uuid::uuid4();
        $uuidString = $uuid->toString();
        $requestData = $request->all();
        $requestData['uuid'] = $uuidString;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $requestData['uploadedimage']= $imageName;
        }

        $article = Article::create($requestData);

        return response()->json($article, 201);
    }

    public function blogById($id)
    {
        $articleModel = new Article();
        $article = $articleModel->getBlogById($id);
        if ($article->uploadedimage) {
            $imagePath = $article->uploadedimage ? url('images/' . $article->uploadedimage) : null;
            $article->uploadedimage = $imagePath;
        } else {
            $article->uploadedimage = null; 
        }
        return response()->json($article, 201);
    }

    public function updateBlog(Request $request, $id)
    {
        $post = Article::findOrFail($id);

        // Validate the input data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        // Update the record
        $post->update($validatedData);

        return response()->json(['message' => 'Article updated successfully']);
    }

    public function blogDelete(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return response()->json(['message' => 'Article deleted successfully']);
    }

    public function blogDeleteByUuid(Request $request)
    {
        $uuid = $request->input('uuid');
        $record = Article::where('uuid', $uuid)->first();

        if (!$record) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        $record->delete();
        return response()->json(['message' => 'Record deleted successfully'], 200);
    }
}
