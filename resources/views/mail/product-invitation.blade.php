<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
</head>

<body>
    <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;">

        {{-- Greeting --}}
        <h1 style="color: #333;">Product Invitation</h1>

        <p>Dear {{ $first_name }},</p>

        <p>You are invited for the position of {{ $position }}. Here are the product details:</p>

        <ul>
            @foreach ($productNames as $productName)
                <li>Product: {{ $productName }}</li>
            @endforeach
        </ul>

        <p>
            <a href="{{ route('invitation.accept', ['token' => $token]) }}"
                style="display: inline-block; padding: 10px 15px; background-color: #28a745; color: #fff; text-decoration: none;">
                Accept Invitation
            </a>
        </p>


        {{-- Footer --}}
        <p style="margin-top: 20px; color: #777;">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights
            reserved.</p>

    </div>
</body>

</html>
