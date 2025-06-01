  <?php

  require "../config/Connection.php";
  

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require '../vendor/autoload.php';



  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['check_email'];

    $sql = "SELECT * FROM users where email = '$email'";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
      $name = $row['name'];
      $token = bin2hex(random_bytes(50));
      $expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));
      $sql = "UPDATE users SET token = '$token' , reset_token = '$expiry' where email = '$email'";
      $result = $conn->query($sql);
      
        $resetLink = "http://localhost/Authentication_System/View/reset-password.php?token=$token";
        $mail = new PHPMailer();
        try {
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = 'abdullahsiddiqui70707070@gmail.com';
          $mail->Password = 'mloj yxgp eqhv xstq';
          $mail->SMTPSecure = 'tls';
          $mail->Port = 587;

          $mail->setFrom('abdullahsiddiqui70707070@gmail.com', 'Aptech Learning Pakistan');
          $mail->addAddress($email, $name);

          $mail->isHTML(true);
          $mail->Subject = "Aplication Recieved";
          $mail->Body = "
            <div style='font-family: Arial, sans-serif; color: #333; line-height: 1.5; max-width: 600px; margin: auto;'>
        <h2 style='color: #004aad;'>Password Reset Request</h2>
             <p>Dear $name</p>
        <p>We received a request to reset the password associated with this email address.</p>
        <p>To reset your password, please click the button below:</p>
        <p style='text-align: center;'>
            <a href='{$resetLink}' 
               style='background-color: #004aad; color: #ffffff; padding: 12px 24px; text-decoration: none; border-radius: 4px; display: inline-block; font-weight: bold;'>
               Reset Password
            </a>
        </p>
        </div>
            
            ";

            $mail->send();
            header("Location: ../View/index.php?reset=true");
            exit();
        } catch (Exception $e) {
           header("Location: ../View/index.php?reset=false");
            exit();
        }
      }
    
  }
  ?>