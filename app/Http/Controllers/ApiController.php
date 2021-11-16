<?php

namespace App\Http\Controllers;

use App\Candidato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    static function getUserOnGitHub(){
        for ($i = 1; $i <= 5; $i++) {
            try {
                $response = Http::get('https://api.github.com/search/users?q=location%3ABrasil+location%3ABrazil+location%3A%22S%C3%A3o+Paulo%22+followers%3A%3E20+repos%3A%3E5+language%3APHP&l=&l=PHP&per_page=100&page='.$i);
                $response = $response->json();
                foreach ($response['items'] as $item) {
                    try {
                        $response = Http::withHeaders(
                            ['authorization' => 'token '.env('GIT_TOKEN_ACCESS')]
                        )->get($item['url']);
                        $response = $response->json();
                        $candidato = new Candidato;
                        $candidato->git_name = $response['name'];
                        $candidato->git_url = $response['url'];
                        $candidato->git_avatar_url = $response['avatar_url'];
                        $candidato->git_bio = $response['bio'];
                        $candidato->location = $response['location'];
                        $candidato->git_public_repos = $response['public_gists'];
                        $candidato->git_public_followers = $response['followers'];
                        $candidato->git_public_following = $response['following'];
                        $candidato->save();
                    } catch (\Exception $e) {

                    }

                }
            } catch (\Exception $e) {

            }
        }
        return 1;
    }
}
