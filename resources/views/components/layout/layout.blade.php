<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idea</title>
    @vite (['resources/css/app.css'])
</head>
<body class="bg-background">
    <header>
        <x-layout.nav /> <!-- Shorthand -->
    </header>
    <main class="text-foreground max-w-7xl mx-auto px-6 pt-5">
        {{ $slot }}
    </main>
</body>
</html>