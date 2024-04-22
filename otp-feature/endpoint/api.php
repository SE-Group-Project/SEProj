<?php
session_start();
include 'config.php';
// Function to generate a random OTP
function generateOTP() {
    return rand(100000, 999999);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {

    $action = $_POST['action'];

    switch ($action){
        case "sendotp" :
                        $email = isset($_POST['email']) ? $_POST['email'] : '';

                        // Validate email
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            http_response_code(400); // Bad Request
                            echo "Invalid email address";
                            exit;
                        }

                        // Generate OTP
                        $otp = generateOTP();

                        $_SESSION['otp_email'] = $email;
                        $_SESSION['otp'] = $otp;

        
                        $subject = "Your OTP for Registration";
                        $message = "Your OTP is: " . $otp;
                        $message .= "<br>Please do not share the OTP!";
                        $message .= "<br>This OTP is valid for 5 min only.";

                        $uid = uniqid();
                        $header = "From: Automatio Password Team <hunainamir00@gmail.com>" . "\r\n";
                        $header .= "Reply-To: youremail@gmail.com" . "\r\n";
                        $header .= "MIME-Version: 1.0" . "\r\n";
                        $header .= "Content-Type: text/html; boundary=\"".$uid."\"\r\n\r\n";


                        // $nmessage .= "Content-type:text/html; charset=iso-8859-1\r\n";
                        // $nmessage .= "Content-Transfer-Encoding: base64\r\n";

                        $mailSent = mail($email, $subject, $message, $header);

                        if ($mailSent) {
                            $_SESSION['otp_timestamp'] = time();
                            echo "OTP Sent Successfully";
                        } else {
                            http_response_code(500); // Internal Server Error
                            echo "Failed to send OTP";
                        }
                        break;
        case "verifyotp":


                        $enteredOTP = isset($_POST['otp']) ? $_POST['otp'] : '';

                        $savedOTP = isset($_SESSION['otp']) ? $_SESSION['otp'] : '';
                        $savedEmail = isset($_SESSION['otp_email']) ? $_SESSION['otp_email'] : '';
                        $savedTimestamp = isset($_SESSION['otp_timestamp']) ? $_SESSION['otp_timestamp'] : 0;
            
                        $enteredEmail = isset($_POST['otp_email']) ? $_POST['otp_email'] : '';
            
                        if ($enteredOTP == $savedOTP && $enteredEmail == $savedEmail) {
                            // Check if the timestamp is within 5 minutes
                            if (time() <= ($savedTimestamp + 300)) {
                                echo "OTP Verified";
                            } else {
                                unset($_SESSION['otp']);
                                unset($_SESSION['otp_email']);
                                unset($_SESSION['otp_timestamp']);
                                echo "OTP Expired"; 
                            }
                        } else {
                            echo "Invalid OTP or Email";
                        }
                        break;
        case "registration":
                        $savedOTP = isset($_SESSION['otp']) ? $_SESSION['otp'] : '';
                        $savedEmail = isset($_SESSION['otp_email']) ? $_SESSION['otp_email'] : '';
                        $savedTimestamp = isset($_SESSION['otp_timestamp']) ? $_SESSION['otp_timestamp'] : 0;

                        $enteredEmail = isset($_POST['email']) ? $_POST['email'] : '';
                        $enteredOTP = isset($_POST['otp']) ? $_POST['otp'] : '';

                        if ($enteredOTP == $savedOTP && $enteredEmail == $savedEmail) {
                            // Check if the timestamp is within 5 minutes
                            if (time() <= ($savedTimestamp + 300)) {

                                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                                $firstName = mysqli_real_escape_string($conn, $_POST["firstName"]);
                                $email = mysqli_real_escape_string($conn, $_POST["email"]);
                            
                            
                                $sql = "INSERT INTO registered (name, email, password)
                                VALUES ('$firstName', '$email', '$password')";
                                $result = mysqli_query($conn, $sql);
                            
                                if ($result) {
                                    unset($_SESSION['otp']);
                                    unset($_SESSION['otp_email']);
                                    unset($_SESSION['otp_timestamp']);       
                                    echo "reg_success";
                                } else {
                                    echo "Registration failed";
                                }


                            } else {
                                unset($_SESSION['otp']);
                                unset($_SESSION['otp_email']);
                                unset($_SESSION['otp_timestamp']);
                                echo "OTP Expired";
                            }
                        } else {
                            echo "Error while registration";
                        }
                        break;

        case "login":

                        $email = mysqli_real_escape_string($conn, $_POST["email"]);
                        $password = $_POST["password"];
                        $sql = "SELECT * FROM registered WHERE email = ?";
                        
                        $stmt = mysqli_prepare($conn, $sql);
                        mysqli_stmt_bind_param($stmt, "s", $email);
                        mysqli_stmt_execute($stmt);
                        
                        $result = mysqli_stmt_get_result($stmt);
                        $row = mysqli_fetch_assoc($result);
                    
                        if ($row && password_verify($password, $row['password'])) {
                            echo "login_success";
                            $_SESSION['user_id'] = $row['id'];
                            $_SESSION['user_email'] = $row['email'];
                            $_SESSION['user_name'] = $row['name'];
                        } else {
                            echo "login_failed";
                        }
                        break;


        case "logout":  
                        session_start();
                        session_unset();
                        session_destroy();
                        header("Location: ../login.php");
                        echo "Logout success";
                        break;


        default:
                        http_response_code(400); // Bad Request
                        echo "Invalid Action";
                        break;


    }

} else {
    http_response_code(405); // Method Not Allowed
    echo "Invalid Request";
}
?>
