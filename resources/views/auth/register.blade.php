<x-layout>

    <x-form title="Registration." description="It takes a little time before you can start Fabricating!">
    
        <form action="/register" method="POST" class="my-25 inline-full max-inline-md gap-y-2">
            @csrf

            <label for="name" class="label">Name</label>
            <input class="input" type="text" id="name" name="name" placeholder="Your Full Name">

            <label for="email" class="label mt-2">E-mail</label>
            <input class="input" type="email" id="email" name="email" placeholder="Your E-mail Address">

            <label for="password" class="label mt-2">Create a New Password</label>
            <input class="input" type="password" id="password" name="password" placeholder="Use a Strong Password">

            <button class="btn mt-8 h-14" type="submit">Submit</button>
        </form>

    </x-form>

</x-layout>