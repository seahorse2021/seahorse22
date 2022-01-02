<!-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"> -->
<div class="h-screen flex flex-col sm:justify-center items-center bg-center bg-no-repeat bg-cover pt-10 sm:pt-0 " style="background-image: url('https://images.unsplash.com/photo-1628630500614-1c8924c99c3e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80')">
    <div>
        {{ $logo }}
    </div>

    <div class="w-80 sm:max-w-md mt-6 mb-6 mx-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg bg-opacity-60">
        {{ $slot }}
    </div>
</div>
