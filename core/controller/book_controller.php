<?php
header('Content-type: application/json; charset=utf-8');
require_once('../repository/book_repo.php');

abstract class BookController {
    public function init(){
        $repository = new BookRepository();
        if (isset($_REQUEST["event"])) {
            switch ($_REQUEST["event"]) {
                case 'fetchAll':
                    $data = $repository->fetchAll();
                    if ($data == null) {
                        $response["message"] = "No se encuentran registros";
                        $response["success"] = false;
                        $response["data"] = $data;
                        echo json_encode($response);
                    }else{
                        $response["message"] = "Book success";
                        $response["success"] = true;
                        $response["data"] = $data;
                        echo json_encode($response);
                    }
                    break;
                case 'fetch':
                    $data = $repository->fetch($_REQUEST['book_id']);
                    if ($data == null) {
                        $response["message"] = "No se encuentran registros";
                        $response["success"] = false;
                        $response["data"] = $data;
                        echo json_encode($response);
                    } else {
                        $response["message"] = "Book success";
                        $response["success"] = true;
                        $response["data"] = $data[0];
                        echo json_encode($response);
                    }
                    break;
                default:
                    echo '{}';
                    break;
            }
        } else {
            echo '404';
        }
    }
}
BookController::init();
?>