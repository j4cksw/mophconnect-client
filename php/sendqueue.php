<?php 
    function sendQueue($userId, $hospitalName, $origin, $queueNumber, $patientName, $appointmentDate, $appointmentTime, $detailsLink, $currentQueueLink) {
        $data = array(
            'userId' => $userId,
            'hospitalName' => $hospitalName,
            'origin' => $origin,
            'queueNumber' => $queueNumber,
            'patientName' => $patientName,
            'appointmentDate' => $appointmentDate,
            'appointmentTime' => $appointmentTime,
            'detailsLink' => $detailsLink,
            'currentQueueLink' => $currentQueueLink,
        );                                                                    
        $data_string = json_encode($data);
        
        $urls = array('https://mophconnect.go.th/test1/api/queue',
            'https://mophconnect.go.th/test2/api/queue',
            'https://mophconnect.go.th/test3/api/queue',
            'https://mophconnect.go.th/test4/api/queue',
            'https://mophconnect.go.th/test5/api/queue'
        );
        
        for($i = 0; $i < count($urls); $i++) {

            $ch = curl_init($urls[$i]);                                                                      
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
                'Content-Type: application/json',                                                                                
                'Content-Length: ' . strlen($data_string))                                                                       
            );
            curl_setopt($ch, CURLOPT_SSLVERSION, 'all');                                                                                                                   
                                                                                                                                
            $result = curl_exec($ch);
            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);

            echo "<br> endpoint: $urls[$i]";
            echo "<br> response message: $result";
            echo "<br> status code: $httpcode";
            echo "<br> error: $error";
       }
    }      
?>