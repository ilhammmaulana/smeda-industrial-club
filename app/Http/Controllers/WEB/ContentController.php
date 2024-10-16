<?php

namespace App\Http\Controllers\WEB;

use App\Models\ContentAttribute;
use App\Models\ContentModel;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use illuminate\Support\Str;

class ContentController extends Controller
{
    use ResponseAPI;

    protected $success;

    public function __construct()
    {
        $this->success = Config::get('constants.messages._SUCCESS');

    }

    // public function indexApi()
    // {
    //     $error = Config::get('constants.messages._ERROR');
    //     $success = Config::get('constants.messages._SUCCESS');
    //     $content = ContentModel::all();
    //     return $this->requestSuccessData($content, 'success', $success->content->retrieve);
    // }

    // public function showApi(string $id)
    // {
    //     $error = Config::get('constants.messages._ERROR');
    //     $success = Config::get('constants.messages._SUCCESS');

    //     try {
    //         // Attempt to retrieve the content with the specified ID, including its related attributes
    //         $content = ContentModel::with('contentAttribute')->findOrFail($id);

    //         // Return success response with content data
    //         return $this->requestSuccessData($content, 'success', $success->content->retrieve);
    //     } catch (ModelNotFoundException $e) {
    //         // Handle the case where the content is not found
    //         return $this->requestNotFound($error->content->not_found);
    //     } catch (\Exception $e) {
    //         // Handle other unexpected exceptions
    //         return $this->badRequestWithLog($error->generic->message);
    //     }
    // }


    public function index()
    {
        $contentData = ContentModel::all();
        return view("pages.master.content.index", compact("contentData"));
    }

    public function create()
    {
        return view("pages.master.content.add");
    }

    public function store(Request $request)
    {
        $error = Config::get('constants.messages._ERROR');
        $success = Config::get('constants.messages._SUCCESS');
        // Validasi input
        $validateData = Validator::make($request->all(), [
            'subject' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'header' => 'nullable|string',
            'body' => 'nullable|string',
            'footer' => 'nullable|string'
        ]);

        if ($validateData->fails()) {
            return response()->json(['errors' => $validateData->errors()], 400);
        }

        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('images', 'public');
                $imagePath = str_replace('/storage', 'storage', Storage::url($path));
            }

            $contentData = ContentModel::create([
                'subject' => $request->subject,
                'image' => $imagePath
            ]);

            ContentAttribute::create([
                'content_id' => $contentData->id,
                'header' => $request->header,
                'body' => $request->body,
                'footer' => $request->footer,
            ]);

            return redirect()->route('contents.index')->with('success', $success->content->create);
        } catch (\Throwable $e) {
            return response()->json(['error' => $error->content->create], 500);
        }
    }



    public function edit(string $id)
    {
        $content = ContentModel::findOrFail($id);
        $contentAttributes = ContentAttribute::where('content_id', $content->id)->first();
        return view("pages.master.content.edit", compact('content', 'contentAttributes'));
    }



    public function update(Request $request, string $id)
    {
        $error = Config::get('constants.messages._ERROR');
        $success = Config::get('constants.messages._SUCCESS');
        $validateData = Validator::make($request->all(), [
            'subject' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'header' => 'nullable|string',
            'body' => 'nullable|string',
            'footer' => 'nullable|string'
        ]);

        if ($validateData->fails()) {
            return response()->json(['errors' => $validateData->errors()], 400);
        }
        try {

            $findData = ContentModel::findOrFail($id);


            $imagePath = $findData->image;
            if ($request->input('image_remove') == 1) {
                if ($imagePath) {
                    File::delete(public_path($imagePath));
                }
                $imagePath = null;
            } elseif ($request->hasFile('image')) {
                if ($imagePath) {
                    File::delete(public_path($imagePath));
                }

                $imageFile = $request->file('image');
                $filename = Str::slug($request->name) . time() . '.' . $imageFile->getClientOriginalExtension();
                $storedPath = $imageFile->storeAs('images', $filename, 'public');
                $imagePath = 'storage/' . $storedPath;
            }

            // Update ContentModel data
            $findData->update([
                'subject' => $request->subject ?? $findData->subject,
                'image' => $imagePath
            ]);

            // Update ContentAttribute data
            $findAttributes = ContentAttribute::where('content_id', $findData->id)->first();
            $findAttributes->update([
                'header' => $request->header ?? $findAttributes->header,
                'body' => $request->body ?? $findAttributes->body,
                'footer' => $request->footer ?? $findAttributes->footer,
            ]);

            return redirect()->route('contents.index')->with('success', $success->content->update);
        } catch (\Throwable $e) {
            return response()->json(['error' => $error->content->update], 500);
        }
    }


    public function destroy(string $id)
    {
        $error = Config::get('constants.messages._ERROR');
        $success = Config::get('constants.messages._SUCCESS');
        $findData = ContentModel::findOrFail($id);
        $contentAttribute = ContentAttribute::where('content_id', $findData->id)->first();

        if (!$findData) {
            return redirect()->back()->with('error', $error->content->retrieve);
        }

        if ($contentAttribute) {
            $contentAttribute->delete();
        }

        if ($findData->image) {
            $imagePath = public_path($findData->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }


        $findData->delete();
        return redirect()->route('contents.index')->with('success', $success->content->delete);
    }
}
