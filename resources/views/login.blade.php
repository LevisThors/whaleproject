<x-auth-layout>
    <form method="POST" action="/login" class="w-25 p-5 custom-border phone-form"> 
            <h2 class="login-logo mb-4 text-center">Login</h2>
            @csrf
            <x-auth-form name='email' type='email'/>
            <x-auth-form name='password' type='password'/>
            <x-form-submit-button text='login'/>
    </form>
     
</x-auth-layout>
      
