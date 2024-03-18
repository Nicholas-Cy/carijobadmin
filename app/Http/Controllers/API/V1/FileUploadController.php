<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocUploadRequest;
use App\Http\Requests\ImageUploadRequest;
use App\Repository\API\V1\FileUploadRepository;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class FileUploadController extends Controller
{
    private FileUploadRepository $fileUploadRepository;

    public function __construct(FileUploadRepository $fileUploadRepository)
    {
        $this->fileUploadRepository = $fileUploadRepository;
    }

    /** 
     * Upload an image
     * 
     * Upload an image to the server
     */
    #[OpenApi\Operation(tags: ['File Upload'], method: 'POST')]
    public function uploadImage(ImageUploadRequest $request)
    {
        return $this->fileUploadRepository->upload_image($request);
    }

    /** 
     * Upload a document
     * 
     * Upload a document to the server
     */
    #[OpenApi\Operation(tags: ['File Upload'], method: 'POST')]
    public function uploadDoc(DocUploadRequest $request)
    {
        return $this->fileUploadRepository->upload_doc($request);
    }
}
