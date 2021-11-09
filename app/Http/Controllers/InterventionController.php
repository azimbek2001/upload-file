<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileUploadRequest;
use App\Models\FileUpload;
use App\Services\CreateFileUploadService;
use File;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Image;
use App\Services\Enum\DiskConfigService;
use App\Enums\InterventionImage;

use Illuminate\Http\Request;

class InterventionController extends Controller
{
    /**
     * Show the image upload view
     *
     * @return Application|Factory|View
     */

    private CreateFileUploadService $createFileUploadService;
    private FileUpload $fileUpload;
    private DiskConfigService $diskConfigService;

    public function __construct(
        CreateFileUploadService $createFileUploadService,
        FileUpload $fileUpload,
        DiskConfigService $diskConfigService
    )
    {
        $this->createFileUploadService = $createFileUploadService;
        $this->diskConfigService = $diskConfigService;
    }

    public function index()
    {
        return view('intervention');
    }

    /**
     * store image
     *@param FileUploadRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FileUploadRequest $request)
    {
        $file = $request->file('image');
        $disk = $this->diskConfigService->getDisk();
        $config = new FileUpload();

        $this->createFileUploadService->add($file, $disk, $config);

        return back()->with('success', 'Image uploaded successfully.');
    }
}
