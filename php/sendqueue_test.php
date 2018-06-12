<?php
    require_once "sendqueue.php";

    echo "Testing MOPH Connect ticket API";

    $line_id = $_GET['lineid'];

    echo "<br> line id: $line_id";

    sendQueue(
        $line_id,
        'โรงพยาบาลปทุมธานี', //ชื่อโรงพยาบาล
        'กระทรวงสาธารณสุข', //สังกัด
        'จุดคัดกรอง คิวที่ 2221', //เลขคิว
        'นาย ทิชา ล่าสุด', //ชื่อคนไข้
        '2018-04-30', //วันที่นัด
        'เวลานัดหมาย 09:00-09:15 น. กรุณามาก่อนเวลา 10 นาที', //เวลาที่นัด
        'http://pth.ddns.net/', //Link สำหรับดูรายละเอียดเพิ่มเติม
        'http://pth.ddns.net/' //Link สำหรับดูคิวปัจจุบัน
    );                                                                  
?>