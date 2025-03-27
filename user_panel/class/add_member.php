<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use Razorpay\Api\Api;
use function PHPSTORM_META\map;


require("C:/xampp/htdocs/php/IronForce-Gym/path.php");

include(DRIVE_PATH . "../database.php");

class Membership
{
    public $id;
    public $name;
    public $email;
    public $phone;
    public $gender;
    public $dob;
    public $membership_type;
    public $start_date;
    public $end_date;
    public $status;
    public $membership_fee;
    public $created_at;
    public $updated_at;
    public $goal;
    public $weight;
    public $height;
    public $medical_condition;
    public $experience;
    public $plan_duration;
    public $payment_type;
    public $address;
    public $timing;

    function setValue()
    {
        $this->id = 1;

        global $conn;
        $sel = $conn->prepare("SELECT * FROM `membership` ORDER BY `id` DESC LIMIT 1");
        $sel->execute();
        $sel = $sel->fetchAll();
        $sel = $sel[0];

        $this->id = $sel["id"] + 1;

        $this->name = $_POST["name"];
        $this->email = $_POST["email"];
        $this->phone = $_POST["phone"];
        $this->gender = $_POST["gender"];
        $this->dob = $_POST["dob"];

        $this->membership_type = $_SESSION["membership_type"];
        $this->start_date = (new DateTime('tomorrow'))->format('Y-m-d');

        if ($_SESSION["membership_type"] == 1) {
            $futureDate = date('Y-m-d');
        } else if ($_SESSION["membership_type"] == 2) {
            $futureDate = date('Y-m-d', strtotime('+12 months'));
        } else {
            $futureDate = date('Y-m-d', strtotime('+6 months'));
        }
        $this->end_date = $futureDate;
        $this->status = 1;
        $this->membership_fee = $_SESSION["membership_fee"];
        $this->goal = $_POST["goal"];
        $this->weight = $_POST["weight"];
        $this->height = $_POST["height"];
        $this->medical_condition = $_POST["medical_condition"];
        $this->experience = $_POST["experience"];

        if ($_SESSION["membership_type"] == 1) {
            $this->plan_duration = "1 Day";
        } else if ($_SESSION["membership_type"] == 2) {
            $this->plan_duration = "12 Months";
        } else {
            $this->plan_duration = "6 Months";
        }

        $this->payment_type = $_POST["payment_type"];

        $this->address = array(
            "house-number" => $_POST["house-number"],
            "apartment" => $_POST["apartment"],
            "suite" => $_POST["suite"],
            "city" => $_POST["city"],
            "pincode" => $_POST["pincode"]
        );
        $this->timing = $_POST["timing"];
    }

    function insertValue()
    {
        global $conn;

        $insert = $conn->prepare("INSERT INTO `membership` VALUES($this->id, '" . $this->name . "', '" . $this->email . "', '" . $this->phone . "', '" . $this->gender . "', '" . $this->dob . "', '" . $this->membership_type . "', '" . $this->start_date . "', '" . $this->end_date . "', '" . $this->status . "', '" . $this->membership_fee . "', NOW(), NOW(), '" . $this->goal . "', '" . $this->weight . "', '" . $this->height . "', '" . $this->medical_condition . "', '" . $this->experience . "', '" . $this->plan_duration . "', '" . $this->payment_type . "', '" . serialize($this->address) . "', '" . $this->timing . "')");

        $insert->execute();
    }
    function updateValue()
    {
        global $conn;
        $name = explode(" ", $this->name);

        $update = $conn->prepare("UPDATE `member` SET `FirstName`='" . $name[0] . "', `LastName`='" . $name[1] . "', `phone`=" . $this->phone . ", `gender`='" . $this->gender . "', `dob`='" . $this->dob . "', `address`='" . serialize($this->address) . "' WHERE `email`='" . $this->email . "'");

        $update->execute();
    }
}

$membership = new Membership();
$membership->setValue();



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
}












//! Payment

if ($membership->payment_type == "Razorpay") {
    require DRIVE_PATH . "/user_panel/class/payment/vendor/autoload.php";

    $api_key = "rzp_test_omt6wXyJiqN0lX";
    $api_secret = "7e63a7DNPonx2Rh3WoDMR3fj";

    $api = new Api($api_key, $api_secret);

    $res = $api->order->create(array(
        'receipt' => '123',
        'amount' => $membership->membership_fee * 100,
        'currency' => 'INR'
    ));
    if (!empty($res["id"])) {

        $address = $_POST["house-number"] . " " . $_POST["apartment"] . " near " . $_POST["suite"] . ", " . $_POST["city"] . " - " . $_POST["pincode"];
?>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

        <script>
            var options = {
                "key": "rzp_test_omt6wXyJiqN0lX",
                "amount": <?php echo $membership->membership_fee * 100; ?>,
                "currency": "INR",
                "name": "IronForce Gym",
                "description": "IronForce Gym is a fitness-focused website offering information about gym facilities, membership plans, training programs, and expert coaching.",
                "image": "<?php echo HTTP_PATH . "/user_panel/darkLogo.png"; ?>",
                "order_id": "<?php echo $res["id"]; ?>",
                "handler": function(response) {
                    <?php
                    $membership->insertValue();
                    $membership->updateValue();
                    send_email($membership->name, $membership->email, $membership->membership_type, $membership->start_date, $membership->end_date, $membership->timing);
                    ?>
                    alert("Membership Get Successfully, See the Email!");
                    history.go(-3);
                },
                "prefill": {
                    "name": "<?php echo $membership->name; ?>",
                    "email": "<?php echo $membership->email; ?>",
                    "contact": <?php echo $membership->phone; ?>,
                },
                "notes": {
                    "address": "<?php echo $address; ?>"
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
        </script>
<?php
    }
}
?>