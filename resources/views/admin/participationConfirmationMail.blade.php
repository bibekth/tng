<html>
<body>
    <h3>Hello, {{ $participant->name }}!</h3>
    @if($participant->status == 0)
    <p>Your form has been denied by the Admins.</p>
    @else
    <p>Your form has been approved by the Admins.</p>
    <p>Your payment ID is {{ $participant->payment_id }}</p>
    @endif
    <p>Thank you for participating in our event.</p>
</body>
</html>
