 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<p style="text-align: left;font-size:16px;">Hi {{ $first_name }},</p>

<p style="text-align: left;font-size:16px;">Thank you for joining the SearchVenue network!</p>

<p style="text-align: left;font-size:16px;">Before we connect you with potential customers and allow you complete access to our platform, you&prime;ll need to activate your account.<a target="_blank" href="{{ route('auth.reset', ['token' => $token]) }}">Activate my account</a>.</p>


<p style="text-align: left;font-size:15px;">Sincerely,</p>

<p style="text-align: left;font-size:15px;">SearchVenue Support</p>