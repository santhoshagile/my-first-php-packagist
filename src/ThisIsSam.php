<?php

namespace Santhosh\SamLib;

class ThisIsSam {

    public function sayHello(){
        return "Hello, I am Santosh from new packagist " . rand(0,1000);
    }

    public function showText($text) {
        return "<p>{$text}</p>";
    }

    public function showImage($url, $alt='') {
        return "<img src='{$url}' alt='{$alt}' style='max-width:200px;border-radius:8px;'/>";
    }

    public function showButton($label, $link='#') {
        return "<a href='{$link}' style='padding:8px 16px;background:#007bff;color:#fff;border-radius:6px;text-decoration:none;'>{$label}</a>";
    }

    public function showCard($title, $content, $imgUrl=null) {
        $imgPart = $imgUrl ? "<img src='{$imgUrl}' style='width:100%;border-radius:8px;'/>" : "";
        return "
            <div style='border:1px solid #ddd;padding:12px;border-radius:8px;margin:8px 0;'>
                {$imgPart}
                <h3>{$title}</h3>
                <p>{$content}</p>
            </div>
        ";
    }

    public function apiResponse($data, $status=200){
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode(['status'=>$status, 'data'=>$data]);
    }

    public function updateContent($type, $data){
        // Example switch for dynamic content update
        switch($type){
            case 'text': return $this->showText($data);
            case 'image': return $this->showImage($data['url'], $data['alt'] ?? '');
            case 'button': return $this->showButton($data['label'], $data['link']);
            default: return "Unknown content type";
        }
    }
}
