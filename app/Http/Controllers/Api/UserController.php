<?php


namespace App\Http\Controllers\Api;
require_once "vendor/autoload.php";

use App\Http\Controllers\Controller;
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use Validator;
use GuzzleHttp\Client;

class UserController extends Controller
{
    private $clientId = '9320901696173011';
    private $clientSecret = 'msupiKLzhpLg5_gaVPyifo3cF03_XGn6';
    private $authUrl = 'https://api.tiki.vn/sc/oauth2/token';
    private $tokenUrl = 'https://api.tiki.vn/sc/oauth2/auth';
    private $redirectUri = 'http://localhost/aws/oauth2-callback';
    private $scope = 'product';

    
    public function redirectToAuth(Request $request)
    {
        // Chuyển hướng người dùng đến điểm cuối xác thực OAuth2
        $url = $this->authUrl . '?response_type=code&client_id=' . $this->clientId . '&redirect_uri=' . $this->redirectUri . '&scope=' . $this->scope;
        return redirect($url);
    }

    public function handleCallback(Request $request)
    {
        // Xử lý callback từ điểm cuối xác thực OAuth2
        $code = $request->input('code');

        // Đổi mã xác thực thành access token
        $client = new Client();
        $response = $client->post($this->tokenUrl, [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
                'redirect_uri' => $this->redirectUri,
                'code' => $code,
            ],
        ]);

        // Phân tích phản hồi để lấy access token
        $data = json_decode($response->getBody(), true);
        $accessToken = $data['access_token'];

        //Bây giờ bạn có thể sử dụng $accessToken để gửi các yêu cầu API
        //Ví dụ:
        $apiResponse = $client->get('https://api.tiki.vn/integration/v2/products', [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
            ],
        ]);

        // Xử lý phản hồi từ API hoặc thực hiện các hành động khác theo nhu cầu

        return view('oauth2_callback', ['accessToken' => $accessToken]);
    }
    
    public function getApiDataProducts(Request $request)
    {
        $accessToken = 'lBDv8LlniAyb0RHyre5ODi6dHL82tMl_oqwJG5th534.4RlY8uOerupRomfMrxNLdeabfjLMuaHZOC6yF-jIo8o'; // Thay thế bằng access token 

        $client = new Client();

        try {
            $response = $client->get('https://api.tiki.vn/integration/v2/products?include=inventory', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Accept' => 'application/json', // Điều này phụ thuộc vào cách API của bạn xử lý định dạng
                ],
            ]);

            // Kiểm tra xem yêu cầu có thành công không (status code 200)
            if ($response->getStatusCode() === 200) {
                $apiData = json_decode($response->getBody(), true);
                 
                // In ra dữ liệu API
                // dd($apiData);
                
                // return view('warehouse', compact($apiData) );  
                return view('request')->with('data', $apiData);
                          
            } else {
                // Xử lý lỗi nếu có
                // Ví dụ: return response()->json(['message' => 'Lỗi trong khi gửi yêu cầu đến API'], $response->getStatusCode());
            }
        } catch (Exception $e) {
            // Xử lý ngoại lệ nếu có
            // Ví dụ: return response()->json(['message' => 'Có lỗi xảy ra: ' . $e->getMessage()], 500);
        }
        
    }

    public function getApiDataRequest(Request $request)
    {
        $accessToken = 'lBDv8LlniAyb0RHyre5ODi6dHL82tMl_oqwJG5th534.4RlY8uOerupRomfMrxNLdeabfjLMuaHZOC6yF-jIo8o'; // Thay thế bằng access token 

        $client = new Client();

        try {
            $response = $client->get('https://api.tiki.vn/integration/v2/requests', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Accept' => 'application/json', // Điều này phụ thuộc vào cách API của bạn xử lý định dạng
                ],
            ]);

            // Kiểm tra xem yêu cầu có thành công không (status code 200)
            if ($response->getStatusCode() === 200) {
                $apiData = json_decode($response->getBody(), true);
                 
                // In ra dữ liệu API
                //dd($apiData);
                //$data = json_decode($apiData);
                return view('managerproduct', ['data' => $apiData]);
                //return view('managerproduct')->with('data', $apiData);
                
            } else {
                // Xử lý lỗi nếu có
                // Ví dụ: return response()->json(['message' => 'Lỗi trong khi gửi yêu cầu đến API'], $response->getStatusCode());
            }
        } catch (Exception $e) {
            // Xử lý ngoại lệ nếu có
            // Ví dụ: return response()->json(['message' => 'Có lỗi xảy ra: ' . $e->getMessage()], 500);
        }
    }



}
    
