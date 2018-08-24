<?php
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
include ("./database/sql.php");
include ("./json_api/json_encode_thai.php");

$methodType = $_SERVER['REQUEST_METHOD'];

function makeResponse($code, $data) {
    $response->status = $code;
    $response->data = $data;
    return $response;

}

switch ($methodType) {
    case "GET":
        $requestType = $_GET['type'];
        $reqData = $_GET['data'];
        print(json_encode(makeResponse("404", "Invalid request " . $requestType)));
        break;
    case "POST":
        $inputJSON = file_get_contents('php://input');
        $input= json_decode( $inputJSON, TRUE ); //convert JSON into array
//        print_r(json_encode($input));
//        echo($input['type']);
        $requestType = $input['type'];
//        $requestType = $_POST['type'];
//        $reqData = $_POST['data'];
        $reqData = $input['data'];
//        echo($requestType);
//        echo($reqData);

        switch ($requestType) {
            case "sno":
            case "sno\n":
                $sqlMsg = "SELECT * FROM  ali_member WHERE  mcode = '" . $reqData . "'";
                $data = makeSqlRequest($conn, $sqlMsg);
                if ($data->num_rows > 0) {
                    $result = array();
                    while($r = $data->fetch_assoc()) {
                        $result[] = $r;
                    }
                    $response = makeResponse(200, js_thai_encode($result));
                    print(json_encode($response));
                }
                else {
                    header("HTTP/1.0 404 Not Found");
                    print("Data not found : " . $requestData);
                }
                break;
            case "name":
            case "name\n":
                echo "Your favorite color is blue!";
                break;
            default:
                print(json_encode(makeResponse("404", "Invalid request " . $requestType)));
        }
        break;
    default:
        print(json_encode(makeResponse("404", "API not allow")));
        break;
}
?>