<?php



class Api
{
    protected $controller = "";
    protected $method = "";
    protected $params = "";


    public function __construct()
    {
        $url = $this->parseUrl();
        $request = $this->method();

        if (isset($url[0])) {
            if (file_exists(__DIR__ . '/../Controllers/' . $url[0] . '.php')) {
                $this->controller = $url[0];
                unset($this->url[0]);
            } else {
                response(
                    [
                        'status' => false,
                        'message' => "Path Controller not found"
                    ],
                    500
                );
            }
        } else {
            $this->controller = "Mahasiswa";
        }

        require_once __DIR__ . '/../Controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller();

        if (isset($request["method"])) {
            if (method_exists($this->controller, $request["method"])) {
                $this->method = $request["method"];
            }
        }
        if (isset($request["data"])) {
            $this->params = $request["data"];
        }

        call_user_func([$this->controller, $this->method], $this->params);
    }

    public function parseUrl()
    {
        if (isset($_GET["url"])) {
            $url = rtrim($_GET["url"]);
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }

    public function method()
    {
        //POST
        if (!empty($_POST)) {
            return ["data" => $_POST, "method" => "index_post"];
            //PUT
        } else if ($_SERVER['REQUEST_METHOD'] === "PUT") {
            parse_str(file_get_contents('php://input'), $_PUT);
            return ["data" => $_PUT, "method" => "index_put"];
            // DELETE
        } else if ($_SERVER['REQUEST_METHOD'] === "DELETE") {
            parse_str(file_get_contents('php://input'), $_DELETE);
            return ["data" => $_DELETE, "method" => "index_delete"];
            // GET
        } else {
            return ["data" => $_GET, "method" => "index_get"];
        }
    }
}
