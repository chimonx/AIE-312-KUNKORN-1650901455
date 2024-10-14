<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = urlencode($_POST['username']);
    $password = urlencode($_POST['password']);
    
    // สร้าง URL สำหรับทำการตรวจสอบ
    $url = "https://assessment.bu.ac.th/App_AJAX/Login/CheckLogin.aspx?Username=$username&Password=$password";
    
    // ทำการส่ง request ไปยัง URL และดึงผลลัพธ์กลับมา
    $response = file_get_contents($url);
    
    // ส่งผลลัพธ์กลับไปที่ frontend
    echo $response;
} else {
    echo "Invalid request";
}
?>
