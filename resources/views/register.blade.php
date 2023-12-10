<x-auth-layout>
  <form method="POST" action="/sign-up"  class="w-25 p-5 custom-border phone-form">
    @csrf
    <x-auth-form name='name'/>
    <x-auth-form name='email' type='email'/>
    <x-auth-form name='password' type='password'/>
    <x-auth-form name='password_confirmation' type='password' label='Confirm Password'/>
    <x-form-submit-button text="Create Account"/>
  </form>
</x-auth-layout>