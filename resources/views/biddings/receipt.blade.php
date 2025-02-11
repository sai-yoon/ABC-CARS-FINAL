<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Receipt</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .header { text-align: center; font-size: 24px; font-weight: bold; }
        .details { margin-top: 20px; border-top: 2px solid #000; padding-top: 10px; }
        .details p { margin: 5px 0; }
        .footer { margin-top: 30px; text-align: center; font-size: 14px; }
    </style>
</head>
<body>
    <div class="header">ABC Cars - Transaction Receipt</div>
    
    <div class="details">
        <p><strong>User:</strong> {{ $bid->user->name }}</p>
        <p><strong>Bid ID:</strong> {{ $bid->id }}</p>
        <p><strong>Car:</strong> {{ $bid->car->make }} {{ $bid->car->model }}</p>
        <p><strong>Year:</strong> {{ $bid->car->year }}</p>
        <p><strong>Amount Paid:</strong> ${{ number_format($bid->amount, 2) }}</p>
        <p><strong>Status:</strong> {{ ucfirst($bid->status) }}</p>
        <p><strong>Transaction Date:</strong> {{ now()->format('F j, Y, g:i A') }}</p>
    </div>

    <div class="footer">
        Thank you for your transaction with ABC Cars
    </div>
</body>
</html>
