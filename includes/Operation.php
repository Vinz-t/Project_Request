
<?php
    session_start();

    include_once 'Config.php';

    $conn = (new Connection())->getConnection();
    (new Connection())->openConnection();

    if (isset($_POST['submit'])) 
    {
        if ($_POST['submit'] == 'login') {
            logUser();
        }   
    }

    function logUser() 
    {
        global $conn;

        $user = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM accounts_tbl WHERE acct_username = ? AND password = ?";
        $params = array($user, $password);
        $result = sqlsrv_query($conn, $sql, $params);

        if ($result === false) {
            die(print_r(sqlsrv_errors(), true));
        }


        if (sqlsrv_has_rows($result)) {
            // User found, proceed with login
            $_SESSION['logged_in'] = true;
            header("Location: /JobOrderRequestSystem/dashboard.php");
            exit();
            // echo "<script>location.href = '/JobOrderRequestSystem/dashboard.php';</script>";
        } else {
            // User not found
            $_SESSION['logged_in'] = false;
            if (!empty($_POST['Eid']) || !empty($_POST['password'])) {
                header("Location: /JobOrderRequestSystem/index.php?invalid=1");
                exit();
                //echo "<script>location.href = '/JobOrderRequestSystem/index.php?invalid=1';</script>";
            }
        }

        sqlsrv_free_stmt($result);
    }
    
    (new Connection())->closeConnection();

?>