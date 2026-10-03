<x-layout>

    <x-form title="Log In." description="Welcome back, new Ideas won't get fabricated themselves. The incomplete ones missed you :)">
        <form action="/login" method="POST" class="my-25 inline-full max-inline-md gap-y-1">
           @csrf
            
            <x-form.field name="email" label="E-mail" type="email" default="Enter Your Registered E-mail" />
            <x-form.field name="password" label="Password" type="password" default="Enter Password" />
            <button type="submit" class="btn h-14 mt-8 text-2xl">Log In</button>

        </form>
    </x-form>

</x-layout>