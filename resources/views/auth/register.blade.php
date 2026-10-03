<x-layout>

    <x-form title="Registration." description="It takes a little time before you can start Fabricating!">
    
        <form action="/register" method="POST" class="my-25 inline-full max-inline-md gap-y-1">
            @csrf

            <x-form.field name="name" label="Name" default="Your Name" />
            <x-form.field name="email" label="E-mail" default="Your E-mail Address" type="email" />
            <x-form.field name="password" label="Create a Password" default="Use a Strong Password" type="password"/>

            <button class="btn mt-8 h-14" type="submit">Submit</button>
        </form>

    </x-form>

</x-layout>