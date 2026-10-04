<nav class="border-b border-border px-4">

    <div class="flex justify-between py-2">
        <div>
            <a href="/">
                <img src="/images/logo.png" width="150" alt="Idea Fabricator logo">
            </a>
        </div>
        <div class="flex gap-x-4 items-center">

            @auth
            <form action="/logout" method="POST">
                @csrf
                <button class="btn btn-ghost">Log Out</button>
            </form>
            @endauth

            @guest
                <a href="/login" class="btn btn-ghost">Log In</a>
                <a href="/register" class="btn">Register</a>
            @endguest

        </div>
    </div>
</nav>