# การเรียก Web service ด้วย curl ในภาษา PHP
----

1. สร้างไฟล์ใหม่ชื่อ curl_test.php และทำการประกาศ php tag
``` php
<?php>

</?>
```

2. เตรียมข้อมูลที่ต้องการจะส่ง
``` php
    $data = array(
            'userId' => "",
            'hospitalName' => "",
            'origin' => "",
            'queueNumber' => "",
            'patientName' => "",
            'appointmentDate' => "",
            'appointmentTime' => "",
            'detailsLink' => "",
            'currentQueueLink' => "",
    );
```

3. แปลงข้อมูลให้อยู่ในรูปแบบ JSON string
``` php
    $data_string = json_encode($data);
```

4. ระบุ URL ของ Web service
``` php
    $url = 'https://mophconnect-ega.clockupstudio.com/test2/api/queue'
```

5. เตรียม curl
``` php
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string))                 
        );
```

6. ทำการเรียก service และ ดูผลลัพธ์
``` php
    $result = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    echo "<br> response message: $result";
    echo "<br> status code: $httpcode";
```
