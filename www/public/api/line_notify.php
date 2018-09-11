<?php


class LineNotify
{
    public static $AGENT_TOKEN = "H2h40QlHsnHqpdhZj9sbudSn9CEXKPn92Dvxg5noFYm";

    public static function notify_message($message) {
        $mms =  trim($message); // ข้อความที่ต้องการส่ง
        date_default_timezone_set("Asia/Bangkok");
        $chOne = curl_init();
        curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        // SSL USE
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
        //POST
        curl_setopt( $chOne, CURLOPT_POST, 1);
        curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=$mms");
        curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1);
        $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '. LineNotify::$AGENT_TOKEN .'', );
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
        curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec( $chOne );
        //Check error
        if(curl_error($chOne))
        {
            echo 'error:' . curl_error($chOne);
        }
        else {
            $result_ = json_decode($result, true);
            echo "status : ".$result_['status']; echo "message : ". $result_['message'];
        }
        curl_close( $chOne );
    }
}

?>