<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CDN for Preview -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-6">

    <div class="max-w-xl mx-auto bg-white shadow-2xl rounded-2xl overflow-hidden border border-gray-200">

        <!-- Brand Header -->
        <div class="bg-gradient-to-r from-blue-700 to-blue-500 text-white py-10 px-10 text-center relative">

            <!-- LOGO AREA -->
            <img src="logo.png" alt="Brand Logo"
                 class="mx-auto w-20 h-20 rounded-full shadow-xl border border-white/30 mb-4">

            <h1 class="text-3xl font-extrabold tracking-wide">Order Confirmed</h1>
            <p class="text-blue-100 mt-1 text-sm">Thank you for shopping with us</p>

            <!-- Decorative Bottom Curve -->
            <div class="absolute bottom-0 left-0 right-0 translate-y-1 h-6 bg-gray-100 rounded-t-3xl"></div>
        </div>

        <!-- Greeting -->
        <div class="px-10 pt-8 pb-4">
            <h2 class="text-xl font-semibold text-gray-800">
                👋 Hello {{ $order->first_name ?? 'Customer' }},
            </h2>

            <p class="text-gray-600 mt-3 leading-relaxed text-sm">
                Your order <strong>#{{ $order->id }}</strong> has been successfully placed.  
                You will receive further updates as your items move through shipping.
            </p>
        </div>

        <!-- Divider -->
        <div class="px-10">
            <div class="border-t border-gray-200 my-6"></div>
        </div>

        <!-- Order Summary -->
        <div class="px-10 pb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">🧾 Order Summary</h3>

            <div class="space-y-3 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-600 font-medium">Order ID:</span>
                    <span class="font-semibold text-gray-800">#{{ $order->id }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600 font-medium">Total Amount:</span>
                    <span class="font-semibold text-gray-800">Rs {{ number_format($order->total, 2) }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600 font-medium">Payment Method:</span>
                    <span class="font-semibold text-gray-800">{{ strtoupper($order->payment_method) }}</span>
                </div>
            </div>
        </div>

        <!-- Divider -->
        <div class="px-10">
            <div class="border-t border-gray-200 my-6"></div>
        </div>

        <!-- Next Steps -->
        <div class="px-10 pb-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-3">📦 What Happens Next?</h3>

            <ul class="text-gray-700 list-disc pl-6 space-y-2 text-sm">
                <li>Your order is being prepared by our logistics team.</li>
                <li>You’ll receive a shipping update once it’s dispatched.</li>
                <li>Track your order anytime from your account dashboard.</li>
            </ul>
        </div>



        <!-- Footer -->
        <div class="bg-gray-50 text-center text-gray-500 text-xs py-5 border-t border-gray-200">
            Thank you for choosing <strong>Grocery Store</strong> 🛒  
        </div>

    </div>

</body>
</html>
