<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocUploadRequest;
use App\Http\Requests\ImageUploadRequest;
use App\Repository\API\V1\FileUploadRepository;

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
    
    public function uploadImage(ImageUploadRequest $request)
    {
        return $this->fileUploadRepository->upload_image($request);
    }

    /** 
     * Upload a document
     * 
     * Upload a document to the server
     */
    
    public function uploadDoc(DocUploadRequest $request)
    {
        return $this->fileUploadRepository->upload_doc($request);
    }
}
