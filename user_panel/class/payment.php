<?php
session_start();

use Razorpay\Api\Api;
use function PHPSTORM_META\map;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require("C:/xampp/htdocs/php/IronForce-Gym/path.php");

include(DRIVE_PATH . "../database.php");

$_SESSION["name"] = $_POST["name"];
$_SESSION["phone"] = $_POST["phone"];
$_SESSION["gender"] = $_POST["gender"];

if (str_contains($_POST["dob"], "-")) {
    $_SESSION["dob"] = date("Y/m/d", strtotime($_POST["dob"]));
} else {
    $_POST["dob"] = explode("/", $_POST["dob"]);
    $_SESSION["dob"] = $_POST["dob"][2] . "/" . $_POST["dob"][1] . "/" . $_POST["dob"][0];
}

$_SESSION["start_date"] = date("Y/m/d", strtotime('tomorrow'));

if ($_SESSION["membership_type"] == 1) {
    $_SESSION["end_date"] = date("Y/m/d", strtotime("+1 day"));
} else if ($_SESSION["membership_type"] == 2) {
    $_SESSION["end_date"] = date("Y/m/d", strtotime("+12 months"));
} else {
    $_SESSION["end_date"] = date("Y/m/d", strtotime("+6 months"));
}

$_SESSION["status"] = 1;
$_SESSION["goal"] = $_POST["goal"];
$_SESSION["weight"] = $_POST["weight"];
$_SESSION["height"] = $_POST["height"];
$_SESSION["medical_condition"] = $_POST["medical_condition"];
$_SESSION["experience"] = $_POST["experience"];

if ($_SESSION["membership_type"] == 1) {
    $_SESSION["plan_duration"] = "1 Day";
} else if ($_SESSION["membership_type"] == 2) {
    $_SESSION["plan_duration"] = "12 Months";
} else {
    $_SESSION["plan_duration"] = "6 Months";
}

$_SESSION["payment_type"] = $_POST["payment_type"];

$_SESSION["address"] = array(
    "house-number" => $_POST["house-number"],
    "apartment" => $_POST["apartment"],
    "suite" => $_POST["suite"],
    "city" => $_POST["city"],
    "pincode" => $_POST["pincode"]
);
$_SESSION["timing"] = $_POST["timing"];

//! Send Email
function send_email($name, $email, $membership_type, $start_date, $end_date, $timing)
{

    require DRIVE_PATH . "/user_panel/class/phpmailer/src/Exception.php";
    require DRIVE_PATH . "/user_panel/class/phpmailer/src/PHPMailer.php";
    require DRIVE_PATH . "/user_panel/class/phpmailer/src/SMTP.php";

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "dainikmakwana31@gmail.com";
    $mail->Password = "kjhc tkbb hzcn ciep";
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;

    $mail->setFrom("dainikmakwana31@gmail.com");
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = "Welcome to IronForce Gym - Let's Crush Your Fitness Goals!";

    $msg = "Congratulations on taking the first step toward a stronger, healthier you! We're thrilled to welcome you to the IronForce Gym family. Your membership is now active, and we can't wait to help you achieve your fitness goals.
    <br/><br/>
Here's what's next:<br/>
✅ Membership Details:<br/>
Plan: $membership_type<br/>
Start Date: $start_date<br/>
End Date: $end_date<br/>
Access Hours: $timing
<br/><br/>
Facilities: Full access to weightlifting zones, cardio equipment etc.
<br/><br/>
📍 Gym Location: 123 Fitness Plaza, Near Shivranjani Crossroads Opposite Skyline Tower, Bodakdev Ahmedabad, Gujarat - 380054
<br/><br/>
🔑 How to Access: Use your member ID (attached) at the front desk
<br/><br/>
Pro Tip: Check out our [class schedule/personal training options] to maximize your results. Book sessions via our Website or at the front desk!
<br/><br/>
Need help or have questions? Reply to this email or call us at +91 98765 43210. Our team is here to support you.
<br/><br/>
Let's make every rep count! 💪
<br/>
See you at the gym,<br/>
John Carter<br/>
Manager of the IronForce Gym<br/>
IronForce Gym<br/>
+91 98765 43210
<br/><br/>
Why this works:<br/>
Warm & motivating tone - Celebrates their decision and builds excitement.<br/>
Clear next steps - Avoids confusion with key details upfront.<br/>
Call-to-action - Encourages engagement (booking classes, asking questions).<br/>
Brand personality - Adjust emojis/formality to match your gym's vibe (e.g., more hardcore or community-focused).";

    $mail->Body = $msg;
    $mail->send();
} ?>

<input type="hidden" class="name" value="<?php echo $_SESSION["name"]; ?>" />
<input type="hidden" class="email" value="<?php echo $_SESSION["email"]; ?>" />
<input type="hidden" class="phone" value="<?php echo $_SESSION["phone"]; ?>" />
<input type="hidden" class="address" value="<?php echo $_POST["house-number"] . " " . $_POST["apartment"] . " near " . $_POST["suite"] . ", " . $_POST["city"] . " - " . $_POST["pincode"]; ?>" />

<?php //! Payment
if ($_POST["payment_type"] == "Razorpay") {
    require DRIVE_PATH . "/user_panel/class/payment/vendor/autoload.php";

    $api_key = "rzp_test_omt6wXyJiqN0lX";
    $api_secret = "7e63a7DNPonx2Rh3WoDMR3fj";

    $api = new Api($api_key, $api_secret);

    $res = $api->order->create(array(
        'receipt' => '123',
        'amount' => $_SESSION["membership_fee"] * 100,
        'currency' => 'INR'
    ));
    if (!empty($res["id"])) {
?>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

        <script>
            $(document).ready(function() {
                let name = $(".name").val();
                let email = $(".email").val();
                let phone = $(".phone").val();

                var options = {
                    "key": "rzp_test_omt6wXyJiqN0lX",
                    "amount": <?php echo $_SESSION["membership_fee"] * 100; ?>,
                    "currency": "INR",
                    "name": "INVIGOR FITNESS STUDIO",
                    "description": "INVIGOR FITNESS STUDIO is a fitness-focused website offering information about gym facilities, membership plans, training programs, and expert coaching.",
                    "image": "<?php echo HTTP_PATH . "/user_panel/darkLogo.png"; ?>",
                    "order_id": "<?php echo $res["id"]; ?>",
                    "handler": function(response) {
                        location.href = "insert.php";
                    },
                    "prefill": {
                        "name": name,
                        "email": email,
                        "contact": "+91 " + phone
                    },
                    "notes": {
                        "address": "123 Fitness Plaza, Near Shivranjani Crossroads Opposite Skyline Tower, Bodakdev Ahmedabad, Gujarat - 380054"
                    },
                    "theme": {
                        "color": "#f36100"
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
                rzp1.on('payment.failed', function(response) {
                    alert("Transaction Failed");
                });
                history.back();
            });
        </script>
    <?php
    }
} else { ?>
    <script>
        location.href = "insert.php";
    </script>
<?php } ?>