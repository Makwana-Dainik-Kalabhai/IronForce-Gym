<?php
require "./vendor/autoload.php";

use Razorpay\Api\Api;

use function PHPSTORM_META\map;

$api_key = "API KEY";
$api_secret = "API SECRET";

$api = new Api($api_key, $api_secret);

$res = $api->order->create(array(
    'receipt' => '123',
    'amount' => 50000,
    'currency' => 'INR',
));
if (!empty($res["id"])) {
?>
    <button id="rzp-button1">Pay</button>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = {
            "key": "rzp_test_omt6wXyJiqN0lX", // Enter the Key ID generated from the Dashboard
            "amount": 50000, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": "Acme Corp", //your business name
            "description": "Test Transaction",
            "image": "https://example.com/your_logo",
            "order_id": "<?php echo $res["id"]; ?>", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
            "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
            "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information especially their phone number
                "name": "Gaurav Kumar", //your customer's name
                "email": "gaurav.kumar@example.com",
                "contact": "9000090000" //Provide the customer's phone number for better conversion rates 
            },
            "notes": {
                "address": "Razorpay Corporate Office"
            },
            "theme": {
                "color": "#3399cc"
            }
        };
        var rzp1 = new Razorpay(options);
        document.getElementById('rzp-button1').onclick = function(e) {
            rzp1.open();
            e.preventDefault();
        }
    </script>
<?php } ?>