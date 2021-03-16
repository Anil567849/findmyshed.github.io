<?php

$apiKey = "rzp_test_dvFwtaWTbPKkLI";

// $order  = $client->order->create([
//     'receipt'         => 'order_rcptid_11',
//     'amount'          => 50000, // amount in the smallest currency unit
//     'currency'        => 'INR',// <a href="/docs/payment-gateway/payments/international-payments/#supported-currencies" target="_blank">See the list of supported currencies</a>.)
//   ]);
?>

<form action="" method="POST"><script    
src="https://checkout.razorpay.com/v1/checkout.js"    
data-key="rzp_test_TXhfJmtKrMTUST" // Enter the Test API Key ID generated from Dashboard → Settings → API Keys    
data-amount="1000" // Amount is in currency subunits. Hence, 29935 refers to 29935 paise or ₹299.35.    
data-currency="INR"//You can accept international payments by changing the currency code. Contact our Support Team to enable International for your account    
data-buttontext="Pay with Razorpay"    data-name="Find The Room"    
data-description="it's a fees for finding your room"    
data-image="https://www.flaticon.com/svg/vstatic/svg/619/619034.svg?token=exp=1614361947~hmac=82bcba87d6c8705063ec49862a8365d1"    
data-prefill.name="Anil Kumar"    
data-prefill.email="anilcoder9999@gmail.com"    
data-theme.color="#3b5998">
</script>
<input type="hidden" custom="Hidden Element" name="hidden">
</form>

    