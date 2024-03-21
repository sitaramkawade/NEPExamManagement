<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Service\AdExchangeBuyerII\Client;

class GoogleDriveController extends Controller
{
    public function uploadFile()
    {
        // Create Google API client
        $client = new Google_Client();
        $client->setApplicationName('YourAppName');
        $client->setAuthConfig([
            'client_id' => env('GOOGLE_CLIENT_ID'),
            'client_secret' => env('GOOGLE_CLIENT_SECRET'),
            'redirect_uri' => env('GOOGLE_REDIRECT_URI'),
        ]);
        $client->setAccessType('offline');
        $client->setApprovalPrompt('force');

        // Authenticate with Google API
        if ($accessToken = session('access_token')) {
            $client->setAccessToken($accessToken);
        } else {
            // Redirect to Google OAuth consent screen if not authenticated
            return redirect()->away($client->createAuthUrl(['https://www.googleapis.com/auth/drive.file']));
        }

        // Create Google Drive service
        $driveService = new Google_Service_Drive($client);

        // Upload file
        $fileMetadata = new \Google_Service_Drive_DriveFile([
            'name' => 'MyFile.txt' // Change the filename as needed
        ]);
        $content = file_get_contents(storage_path('app/file_to_upload.txt')); // Replace 'file_to_upload.txt' with the path to your file
        $driveService->files->create($fileMetadata, [
            'data' => $content,
            'uploadType' => 'multipart'
        ]);

        return "File uploaded successfully!";
    }
}
