<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idea</title>
    @vite (['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-background">
    <header>
        <x-layout.nav /> <!-- Shorthand -->
    </header>
    
    <main class="text-foreground max-w-7xl mx-auto px-6 pt-5">
        {{ $slot }}
    </main>   

    @session('success')
    <div 
        x-data="{show: true}" x-show="show" x-init="setTimeout(() => show = false, 6000)" x-transition.duration.700ms
        class="text-black fixed top-5 right-2 bg-green-400 rounded-lg py-2 px-4 text-lg">
        {{ $value }}
    </div>
    @endsession
</body>

</html>